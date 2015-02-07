<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		  {//If no session, redirect to login page
		  	redirect('login', 'refresh');
		  }
		}

		public function index()
		{
			$session_data = $this->session->userdata('logged_in');
			$data['phone'] = $session_data['phone'];
			
			$this->load->view('header');
			$this->load->view('navbar');


			$this->load->view('admin/main', $data);

			$this->load->view('footer');
		}
	}