<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries\RestController.php';
use chriskacerguis\RestServer\RestController;

class Product extends RestController {

    public function __construct()
    {
        parent::__construct();
		auth_check();
        $this->load->library('session');
        
        $this->load->model('product_model', 'product');
    }

    public function add_get()
    {
        $data['title'] = 'Product Page';
		$this->load->view('includes/header', $data);
        $this->load->view('addproduct');
		$this->load->view('includes/footer');
    }

    public function index_get()
    {
        $data['title'] = 'Product List Page';
        $data['products'] = $this->product->getAllproduct();
		$this->load->view('includes/header', $data);
        $this->load->view('home', $data);
		$this->load->view('includes/footer');
    }

    public function thankyou_get($orderId)
    {
		$data['title'] = 'Thank you Page'; 
		$data['orderId'] = $orderId; 
		$this->load->view('includes/header', $data);
        $this->load->view('thankyou', $data);
		$this->load->view('includes/footer', $data);
    }

    public function addproduct_post()
    {
        $this->form_validation->set_rules('product_name', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('product_color', 'Color', 'required|trim');
        $this->form_validation->set_rules('product_size', 'Size', 'required');
        $this->form_validation->set_rules('product_quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('product_price', 'Price', 'required');
        $this->form_validation->set_rules('product_image', 'Image', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run()) 
        {
            $data = array(
                'product_name'  => $this->input->post('product_name'),
                'image' => $this->input->post('product_image'),
                'price'  => $this->input->post('product_price'),
                'quantity'  => $this->input->post('product_quantity'),
                'color'  => $this->input->post('product_color'),
                'size'  => $this->input->post('product_size'),
                'description'  => $this->input->post('description'),
                'insdate' => date('y-m-d')

            );
            if($this->product->insert($data) )
            {
                $this->session->set_flashdata('success',  '<div class="alert alert-success" role="alert">Product Successfully Added</div>');
                redirect('/', 'refresh');
            } 
        }
        else
        {	
            $this->session->set_flashdata('error',  '<div class="alert alert-warning" role="alert">SomeThing is wrong</div>');
            $this->index();
        } 
    }

    public function addToCart_post()
    {
        $data = array(
            'product_id' => $this->input->post('product_id'),
            'product_name'  => $this->input->post('product_name'),
            'image' => $this->input->post('image'),
            'price'  => $this->input->post('price'),
            'color'  => $this->input->post('color'),
            'size'  => $this->input->post('size'),
            'description'  => $this->input->post('description'),
        );

        if($this->session->userdata('cartItem')) {
            $cartItem = $this->session->userdata('cartItem');
            array_push($cartItem, $data);
            $this->session->set_userdata('cartItem',$cartItem);

        } else {
            $this->session->set_userdata('cartItem',array($data));
        }
        echo json_encode(array('message'=> 'Cart Item succesfully Added'));
    }

    public function removeItem_post()
    {
        $id = $this->input->post('id');
        $cartItem = $this->session->userdata('cartItem');
        unset($cartItem[$id]);
        $new_arr = [];
        foreach ($cartItem as $row ) {
            array_push($new_arr, $row);
        }
        $this->session->set_userdata('cartItem',$new_arr);
        echo json_encode(array('message'=> 'Cart Item succesfully Removed'));
    }

    public function orderPlace_post()
    {
        $total_amount = 0;  
        $userId = $this->session->has_userdata('id');
        $orderDate = date('Y-m-d');
        // `order_id`, `user_id`, `total_product_amt`, `order_date`, `insdate`

        $order_array = array('user_id'=> $userId, 'total_product_amt'=> $total_amount, 'order_date'=> date('Y-m-d'));

        $order_item = [];
        $data = array(
            'product_id' => $this->input->post('product_id'),
            'color' => $this->input->post('color'),
            'size' => $this->input->post('size'),
            'price' => $this->input->post('price'),
            'quantity'=> $this->input->post('quantity')
        );
        
        if($orderid = $this->product->insert_item($order_array)){
            // foreach ($this->session->userdata('cartItem') as $row) {
                // $order_item[] = array(
                //     'order_id' => $orderid,
                //     'product_id' => $row['product_id'],
                //     'product_color' => $row['color'],
                //     'product_size' => $row['size'],
                //     'amount' => $row['price'],
                //     'net_amount' => $row['price'] * $row['quantity']
                // ); 

                for ($count=0; $count < count($this->input->post('product_id')); $count++) { 
                    $product_id = $this->input->post('product_id')[$count];
                    $color = $this->input->post('color')[$count];
                    $size = $this->input->post('size')[$count];
                    $price = $this->input->post('price')[$count];
                    $quantity= $this->input->post('quantity')[$count];
    
                    $total_amount += $price;
                    $order_item[] = array(
                        'order_id' => $orderid,
                        'product_id' => $product_id,
                        'product_color' => $color,
                        'product_size' => $size,
                        'amount' => $price,
                        'quantity' => $quantity,
                        'net_amount' => $price * $quantity
                    ); 
                }
                // $total_amount += $row['price'];
                // echo "<pre>";
                // print_r($order_item);
                // exit();
        // }
                
            if (count($order_item) > 0) {
                $this->product->update_data($orderid, array('total_product_amt'=>$total_amount));
                // $this->product->update_data('product_tbl',$product_id, array('quantity'=>$quantity));
                $this->product->insert_itemDetails($order_item);
            }
           $this->session->unset_userdata('cartItem');
            echo json_encode(array('message'=> 'Order succesfully', 'orderId'=> $orderid, 'status'=> true));
            // send_email($this->session->userdata('email'), 'Order Confirm', 'Thank you your order succesfully');
        }
    }
}
?>