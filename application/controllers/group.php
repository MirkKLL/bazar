<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('group_model','',TRUE);
	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('breadcrumb');
		$this->load->view('group');
		$this->load->view('footer');
	}

	public function categories($group_id = 1)
	{
		$this->load->view('header');
		$this->load->view('navbar');

		$bred['bred'] = $this->group_model->get_name_by_id($group_id);
		$this->load->view('breadcrumb', $bred);

		$data['category'] =	$this->get_categories($group_id);
		$data['left_menu'] = $this->group_model->get_left_menu($group_id);
		$this->load->view('group', $data);
		$this->load->view('footer');
	}

	private function get_categories($group_id)
	{
		$aData = $this->group_model->get_categories($group_id);
		$aResult = "";
		if (empty($aData)) {
			return "<h2>Извините, продукты в данной категории временно недоступны.</h2>";
		}
		foreach ($aData as $key) {
			$id = $key->id;
			$name = $key->name;
			$description = $key->description;
			$aResult .= '
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<div class="thumbnail">
					<img src="http://placehold.it/320x220" 
					alt="..." 
					style="height: 180px; width: 100%; display: block;" 
					>
					<div class="caption text-center">
						<h3><a href="'.site_url().'/product/category/'.$id.'">'.$name.'</a></h3>
					</div>
				</div>
			</div>
			';
		}
		return $aResult;
	}


}