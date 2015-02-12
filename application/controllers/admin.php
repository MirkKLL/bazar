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
		  $this->load->model('group_model','',TRUE);
		  $this->load->model('product_model','',TRUE);
		}

		public function index($page = "", $message = "")
		{
			$session_data = $this->session->userdata('logged_in');
			$data['phone'] = $session_data['phone'];
			$data['links'] = $this->show_links();
			$data['categories'] = $this->group_model->get_all_categories();
			$this->load->view('header');
			$this->load->view('navbar');


			$this->load->view('admin/main', $data);

			$this->load->view('footer');
		}

		public function show_links()
		{
			$url = site_url();
			return "
			<ul>
				<li><a href='$url/admin/add_product'>Добавить продукт</a></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>

			";
		}

		public function add_product()
		{
			$session_data = $this->session->userdata('logged_in');
			$data['phone'] = $session_data['phone'];
			$data['links'] = $this->show_links();
			$data['categories'] = $this->group_model->get_all_categories();
			$this->load->view('header');
			$this->load->view('navbar');
			if(!empty($this->input->post())){
				$this->product_model->update_product($this->input->post());
				$this->load->view('alert/success', array('msg' => "Успешно обновлено"));
			}


			$this->load->view('admin/main', $data);

			$this->load->view('footer');
		}
	}