<?php

Class health extends CI_Model
{
 function login($username, $password)
 {
   $this->db->select('id, username, password');
   $this->db->from('users');
   $this->db->where('username', $username);
   $this->db->where('password', MD5($password));
   $this->db->limit(1);
 
   $query = $this->db->get();
 
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
  function get_profile_slug($slug)
 {
  $query = $this->db->get_where('users', array('username' => $slug));
  $this->db->limit(1);
  return $query->row_array();
 }
  function get_all_users()
 {
  $query = $this->db->get('users');
  // $this->db->order_by("id", "desc");
  return $query->result();
 }
   function last_online($users_id)
 {
  $this->db->select('username');
  $this->db->from('users');
  $this->db->where('id', $users_id);
  $this->db->limit(1);
  
  $query = $this->db->get();
  
  $data = array(
  'last_online' => time()
  );
 $this->db->where('id', $users_id);
 $this->db->update('users', $data);
 return FALSE;
 }
  function join($username, $password, $email)
 {
  $this->db->select('username');
  $this->db->from('users');
  $this->db->where('username', $username);
  $this->db->limit(1);
  
  $query = $this->db->get();
  
  if($query -> num_rows() == 1)
  {
    return $query->result();
  }
  else
  {
    // Insert user into users
    $now = time();
    $data = array(
    'username' => $username,
    'password' => $password,
    'email' => $email,
    'joined' => $now,
    'last_online' => $now,
    'gym_partner' => 0,
    'private' => 0,
    'metric' => 'on',
    'image' => 'default.png'
    );
   $this->db->insert('users', $data);
// Find user id
   $this->db->select_max('id');
   $this->db->from('users');
   $this->db->limit(1);
   $query = $this->db->get()->row();
   // $query->result();
   $users_id = $query->id;
// Create blank tables
   $now = time();
   $data = array(
    'timestamp' => $now,
    'user_key' => $users_id
   ); 
   $this->db->insert('progress', $data);
   return false;
  }
 }
   function username($users_id, $username)
 {
// Check if username is taken and not the current username
  $this->db->select('username');
  $this->db->from('users');
  $this->db->where('username', $username);
  $this->db->where_not_in('id', $users_id);
  $this->db->limit(1);
  
  $query = $this->db->get();
  
  if($query -> num_rows() == 1)
  {
    return $query->result();
  }
  else
  {
   return FALSE;
  }
 }
   function set_profile($users_id, $email, $first_name, $last_name, $birthdate, $gender,
                        $location, $metric, $gym_partner, $private, $goal, $about, $username)
 {
  $this->db->select('username');
  $this->db->from('users');
  $this->db->where('username', $username);
  $this->db->limit(1);
  
  $query = $this->db->get();
  
  $data = array(
  'email' => $email,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'birthdate' => $birthdate,
  'gender' => $gender,
  'location' => $location,
  'metric' => $metric,
  'gym_partner' => $gym_partner,
  'private' => $private,
  'goal' => $goal,
  'about' => $about,
  'username' => $username
  );
 $this->db->where('id', $users_id);
 $this->db->update('users', $data);
 return FALSE;
 }
    function set_profile_picture($users_id, $filename)
    {
  $data = array(
  'image' => $filename
  );
 $this->db->where('id', $users_id);
 $this->db->update('users', $data);      
    }
    function set_password($users_id, $password)
 {
  $this->db->select('username');
  $this->db->from('users');
  $this->db->where('id', $users_id);
  $this->db->limit(1);
  
  $query = $this->db->get();
  
  $data = array(
  'password' => md5($password)
  );
 $this->db->where('id', $users_id);
 $this->db->update('users', $data);
 return FALSE;

 }
 function wall_insert($user_key, $friend_key, $friend_username, $message, $timestamp)
 {
    $data = array(
    'user_key' => $user_key,
    'friend_key' => $friend_key,
    'friend_username' => $friend_username,
    'message' => $message,
    'timestamp' => $timestamp
    );
   $this->db->insert('wall', $data);
 }
 function wall_get($users_id)
 {
  $query = $this->db->get_where('wall', array('user_key' => $users_id));
  return $query->result();
 }

}

?>