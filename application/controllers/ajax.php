<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('product_model','',TRUE);
		$this->load->model('group_model','',TRUE);
	}

	public function admin()
	{
		if(!$this->session->userdata('logged_in'))
		  {//If no session, redirect to login page
		  	redirect('login', 'refresh');
		  }
		}
		public function add_item()
		{
			$this->admin();
			$cart = $this->cart->contents();
			$id = intval($this->input->post("id"));
			$measure = $this->input->post('measure');
			$options = array('measure' => "$measure");
			$md5 = md5($id.implode('', $options));
			if (empty($cart[$md5])) {
				$data = array(
					'id'      => $id,
					'qty'     => 1,
					'price'   => floatval($this->input->post("price")),
					'name'    => $this->input->post("name"),
					'options' => $options
					);
				$this->cart->insert($data);
				echo $this->cart->total();
 		}else{//update cart
 			$qty = $cart[$md5]['qty'];
 			$qty++;
 			$data = array(
 				'rowid' => $md5,
 				'qty'   => $qty
 				);
 			$this->cart->update($data); 
 			echo $this->cart->total();
 		}
 		return TRUE; 		
 	}

 	public function update_price()
 	{
 		$this->admin();

 		$product_id = $this->input->post('id');
 		$new_price = $this->input->post('price');
 		$this->product_model->update_product($product_id, 'last_price', $new_price);
 	}

 	public function update_expire()
 	{
 		$this->admin();

 		$product_id = $this->input->post('id');
 		$expire = $this->input->post('expire');
 		$this->product_model->update_product($product_id, 'expire_date', $expire);
 	}

 	public function update_prod_date()
 	{
 		$this->admin();

 		$product_id = $this->input->post('id');
 		$prod = $this->input->post('prod');
 		$this->product_model->update_product($product_id, 'prod_date', $prod);
 	}

 }
