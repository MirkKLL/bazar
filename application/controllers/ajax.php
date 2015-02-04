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
 		$id = intval($_POST["id"]);
 		if (empty($cart[md5($id)])) {
	 		$data = array(
	               'id'      => $id,
	               'qty'     => 1,
	               'price'   => floatval($_POST["price"]),
	               'name'    => $_POST['name'],
	               'options' => array()
	            );
			$this->cart->insert($data);
			echo $this->cart->total();
 		}else{//update cart
 			$qty = $cart[md5($id)]['qty'];
 			$qty++;
 			$data = array(
               'rowid' => md5($id),
               'qty'   => $qty
            );
			$this->cart->update($data); 
			echo $this->cart->total();
 		}
		return TRUE; 		
 	}

 }
