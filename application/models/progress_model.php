<?php

Class progress_model extends CI_Model
{
function set_progress($users_id, $name, $comment, $weight, $height, $arm, $thigh, $waist, $chest, $calves,
 					$forearms, $neck, $hips, $bodyfat, $squats, $bench, $deadlift)
 {
  $now = time();
  $data = array(
  	'timestamp' => $now,
	'date' => date("m-d-y"), 
	'user_key' => $users_id, 
	'name' => $name,
	'comment' => $comment, 
	'weight' => $weight, 
	'height' => $height, 
	'arm' => $arm, 
	'thigh' => $thigh, 
	'waist' => $waist, 
	'chest' => $chest, 
	'calves' => $calves,
	'forearms' => $forearms, 
	'neck' => $neck, 
	'hips' => $hips, 
	'bodyfat' => $bodyfat, 
	'squats' => $squats, 
	'bench' => $bench, 
	'deadlift' => $deadlift
  ); 
  $this->db->insert('progress', $data);
 return FALSE;
 }
 function update_progress($users_id, $name, $comment, $weight, $height, $arm, $thigh, $waist, $chest, $calves,
 					$forearms, $neck, $hips, $bodyfat, $squats, $bench, $deadlift)
 {
  $now = time();
  $date = date("m-d-y");
  $data = array(
  	'timestamp' => $now,
	'date' => $date, 
	'user_key' => $users_id, 
	'name' => $name,
	'comment' => $comment, 
	'weight' => $weight, 
	'height' => $height, 
	'arm' => $arm, 
	'thigh' => $thigh, 
	'waist' => $waist, 
	'chest' => $chest, 
	'calves' => $calves,
	'forearms' => $forearms, 
	'neck' => $neck, 
	'hips' => $hips, 
	'bodyfat' => $bodyfat, 
	'squats' => $squats, 
	'bench' => $bench, 
	'deadlift' => $deadlift
  ); 
 $this->db->where('date', $date);
 $this ->db->update('progress', $data);
 return FALSE;
 }
 function upload_images($user_key, $filename, $caption, $filesize)
 {
  $now = time();
  $date = date("m-d-y");
  $data = array(
  	'timestamp' => $now,
	'progress_key' => $date, 
	'user_key' => $user_key, 
	'filename' => $filename,
	'caption' => $caption,
	'filesize' => $filesize
  ); 
  $this->db->insert('images', $data);
 return FALSE;
 }
 function get_images($user_key, $point)
 {
  return $this->db->from('images')
  ->where('user_key', $user_key)
  ->where('progress_key', $point)
  ->order_by("timestamp", "DESC")
  ->limit(24)
  ->get()
  ->result();
 }
 function get_progress($users_id)
 {
  return $this->db->from('progress')
  ->where('user_key', $users_id)
  ->order_by("id", "DESC")
  ->get()
  ->row();
 }
 function get_progress_point($user_key, $point)
 {
  return $this->db->from('progress')
  ->where('user_key', $user_key)
  ->where('date', $point)
  ->order_by("id", "DESC")
  ->get()
  ->row();
 }
 function get_all_progress($users_id)
 {
  return $this->db->from('progress')
  ->where('user_key', $users_id)
  ->where_not_in('extra', 'new_member_point')
  ->order_by("id", "DESC")
  ->limit(9999)
  ->get()
  ->result();
 }
 function comment_insert($profile_id, $friend_key, $point,
        $message, $timestamp)
 {
 	$data = array(
 	'user_key' => $profile_id,
 	'friend_key' => $friend_key,
 	'progress_key' => $point,
 	'message' => $message,
 	'timestamp' => $timestamp
 	 );
 	$this->db->insert('progress_comments', $data);
 }
 function progress_comments_get($profile_id, $point)
 {
  $query = $this->db->get_where('progress_comments', array('user_key' => $profile_id, 'progress_key' => $point));
  return $query->result();
 }

}

?>