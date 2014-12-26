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
 function get_profile($users_id)
 {
  $query = $this->db->get_where('users', array('id' => $users_id));
  $this->db->limit(1);
  return $query->row_array();

 }
   function last_online($users_id)
 {
  $this -> db -> select('username');
  $this -> db -> from('users');
  $this -> db -> where('id', $users_id);
  $this -> db -> limit(1);
  
  $query = $this -> db -> get();
  
  $data = array(
  'last_online' => time()
  );
 $this->db->where('id', $users_id);
 $this -> db -> update('users', $data);
 return FALSE;
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
    $joined = time();
    $data = array(
    'username' => $username,
    'password' => $password,
    'joined' => $joined
    );
   $this -> db -> insert('users', $data);
   return FALSE;
  }
 }
   function set_profile($users_id, $email, $first_name, $last_name, $birthdate, $gender,
                        $location, $gym_partner, $private, $goal, $about, $username)
 {
  $this -> db -> select('username');
  $this -> db -> from('users');
  $this -> db -> where('username', $username);
  $this -> db -> limit(1);
  
  $query = $this -> db -> get();
  
  $data = array(
  'email' => $email,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'birthdate' => $birthdate,
  'gender' => $gender,
  'location' => $location,
  'gym_partner' => $gym_partner,
  'private' => $private,
  'goal' => $goal,
  'about' => $about,
  'username' => $username
  );
 $this->db->where('id', $users_id);
 $this -> db -> update('users', $data);
 return FALSE;

 }

}
?>