<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function index($action = "")
	{
		$this->load->view('header');
		$this->load->view('navbar');
		
		$this->load->view('news');
		$this->load->view('footer');
	}
}