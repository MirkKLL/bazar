<?php

Class Product_model extends CI_Model
{

	function get_products($group_id)
	{
		$group_id = intval($group_id);
		$this -> db -> select('*');
		$this -> db -> from('food');
		$this -> db -> where('category', $group_id);

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

	public function update_product($aData)
	{
		if(empty($aData['id'])) {
			$this->db->insert('food', $aData);
		}
	}


	public function get_food_by_owner($owner_id = 0)
	{
    	$sSql = "SELECT f.id, f.name, f.amount, f.measure, f.last_price, f.prod_date, f.expire_date
    	FROM food f";
    	if ($owner_id >0) {
    		$sSql .= "";
    	}
	}

}