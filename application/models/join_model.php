<?php

Class join_model extends CI_Model
{
 function new_member($username, $password, $email, $facebook_id)
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
    $user_default = '';
    $data = array(
    'username' => $username,
    'password' => $password,
    'email' => $email,
    'facebook_id' => $facebook_id,
    'first_name' => $user_default,
    'last_name' => $user_default,
    'location' => $user_default,
    'birthdate' => $user_default,
    'gender' => $user_default,
    'joined' => $now,
    'last_online' => $now,
    'gym_partner' => 0,
    'private' => 0,
    'metric' => 0,
    'image' => 'default.png'
    );
   $this->db->insert('users', $data);

// Find user id
   $this->db->select_max('id');
   $this->db->from('users');
   $this->db->limit(1);
   $query = $this->db->get()->row();
   $users_id = $query->id;

// Create default progress row
   $progress_default = '0';
   $data = array(
    'timestamp' => $now,
    'user_key' => $users_id,
    'weight' => $progress_default,
    'height' => $progress_default,
    'arm' => $progress_default,
    'thigh' => $progress_default,
    'waist' => $progress_default,
    'chest' => $progress_default,
    'calves' => $progress_default,
    'forearms' => $progress_default,
    'neck' => $progress_default,
    'hips' => $progress_default,
    'bodyfat' => $progress_default,
    'squats' => $progress_default,
    'bench' => $progress_default,
    'deadlift' => $progress_default,
    'extra' => 'new_member_point'
   ); 
   $this->db->insert('progress', $data);

// Make friends with self
   $data = array(
    'timestamp' => $now,
    'send_request' => $users_id,
    'receive_request' => $users_id,
    'status' => 'accepted',
    'self' => 'on'
   ); 
   $this->db->insert('friends', $data);
   return false;
  }
 }

}

?>