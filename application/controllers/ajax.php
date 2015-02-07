<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','',TRUE);
		$this->load->model('group_model','',TRUE);
	}

	public function add_item()
	{
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

 }
