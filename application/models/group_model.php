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
}