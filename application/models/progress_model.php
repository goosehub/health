<?php

Class progress_model extends CI_Model
{
function set_progress($users_id, $name, $comment, $weight, $height, $arm, $thigh, $waist, $chest, $calves,
 					$forearms, $neck, $hips, $bodyfat, $squats, $bench, $deadlift, $picture_01_caption, 
          			$picture_02_caption, $picture_03_caption, $picture_04_caption, $picture_05_caption)
 {
  $now = time();
  $data = array(
  	'timestamp' => $now,
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
 function get_progress($users_id)
 {
  return $this->db->from('progress')
  ->where('user_key', $users_id)
  ->order_by("id", "DESC")
  ->get()
  ->row();
 }
 function get_all_progress($users_id)
 {
  return $this->db->from('progress')
  ->order_by("id", "DESC")
  ->get()
  ->result();
 }

}

?>