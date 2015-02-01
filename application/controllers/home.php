<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$aData = array('url' => site_url(), );
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('home');
		$this->load->view('footer');
	}
}