<?php

Class User extends CI_Model
{
 function login($phone, $password)
 {
   $this -> db -> select('id, phone, role_id, password');
   $this -> db -> from('users');
   $this -> db -> where('phone', $phone);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 public function get_user_id($phone)
 {
   $this -> db -> select('id');
   $this -> db -> from('users');
   $this -> db -> where('phone', $phone);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     $data = $query->result();
     foreach ($data as $key) {
       return $key->id;
     }
   }
   else
   {
     return false;
   }
 }

 public function create($phone, $first_name, $last_name, $address, $comment, $email = "", $password = "")
 {
   $data = array(
               'phone' => $phone,
               'first_name' => $first_name,
               'last_name' => $last_name,
               'role_id' => '0'
            );

  $this->db->insert('users', $data); 
  return $this->db->insert_id();
 }

 public function add_location($address, $user_id)
 {
   $data = array(
               'address' => $address,
               'user_id' => $user_id,
               'apt' => '0',
               'lat' => '0',
               'photo' => '0'
            );

  $this->db->insert('locations', $data); 
  return $this->db->insert_id();
 }
}