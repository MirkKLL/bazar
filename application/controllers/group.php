<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

	public function index()
	{

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('breadcrumb');
		$this->load->view('group');
		$this->load->view('footer');
	}
}