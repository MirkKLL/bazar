<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('product_model','',TRUE);
   		$this->load->model('group_model','',TRUE);
   		$this->load->library('cart');
 	}

 	public function add_item($value='')
 	{
 		print_r($_POST);
 		return true;
 		$data = array(
               'id'      => 'sku_123ABC',
               'qty'     => 1,
               'price'   => 39.95,
               'name'    => 'T-Shirt',
               'options' => array('Size' => 'L', 'Color' => 'Red')
            );

		echo $this->cart->insert($data);
 	}

 }
