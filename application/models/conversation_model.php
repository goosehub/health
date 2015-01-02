<?php

Class conversation_model extends CI_Model
{
 function conversation_list($user_key)
 {
  $this->db->select('sender');
  $this->db->distinct();
  $this->db->where('receiver', $user_key);
  // $this->db->where_not_in('sender', $user_key);
  $this->db->order_by("timestamp", "desc");
  $this->db->limit(100);
  $query = $this->db->get('messages');
  return $query->result();
 }
 function load_messages($user_key, $friend_key)
 {
  // Mark all messages as read
   $data = array(
   'status' => 'on'
   );
  $this->db->where('sender', $friend_key);
  $this->db->where('receiver', $user_key);
  $this->db->update('messages', $data);

  $names = array($user_key, $friend_key);

  $this->db->select('*');
  $this->db->where_in('sender', $names);
  $this->db->where_in('receiver', $names);
  $this->db->limit(100);
  $query = $this->db->get('messages');
  return $query->result();
 }
 function new_message($user_key, $friend_key, $message, $timestamp)
 {
  $data = array(
  'timestamp' => $timestamp,
  'sender' => $user_key, 
  'receiver' => $friend_key, 
  'message' => $message,
  'status' => 0
  );
  $this->db->insert('messages', $data);
  return FALSE;
 }
  function check_unread($user_key)
 {
  $this->db->select('status');
  $this->db->from('messages');
  $this->db->where('receiver', $user_key);
  // $this->db->or_where('receiver', $XXXfriend_key);
  $this->db->where('status', '0');
  
  $query = $this->db->get();
  
  if($query->num_rows() > 0)
  {
    return $query->num_rows();
  }
  else
  {
    return false;
  }
 }


}

?>