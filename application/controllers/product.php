<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('breadcrumb');
		$this->load->view('product');
		$this->load->view('footer');
	}
}