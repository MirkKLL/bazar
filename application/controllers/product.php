<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','',TRUE);
		$this->load->model('group_model','',TRUE);
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
		$this->load->view('header');
		$this->load->view('navbar');

		$bred['bred'] = $this->group_model->get_name_by_id($group_id);
		$this->load->view('breadcrumb', $bred);

		$data['products'] = $this->get_products($group_id);
		
		//unset last element and left only group id
		unset($bred['bred'][$group_id]);
		foreach ($bred['bred'] as $key => $value) {
			$my_group = $key;
		}
		$data['left_menu'] = $this->group_model->get_left_menu($my_group, $group_id);

		$this->load->view('product', $data);
		$this->load->view('footer');
	}

	private function get_products($group_id)
	{
		$aData = $this->product_model->get_products($group_id);
		$aResult = "";
		if (empty($aData)) {
			$aResult .= "Продукты в данной категории временно отсутствуют";
			return $aResult;
		}
		foreach ($aData as $key) {
			$id = $key->id;
			$name = $key->name;
			$desc = $key->description;
			$price = $key->last_price;
			$desc = $key->description;
			$date_from = $key->prod_date;
			$date_to = $key->expire_date;
			$measure = $key->measure;
			$amount = $key->amount;
			$aResult .= '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="thumbnail">
				<img src="http://placehold.it/320x220" alt="">
				<div class="caption product_caption">
					<h4 class="pull-right"><b>'.$price.' грн. </b></h4>
					<h4>'.$name.'</h4>
					<p>'.$desc.'</p>
				</div>

				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<button type="button" class="btn btn-info btn-sm pull-left" 
						data-container="body" 
						data-toggle="popover" data-placement="bottom" 
						data-content="
						<b>Изготовлено:</b>'.$date_from.'<br> 
						<b>Годен до:</b> '.$date_to.'
						"> 
						<span class="glyphicon glyphicon-info-sign"></span>
					</button>
				</div>
				<!-- <div class="col-xs-5 col-sm-5 col-md-6">
				<div class="input-group input-group-sm">
					<span class="input-group-btn">
						<button class="btn btn-default btn-danger" type="button"><span class="glyphicon glyphicon-minus-sign"></span></button>
					</span>
					<input type="text" class="form-control" value="'.$amount.'">
					<span class="input-group-btn">
						<button class="btn btn-default btn-primary" type="button"><span class="glyphicon glyphicon-plus-sign"></span></button>
					</span>
				</div> 
			</div> -->
			<div class="col-xs-3 col-sm-3 col-md-3"  style="padding:5px;">
				<span><b>'.$amount." ".$measure.'</b></span>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<button type="button" class="btn btn-success btn-sm pull-right add_to_cart" 
				data-id = '.$id.'
				data-name = "'.$name.'""
				data-qty = "1"
				data-price = "'.$price.'"
				data-measure = "'.$measure.'"

				> <span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
			</div>
		</div>

	</div>
</div>';

}
return $aResult;
}
}