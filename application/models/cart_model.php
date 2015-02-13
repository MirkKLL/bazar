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

      if($query -> num_rows() > 0){
        return $query->result();}
        else{
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
        return true;}
        else{
            return false;
        }
    }

    public function get_orders($statsus = 'all')
    {
        $this -> db -> select('order.*, order__status.name, order__status.short, locations.address, locations.apt, locations.lat, users.phone, users.first_name');
        $this -> db -> from('order');
        $this->db->join('order__status', 'order__status.id = order.status');
        $this->db->join('locations', 'locations.id = order.location');
        $this->db->join('users', 'users.id = order.user');
        switch ($statsus) {
            case 'all':
            # code...
            break;

            case 'new':
                $this -> db -> where('status', '1');
                break;

            default:
            # code...
            break;
        }
        $this->db->order_by("order.id", "asc"); 
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