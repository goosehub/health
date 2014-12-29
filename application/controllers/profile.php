<?php
session_start();
date_default_timezone_set('America/New_York');

class Profile extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('progress_model','',TRUE);
 }
  function view($slug)
  {
// Log check
	if($this->session->userdata('logged_in'))
	{
	  $data['log_check'] = TRUE;
	}
// Use url slug to get profile
	$data['profile'] = $this->health->get_profile_slug($slug);
// If not found, direct to error page
	if (! $data['profile']) {
		$data['title'] = $slug;
		$data['slug'] = $slug;
		$this->load->view('templates/header', $data);
		$this->load->view('profile/not_found', $data);
		$this->load->view('templates/footer', $data);
	} 
// Else, load all data and serve page
	else
	{
		$users_id = $data['profile']['id'];
		$data['progress'] = $this->progress_model->get_progress($users_id);
// Calculate age
		$birthdate = $data['birthdate'] = $data['profile']['birthdate'];
		$birthdate = date('Ymd', strtotime($birthdate));
		$diff = date('Ymd') - $birthdate;
		$data['age'] = $data['years'] = substr($diff, 0, -4);
// Calculate last online
		$data['last_online'] = $data['profile']['last_online'];
		$data['last_online'] = date("M j, g:i A T", $data['last_online']);
// Translate gym_partner to phrase
		if ($data['profile']['gym_partner'] === 'on') {
			$data['gym_partner'] = 'I am looking for a gym partner';
		} else {
			$data['gym_partner'] = '';
		}
// Load view
		$data['title'] = $slug;
		$this->load->view('templates/header', $data);
		$this->load->view('profile/view', $data);
		$this->load->view('templates/footer', $data);
	}
  }

}