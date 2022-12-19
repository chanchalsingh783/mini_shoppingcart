<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries\RestController.php';
use chriskacerguis\RestServer\RestController;

class Cart extends RestController {

    public function __construct()
    {
        parent::__construct();
		auth_check();
    }

    public function index_get()
    {
        $data['title'] = 'Cart Page';
		$this->load->view('includes/header', $data);
        $this->load->view('cart');
		$this->load->view('includes/footer');
    }    
}
?>