<?php

Class Group_model extends CI_Model
{
	
 function get_main_groups()
 {
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

 function get_categories($group_id)
 {
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

 public function get_name_by_id($group_id)
 {
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
}