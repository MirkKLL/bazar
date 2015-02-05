<?php

Class Cart_model extends CI_Model
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

 public function add_order($user_id, $location, $comments, $price, $ip)
 {
 	$this->load->helper('date');
 	$now = time();

	$now = unix_to_human($now, TRUE, 'eu');

 	$data = array(
               'user' => $user_id,
               'status' => '1',
               'location' => $location,
               'created_at' => $now,
               'coments' => $comments,
               'price' => $price,
               'ip' => $ip
            );

  $this->db->insert('order', $data); 
  return $this->db->insert_id();
 }

 public function save_order_details($order_id, $food_id, $qty, $price, $subtotal)
 {
 	$data = array(
               'order_id' => $order_id,
               'food_id' => $food_id,
               'qty' => $qty,
               'price' => $price,
               'subtotal' => $subtotal
            );

  $this->db->insert('order__detail', $data); 
  if ($this->db->insert_id()) {
   	return true;
   }else{
   	return false;
   }
 }
}