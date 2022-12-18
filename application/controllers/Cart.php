<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		auth_check();
    }

    public function index()
    {
        $data['title'] = 'Cart Page';
		$this->load->view('includes/header', $data);
        $this->load->view('cart');
		$this->load->view('includes/footer');
    }

    
}
?>