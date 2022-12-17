<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model', 'product');
    }

    public function add()
    {
        $data['title'] = 'Product Page';
		$this->load->view('includes/header', $data);
        $this->load->view('addproduct');
		$this->load->view('includes/footer');
    }

    public function index()
    {
        $data['title'] = 'Product List Page';
        $data['products'] = $this->product->getAllproduct();
		$this->load->view('includes/header', $data);
        $this->load->view('home', $data);
		$this->load->view('includes/footer');
    }

    public function addproduct()
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

            );
            if($this->product->insert($data) )
            {
                $this->session->set_flashdata('success',  '<div class="alert alert-success" role="alert">Product Successfully Added</div>');
                $this->index();
            } 
        }
        else
        {	
            $this->session->set_flashdata('error',  '<div class="alert alert-warning" role="alert">SomeThing is wrong</div>');
            $this->index();
        } 
    }

    public function addToCart()
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

    public function removeItem()
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

    public function orderPlace()
    {
        echo "<pre>";
        // print_r($_POST);
        // exit();
        $total_amount = 0;  
        $userId = $this->session->has_userdata('id');
        $orderDate = date('Y-m-d');

        for ($count=0; $count < count($this->input->post('product_id')); $count++) {
            $product_id = $this->input->post('product_id')[$count];
            $size = $this->input->post('size')[$count];
            $color = $this->input->post('color')[$count];
            $price = $this->input->post('price')[$count];
            $quantity = $this->input->post('quantity')[$count];
            $total_amount +=  $price;  

            $data = array(
                'product_id' => $product_id,
                'product_size' => $size,
                'product_color' => $color,
                'amount' => $price,
                'quantity' => $quantity,
            );
            $data1 = array(
                'user_id' => $userId,
                'total_product_amt' => $total_amount,
                'order_date' => $orderDate
            );
            
            if($this->product->insert_itemDetails($data) )
            {
                $this->session->set_flashdata('success',  '<div class="alert alert-success" role="alert">Order Successfully Added</div>');
                $this->index();
            }
        }
        $this->product->insert_item($data1);
        if($this->product->insert_itemDetails($data) &&  $this->product->insert_item($data1)){
            $data = $this->session->all_userdata();
            // foreach($data as $row => $rows_value)
            // {
            //     // $this->session->unset_userdata($row);
            // }
            redirect(base_url('/'));
        }
    }
    
}
?>