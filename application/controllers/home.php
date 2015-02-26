<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('group_model','',TRUE);
	}


	public function index()
	{
		//$meta['keywords'] = "";
		//$meta['description'] = "";
		//$this->load->view('header', $meta);
		$this->load->view('header');
		$this->load->view('navbar');
		$data['debug'] = $this->get_groups();
		$this->load->view('home', $data);
		$this->load->view('footer');
	}

	public function get_groups()
	{
		$aData = $this->group_model->get_main_groups();
		$aImg = $this->group_model->get_images("bootstrap/img/groups/");
		$aResult = "";

		foreach ($aData as $data) {
			$id = $data->id;
			$name = $data->name;
			$description = $data->description;

			if (empty($aImg[$id])) {
				$image = base_url()."bootstrap/img/no_img.jpg";
			}else{
				$image =  base_url()."bootstrap/img/groups/$id.jpg";
			}

			$aResult .= '
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="thumbnail">
					<img src="'.$image.'" alt="'.$name.'" 
					style="height: 180px; width: 100%; display: block;" 
					data-toggle="tooltip" 
					data-placement="left" title="'.$description.'">
					<div class="caption text-center">
						<h3><a href="'.site_url().'group/categories/'.$id.'">'.$name.'
						</a></h3>
					</div>
				</div>
			</div>

			';
		}
		return $aResult;
	}
}