<?php

Class Group_model extends CI_Model{
	
	function get_main_groups(){
		$this -> db -> select('id, name, description');
		$this -> db -> from('food__category');
		$this -> db -> where('parent_id', '0');

		$query = $this -> db -> get();

		if($query -> num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	function get_categories($group_id){
		$group_id = intval($group_id);
		$this -> db -> select('id, name, description');
		$this -> db -> from('food__category');
		$this -> db -> where('parent_id', $group_id);

		$query = $this -> db -> get();

		if($query -> num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_name_by_id($group_id){
		$group_id = intval($group_id);
		$this -> db -> select('*');
		$this -> db -> from('food__category');
		$this -> db -> where('id', $group_id);

		$query = $this -> db -> get();
		$aResult = array();
		if($query -> num_rows() > 0)
		{
			foreach ($query->result() as $key) {
				if ($key->parent_id>0) {
					$name = $this->get_name_by_id($key->parent_id);
					$aResult[$key->parent_id] = $name[$key->parent_id];
				}
				$aResult[$key->id] = $key->name;
			}
			return $aResult;
		}
		else
		{
			return false;
		}
	}

	public function get_left_menu($group_id, $category_id=0){
		$sResult = '<div class="hidden-xs hidden-sm col-md-3 col-lg-3">
		<!-- Start left menu -->
		<div class="panel-group" id="accordion">';

			$groups = $this->get_main_groups();
			$url = site_url();
			foreach ($groups as $key) {
				$id = $key->id;
				$name = $key->name;
				$active = ($group_id == $id ? 'in' : '');
				$categories = $this->get_categories($id);
				$sResult .= '<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id.'">
							'.$name.'
						</a>
					</h4>
				</div>
				<div id="collapse'.$id.'" class="panel-collapse collapse '.$active.'">
					<div class="panel-body">
						<ul class="list-unstyled">';
							if (empty($categories)) {
								$sResult .= " <li><a href='#'>Категория пуста</a></li>";
							}else{
								foreach ($categories as $key) {
									$c_id = $key->id;
									$c_name = $key->name;
									$selected = ($c_id == $category_id ? '* ' : '');
									$sResult .= "<li><a href='$url/product/category/$c_id'>$selected $c_name $selected</a></li>";
								}
							}
							

							$sResult .= '</ul>
						</div>
					</div>
				</div>';
			}
			$sResult .= "</div></div><!-- End of left menu -->";
			return $sResult;
		}
	}