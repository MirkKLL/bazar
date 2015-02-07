<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('group_model','',TRUE);
		$this->load->model('cart_model','',TRUE);
		$this->load->model('user','',TRUE);
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
			case 'order_done':
			$this->load->view('alert/success', array('msg' => "Спасибо! Ваш заказ отправлен на обработку, в ближайшее время с Вами свяжется наш оператор."));
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
		$phone = $this->input->post("phone");
		$user = $this->user->get_user_id($phone);
		$first_name = $this->input->post("first_name");
		$last_name = $this->input->post("last_name");
		$address = $this->input->post("address");
		$comments = $this->input->post("comments");
		$ip = $this->input->ip_address();
		$price = $this->cart->total();

		if(!$user){
			//create new user
			$user = $this->user->create($phone, $first_name, $last_name, $address, $comments);
		}

		//create new location
		$location_id = $this->user->add_location($address, $user);

		//create order
		$order_id = $this->cart_model->add_order($user, $location_id, $comments, $price, $ip);

		//save order details
		foreach ($this->cart->contents() as $key => $value) {
			//val
			//Array ( [rowid] => c8862c [id] => 2 [qty] => 8 [price] => 4.4 [name] => РЎР [options] => Array ( ) [subtotal] => 35.2 )
			$done = $this->cart_model->save_order_details($order_id, $value["id"], $value["qty"], $value["price"], $value["subtotal"]);
		}
		$this->cart->destroy();
		$this->index("order_done");
	}

}