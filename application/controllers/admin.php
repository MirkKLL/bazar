<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller {
	private $_user_role;

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
		  {//If no session, redirect to login page
		  	redirect('login', 'refresh');
		  }
		  $this->_user_role = $this->session->userdata('logged_in')['role'];

		  $this->load->model('group_model','',TRUE);
		  $this->load->model('product_model','',TRUE);
		  $this->load->model('cart_model','',TRUE);
		  $this->load->model('user','',TRUE);
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
			$sResult = "
			<ul>
				<li><a href='$url"."admin/'>Главная</a></li>
				<li><a href='$url"."admin/orders'>Список закоазов</a></li>
				<li><a href='$url"."admin'></a></li>

				";
				if ($this->_user_role == 'ADMIN') {
					$sResult .= "
					<li><a href='$url"."admin/add_product'>Добавить продукт</a></li>
					<li><a href='$url"."admin/prices'>Цены</a></li>
					<li></li>
					<li><a href = 'http://atom3.goodnet.com.ua:2222/' target = '_blank'>Хостинг</a></li>
					<li></li>

					";
				}
				$sResult .= "</ul>";

				return $sResult;
			}

			public function add_product()
			{
				if ($this->_user_role != 'ADMIN') {
					return "Only for admin";
				}
				$session_data = $this->session->userdata('logged_in');
				$data['phone'] = $session_data['phone'];
				$data['links'] = $this->show_links();
				$data['categories'] = $this->group_model->get_all_categories();
				$data['owners'] = $this->user->get_users_by_role('2');
				$this->load->view('header');
				$this->load->view('navbar');
				if(($this->input->post('id'))){
					$this->product_model->add_product($this->input->post());
					$this->load->view('alert/success', array('msg' => "Успешно обновлено"));
				}

				$this->load->view('admin/add_product', $data);

				$this->load->view('footer');
			}

			public function orders($status='new')
			{
				$session_data = $this->session->userdata('logged_in');
				$data['phone'] = $session_data['phone'];
				$data['links'] = $this->show_links();
			//$data['categories'] = $this->group_model->get_all_categories();
				$this->load->view('header');
				$this->load->view('navbar');

				switch ($this->_user_role) {
					case 'ADMIN':
					$data['orders'] = $this->cart_model->get_orders();
					break;
					
					default:
					$data['orders'] = '';
					break;
				}
				$this->load->view('admin/orders', $data);

				$this->load->view('footer');
			}

			public function order_edit($id)
			{
				$id = intval($id);
				

				$session_data = $this->session->userdata('logged_in');
				$data['phone'] = $session_data['phone'];
				$data['links'] = $this->show_links();
				$order = $this->cart_model->get_order($id);

				$this->load->view('header');
				$this->load->view('navbar');

				if (($this->input->post('order_id'))) {
				//update location
					$this->user->update_location($order['location'], 'address', $this->input->post("address"));
				//update order
					$this->cart_model->order_update($this->input->post());
					
				//if something in order details were changed update them
					if ($this->input->post('changed') == "yes") {
						$updated = $this->cart_model->update_order_detail($id, $this->input->post('amount'));
						if ($updated) {
							$this->load->view('alert/success', array('msg' => "Успешно обновлено"));
						}else{
							$this->load->view('alert/danger', array('msg' => "Проблемы при сохранении"));
						}
					}
				}
				$data['order'] = $this->cart_model->get_order($id);
				$data['order_details'] = $this->cart_model->get_order_detail($id);
				$data['order_status'] = $this->cart_model->get_order_status_view($data['order']['status']);
				$this->load->view('admin/order_edit', $data);

				$this->load->view('footer');

			}

			public function prices($owner='all')
			{
				if ($this->_user_role != 'ADMIN') {
					return "Only for admin";
				}
				$session_data = $this->session->userdata('logged_in');
				$data['phone'] = $session_data['phone'];
				$data['links'] = $this->show_links();
				$data['prices'] = $this->product_model->get_food_by_owner();
				$this->load->view('header');
				$this->load->view('navbar');


				$this->load->view('admin/prices', $data);

				$this->load->view('footer');
			}
		}