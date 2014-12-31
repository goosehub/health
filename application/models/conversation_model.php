<?php

Class conversation_model extends CI_Model
{

 function load_messages($user_key, $friend_key)
 {
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
  'message' => $message
  );
  $this->db->insert('messages', $data);
  return FALSE;
 }


}

?>