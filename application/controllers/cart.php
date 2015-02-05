<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('group_model','',TRUE);
   		$this->load->helper(array('form'));
 	}

 	public function index($action = "")
	{
		$this->load->view('header');
		$this->load->view('navbar');
		switch ($action) {
			case '':
				# nothing
				break;
			case 'ok':
				$this->load->view('alert/success', array('msg' => "Корзина успешно обновлена"));
				break;
			
			default:
				# code...
				break;
		}
		$this->load->view('cart');
		$this->load->view('footer');
	}

	public function update()
	{
		//print_r($_POST);
		$this->cart->update($this->input->post());
		$this->index("ok");
	}

	public function confirm()
	{
		
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('order_confirm');
		$this->load->view('footer');
	}

	public function order_finis()
	{
		print_r($this->input->post());
		//$this->input->ip_address()
	}

}