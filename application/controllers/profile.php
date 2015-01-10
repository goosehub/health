<?php
session_start();
date_default_timezone_set('America/New_York');

class Profile extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('progress_model','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
 }
  function view($slug)
  {
// Log check
	if ($this->session->userdata('logged_in'))
	{
// Enter wall message
// Validation
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[150]');
		if($this->form_validation->run() == FALSE)
		{
//Field validation failed
		}
		else
		{
// Get information
			$message = $this->input->post('message');
			$session_data = $this->session->userdata('logged_in');
			$friend_key = $session_data['id'];
			$friend_username = $session_data['username'];
			$timestamp = time();
// Enter into wall table
			$wall_user = $this->health->get_profile_slug($slug);
			$user_key = $wall_user['id'];
			$result = $this->health->wall_insert($user_key, $friend_key,
			$message, $timestamp);
// Redirect to page to prevent form resubmission
          redirect('users/'.$slug.'', 'refresh');
	    }
	}
// View Profile
// Use url slug to get profile
    include 'global.php';
	$data['profile'] = $this->health->get_profile_slug($slug);
	if (isset($data['profile']['id'])) {	
		$friend_key = $data['profile']['id'];
		if($this->session->userdata('logged_in'))
		{ 
			$data['friend_status'] = $friend_status = $this->health->friend_status($user_key, $friend_key); 
		}
	    if (!empty($friend_status) && $friend_status[0]->status === 'accepted') 
	    { 
	    	$view_allowed = TRUE; } else { $view_allowed = false; 
    	} 
	}
// If not found, direct to not found page
	if (! $data['profile']) {
		$data['title'] = $slug;
		$data['slug'] = $slug;
		$this->load->view('templates/header', $data);
		$this->load->view('profile/not_found', $data);
		$this->load->view('templates/footer', $data);
	} 
// If private and not friends, direct to private page
	else if ($data['profile']['private'] === 'on'
		&& $view_allowed != TRUE) {
		$data['title'] = $slug;
		$data['slug'] = $slug;
		$this->load->view('templates/header', $data);
		$this->load->view('profile/private', $data);
		$this->load->view('templates/footer', $data);
	}
// Else, load all data and serve page
	else
	{
        $data['profile_name'] = set_name($data['profile']['username'], $data['profile']['first_name'], $data['profile']['last_name']);
		$data['progress'] = $progress = $this->progress_model->get_progress($friend_key);
		$data['wall'] = $this->health->wall_get($friend_key);
// Imperial Conversions
// Set conversion ratios
        $cm_conv = 0.39370079;
        $kg_conv = 2.20462262;
// Weights Conversions - kg to lbs
        $weights = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
          'deadlift'=>$progress->deadlift); 
        foreach ($weights as &$value) {
            $value = $value * $kg_conv;
        }
// Lengths Conversions - cm to inches
        $lengths = array('height'=>$progress->height, 'arm'=>$progress->arm, 'thigh'=>$progress->thigh,
          'waist'=>$progress->waist, 'chest'=>$progress->chest, 'calves'=>$progress->calves,
          'forearms'=>$progress->forearms, 'neck'=>$progress->neck, 'hips'=>$progress->hips); 
        foreach ($lengths as &$value) {
            $value = $value * $cm_conv;
        }
// Rounding
      $rounded = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
        'deadlift'=>$progress->deadlift, 'height'=>$progress->height, 'arm'=>$progress->arm,
        'thigh'=>$progress->thigh, 'waist'=>$progress->waist, 'chest'=>$progress->chest, 
        'calves'=>$progress->calves, 'forearms'=>$progress->forearms, 'neck'=>$progress->neck,
        'hips'=>$progress->hips, 'i_weight'=>$weights['weight'], 'i_squats'=>$weights['squats'], 'i_bench'=>$weights['bench'],
        'i_deadlift'=>$weights['deadlift'], 'i_height'=>$lengths['height'], 'i_arm'=>$lengths['arm'],
        'i_thigh'=>$lengths['thigh'], 'i_waist'=>$lengths['waist'], 'i_chest'=>$lengths['chest'], 
        'i_calves'=>$lengths['calves'], 'i_forearms'=>$lengths['forearms'], 'i_neck'=>$lengths['neck'],
        'i_hips'=>$lengths['hips'], 'bodyfat'=>$progress->bodyfat); 
      foreach ($rounded as &$value) {
        $value = round($value, 2, PHP_ROUND_HALF_UP);
      }
      $data['measurement'] = $rounded;

// Calculate age
		if ($data['profile']['birthdate'] != '') 
		{
			$birthdate = $data['birthdate'] = $data['profile']['birthdate'];
			$birthdate = date('Ymd', strtotime($birthdate));
			$diff = date('Ymd') - $birthdate;
			$data['age'] = $data['years'] = substr($diff, 0, -4);
		}
		else
		{
			$data['age'] = $data['profile']['birthdate'];
		}
// Calculate last online
	  	$this->load->helper('date');
		$data['last_online'] = $data['profile']['last_online'];
		$now = time();
		$data['last_online'] = timespan($data['last_online']);
// Format joined
		$data['joined'] = $data['profile']['joined'];
		$data['joined'] = date("M j, g:i A T", $data['joined']);
// Translate gym_partner to phrase
		if ($data['profile']['gym_partner'] === 'on') {
			$data['gym_partner'] = 'I am looking for a gym partner';
		} else {
			$data['gym_partner'] = '';
		}
// Load view
		$data['title'] = $slug;
		$this->load->view('templates/header', $data);
		$this->load->view('profile/profile_view', $data);
		$this->load->view('templates/footer', $data);
	}
  }
 function friends($slug)
 {
    include 'global.php';
    $data['profile'] = $profile = $this->health->get_profile_slug($slug);
    $profile_id = $profile['id'];
    $data['friends'] = $this->health->friends_list($profile_id);
    $data['title'] = 'Friends';
    $this->load->view('templates/header', $data);
    $this->load->view('profile/friend_list', $data);
    $this->load->view('templates/footer', $data);
 }

}
?>