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
 function wall_insert($user_key, $friend_key, $message, $timestamp)
 {
    $data = array(
    'user_key' => $user_key,
    'friend_key' => $friend_key,
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
 function friend_request($user_key, $friend_key)
 {
// Check if request already sent
    $names = array($user_key, $friend_key);
    $this->db->select('*');
    $this->db->from('friends');
    $this->db->where_in('send_request', $names);
    $this->db->where_in('receive_request', $names);
    $query = $this->db->get();

// Check for 2 because users are friends with self
    if($query -> num_rows() < 2)
    {
// Record Request
      $now = time();
      $data = array(
      'timestamp' => $now,
      'send_request' => $user_key,
      'receive_request' => $friend_key,
      'status' => 'requested',
      'self' => '0'
      );
      $this->db->insert('friends', $data);
    }
    else
    {
     return false;
    }
 }
  function find_requests($user_key)
 {
    $this->db->select('*');
    $this->db->from('friends');
    $this->db->where('receive_request', $user_key);
    $this->db->where('status', 'requested');
    $query = $this->db->get();
    return $query->result();
 }
 function accept_request($user_key, $friend_key)
 {
  $now = time();
  $data = array(
  'status' => 'accepted',
  'timestamp' => $now
  );
 $this->db->where('send_request', $friend_key);
 $this->db->where('receive_request', $user_key);
 $this->db->update('friends', $data);  
 }
 function delete_friend($user_key, $friend_key)
 {
 $names = array($user_key, $friend_key);
 $this->db->where_in('send_request', $names);
 $this->db->where_in('receive_request', $names);
 $this->db->delete('friends');  
 }
  function friends_list($user_key)
 {
// Self is so user doesn't see himself on friends list
    $self = array('on');
    $this->db->select('*');
    $this->db->from('friends');
    $this->db->where('send_request', $user_key);
    $this->db->where('status', 'accepted');
    $this->db->where('self', '0');
    $this->db->or_where('receive_request', $user_key);
    $this->db->where('status', 'accepted');
    $this->db->where('self', '0');
    $this->db->order_by('timestamp', 'desc');
    $this->db->limit(9999);
    $query = $this->db->get();
    return $query->result();
 }
 function friend_status($user_key, $friend_key)
 {
    $names = array($user_key, $friend_key);

    $this->db->select('status');
    $this->db->from('friends');
    $this->db->where_in('send_request', $names);
    $this->db->where_in('receive_request', $names);
    $query = $this->db->get();
    
// Check for 2 because users are friends with self
    if($query -> num_rows() == 2)
    {
      return $query->result();
    }
    else
    {
      return false;
    }

 }

}

?>