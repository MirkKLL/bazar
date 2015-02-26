<?php

Class Product_model extends CI_Model
{

	function get_products($group_id)
	{
		$group_id = intval($group_id);
		$this -> db -> select('*');
		$this -> db -> from('food');
		$this -> db -> where('category', $group_id);
		$this -> db -> where('is_active', 1);

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

	public function add_product($aData)
	{
		if(empty($aData['id'])) {
			$this->db->insert('food', $aData);
		}
	}


	public function get_food_by_owner($owner_id = 0)
	{
		$sSql = "SELECT f.id, f.name, f.amount, f.measure, f.last_price, f.prod_date, f.expire_date, u.first_name, u.last_name
		FROM food f
		INNER JOIN `users` u 
		ON f.owner_id = u.id
		";
		if ($owner_id >0) {
			$sSql .= "WHERE f.owner_id = $owner_id";
		}else{
			$sSql .= "WHERE u.role_id = 2";
		}

		$aData = $this->db->query($sSql);
		$aResult = $aData->result();
		if (!empty($aResult)) {
			return $aResult;
		}else{
			return false;
		}
	}

	public function update_product($product_id, $field_name, $new_value)
	{
		$sSql = "UPDATE food
			SET $field_name = '$new_value'
			WHERE id = $product_id
		";

		return $this->db->query($sSql);
	}

}