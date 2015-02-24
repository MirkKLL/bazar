<?php

Class Cart_model extends CI_Model
{


  function __construct()
  {
    parent::__construct();
    $this->load->helper('date');
}

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

public function get_order($id)
{
    $id = intval($id);
    $sSql = "SELECT o.*, os.name, u.phone, u.first_name, u.last_name, u.email, u.notes
    FROM `order` AS o
    INNER JOIN `order__status` AS os
    ON o.status = os.id
    INNER JOIN `users` AS u
    ON o.user = u.id
    WHERE o.id = ?
    ";
    $aData = $this->db->query($sSql, array($id));
    $aResult = $aData->result_array();
    if (!empty($aResult)) {
        return $aResult[0];
    }else{
        return false;
    }
}

public function get_order_status_view($active = 0)
{
    $sSql = "SELECT * FROM order__status WHERE 1";
    $aData = $this->db->query($sSql);
    $aResult = $aData->result_array();
    $sResult = "<select class='form-control' name = 'status'>";
    foreach ($aResult as $key => $value) {
        $name = $value['name'];
        $id = $value['id'];
        $alt = $value['short'];

        $selected = $active == $id ? 'selected' : '';

        $sResult .= "<option value = '$id' alt = '$alt'  $selected>$name</option>";            
    }
    $sResult .= "</select>";
    return $sResult;
}

public function order_update($aData)
{
  $id = $aData['order_id'];
  $status = $aData['status'];
  $coments = !empty($aData['coments']) ? $aData['coments'] : '';

  $sSql = "UPDATE `order` 
  SET status = $status,
  coments = '$coments'
  WHERE id = $id
  "; 
  $res = $this->db->query($sSql);
}

public function get_order_detail($order_id, $mode = "detail")
{
    switch ($mode) {
        case 'detail':
        $sSql = "SELECT od.*, f.*, fc.name as cat_name, p.path, p.alt 
        FROM `order__detail` od
        INNER JOIN food f
        ON od.food_id = f.id
        INNER JOIN food__category fc
        ON f.category = fc.id
        LEFT JOIN photo p
        ON f.photo_id = p.id
        WHERE od.order_id = $order_id";
        break;

        case 'short':
        $sSql = "SELECT * FROM `order__detail` WHERE order_id = $order_id";
        break;
    }


    $aData = $this->db->query($sSql);
    $aResult = $aData->result_array();
    return $aResult;

}

public function update_order_detail($iOrderId, $aData)
{
    $new_total = 0;
    $aOld = $this->get_order_detail($iOrderId, 'short');
        //Array ( [1] => 1 [2] => 3 )
    //prepare old data
    $aOldData = array();
    foreach ($aOld as $id => $data) {
        $aOldData[$data['food_id']]['qty'] = $data['qty'];
        $aOldData[$data['food_id']]['price'] = $data['price'];
        $aOldData[$data['food_id']]['subtotal'] = $data['subtotal'];
    }
    
    foreach ($aData as $food_id => $qty) {
        $subtotal = 0;
        //remove if 0
        if ($qty == 0) {
            $this->remove_from_order($iOrderId, $food_id);
        }
        // if qty changed
        if ($qty != $aOldData[$food_id]['qty']) {
            //update row
            $subtotal = $qty * $aOldData[$food_id]['price'];
            $new_total += $subtotal;
            $this->change_order_qty($iOrderId, $food_id, $qty, $subtotal);
        }else{
            $subtotal = $qty * $aOldData[$food_id]['price'];
            $new_total += $subtotal;
        }
    }
    //update total in order table
    $this->update_order_price($iOrderId, $new_total);
    return true;
}

public function remove_from_order($iOrderId, $food_id)
{
    $sSql = "DELETE FROM `order__detail` WHERE order_id = $iOrderId AND food_id = $food_id"; 
    $this->db->query($sSql);
}

public function change_order_qty($order_id, $food_id, $qty, $subtotal)
{
    $sSql = "UPDATE `order__detail` 
    SET qty = $qty,
    subtotal = $subtotal
    WHERE order_id = $order_id AND food_id = $food_id";
    $this->db->query($sSql);
}

public function update_order_price($order_id, $price)
{
    $sSql = "UPDATE `order`
    SET price = $price
    WHERE id = $order_id
    ";
    $this->db->query($sSql);
}


}