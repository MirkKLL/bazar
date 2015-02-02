<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
   		$this->load->model('product_model','',TRUE);
 	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('breadcrumb');
		$this->load->view('product');
		$this->load->view('footer');
	}

	public function category($group_id)
	{
		$data['products'] = $this->get_products($group_id);
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('breadcrumb');
		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	private function get_products($group_id)
	{
		$aData = $this->product_model->get_products($group_id);
		$aResult = "";
		foreach ($aData as $key) {
			$id = $key->id;
			$name = $key->name;
			$desc = $key->description;
			$price = $key->last_price;
			$desc = $key->description;
			$aResult .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
	                  <div class="thumbnail">
	                     <img src="http://placehold.it/320x220" alt="">
	                     <div class="caption product_caption">
	                        <h4 class="pull-right">'.$price.' грн.</h4>
	                        <h4><a href="#">'.$name.'</a>
	                        </h4>
	                        <p>'.$desc.'</p>
	                     </div>

	                     <div class="row">
	                        <div class="col-xs-2 col-sm-3 col-md-2">
	                           <button type="button" class="btn btn-info btn-sm pull-left" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<b>Изготовлено:</b> сегодня<br> 
	                                 <b>Годен до:</b> 10,05,2016
	                                 "> 
	                              <span class="glyphicon glyphicon-info-sign"></span>
	                           </button>
	                        </div>
	                        <div class="col-xs-5 col-sm-5 col-md-6">
	                           <div class="input-group input-group-sm">
	                              <span class="input-group-btn">
	                              <button class="btn btn-default btn-danger" type="button"><span class="glyphicon glyphicon-minus-sign"></span></button>
	                              </span>
	                              <input type="text" class="form-control" value="1.5">
	                              <span class="input-group-btn">
	                              <button class="btn btn-default btn-primary" type="button"><span class="glyphicon glyphicon-plus-sign"></span></button>
	                              </span>
	                           </div>
	                           <!-- /input-group -->
	                        </div>
	                        <div class="col-xs-2 col-sm-2 col-md-2"  style="padding:5px;">
	                           <span><b> кг.</b></span>
	                        </div>
	                        <div class="col-xs-2 col-sm-2 col-md-2">
	                           <button type="button" class="btn btn-success btn-sm pull-right"> <span class="glyphicon glyphicon-shopping-cart"></span></button>
	                        </div>
	                     </div>

	                  </div>
	               </div>';

		}
		return $aResult;
	}
}