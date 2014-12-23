<?php

Class health extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
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
  function join($username, $password)
 {
  $this -> db -> select('username');
  $this -> db -> from('users');
  $this -> db -> where('username', $username);
  $this -> db -> limit(1);
  
  $query = $this -> db -> get();
  
  if($query -> num_rows() == 1)
  {
    return $query->result();
  }
  else
  {
    $data = array(
    'username' => $username,
    'password' => $password
    );
   $this -> db -> insert('users', $data);
   return FALSE;
  }
 }
}
?>