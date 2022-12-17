<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->model('auth_model', 'auth');
    }

    public function index()
	{
        if($this->session->has_userdata('is_login') )
		{
		   redirect('/Welcome'); 
		}  
		$data['title'] = 'Shopping Cart';
		$this->load->view('user', $data);
	}

    public function loginPage()
    {
		$data['title'] = 'Login Page'; 
        $this->load->view('login', $data);
    }

    public function login()
	{
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) 
        {	
            $password = $this->encrypt->encode($this->input->post('password'));
            //call login auth_model
            $result = $this->auth->login($this->input->post('username'), $password);
            if(isset($result['error']))
            {
                $this->session->set_flashdata('errors', $result['error']);
                redirect('/auth');

            }
            else
            {	
                $this->session->set_userdata($result);
                redirect("/welcome");
            }
        }
        else
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('/auth'));
        }
	}


	public function regist()
	{
       
        $this->form_validation->set_rules('username', 'User Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run()) 
        {	
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data = array(  
                'username'          =>     $this->input->post('username'),  
                'email'          =>     $this->input->post('email'),
                'mobile'          =>     $this->input->post('mobile'),
                'password'          =>     $password
            );
            //insert Registration Data
            if($this->auth->insert($data))
            {
                echo json_encode(array(
                    'status'=>true,
                    'message'=>'<div class="alert alert-success" role="alert">Sucessfully Registration</div>',
                    'error'=> array('username'=>'','email'=>'')
                ));
            } 
            else
            {	
                echo json_encode(array(
                    'status'=>false,
                    'message'=>'<div class="alert alert-warning" role="alert">No Any Changes!</div>',
                    'error'=> array('username'=>'','email'=>'')
                ));
            } 
        }
        else
        {	
            echo json_encode(array(
                'status'=>false,
                'message'=>'', //validation_errors()
                'error'=> array('username'=>form_error('username'))
            ));
        }
	}

    public function logout()
    {
      $data = $this->session->all_userdata();
      foreach($data as $row => $rows_value)
      {
       $this->session->unset_userdata($row);
      }
      redirect('auth');
    }
}
