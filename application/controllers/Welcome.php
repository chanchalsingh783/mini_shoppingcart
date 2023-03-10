<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
        $this->load->model('product_model', 'product');
		auth_check(); //check login auth
	}
	public function index()
	{
		$data['title'] = 'Shopping Cart';
        $data['products'] = $this->product->getAllproduct();
		$this->load->view('includes/header', $data);
		$this->load->view('home', $data);
		$this->load->view('welcome_message');
		$this->load->view('includes/footer');
	}
}
