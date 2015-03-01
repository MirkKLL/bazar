<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->model('group_model','',TRUE);
	}


	public function index()
	{
		//$meta['keywords'] = "";
		//$meta['description'] = "";
		//$this->load->view('header', $meta);
		$this->load->view('header');
		$this->load->view('navbar');
		//$data['debug'] = $this->get_groups();
		//$this->load->view('home', $data);
		$this->load->view('delivery');
		$this->load->view('footer');
	}
}