<?php
session_start();
date_default_timezone_set('America/New_York');

class Pages extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
 }

// Utility function. Can be used for a variety of views
	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
				show_404();
			}
		if($this->session->userdata('logged_in'))
	  {
	    $data['log_check'] = TRUE;
	  }
		$data['title'] = ucfirst($page); // Capitalize the first letter
	    $this->load->helper(array('form'));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	public function search()
	{
		if($this->session->userdata('logged_in'))
		{
		  $data['log_check'] = TRUE;
		}
		$data['users'] = $this->health->get_all_users();
		foreach ( $data['users'] as $user):
// Calculate age
		$birthdate = $data['birthdate'] = $user->birthdate;
		$birthdate = date('Ymd', strtotime($birthdate));
		$diff = date('Ymd') - $birthdate;
		$data['age'] = $data['years'] = substr($diff, 0, -4);
// Calculate last online
		$data['last_online'] = $user->last_online;
		$data['last_online'] = date("M j, g:i A T", $data['last_online']);
// Format joined
		$data['joined'] = $user->joined;
		$data['joined'] = date("M j, g:i A T", $data['joined']);
// Translate gym_partner to phrase
		if ($user->gym_partner === 'on') {
			$data['gym_partner'] = 'This user is currently looking for a gym partner';
		} else {
			$data['gym_partner'] = 'Not looking for a gym partner';
		}
		endforeach;

	    $this->load->helper(array('form'));
		$data['title'] = 'Search';
		$this->load->view('templates/header', $data);
		$this->load->view('pages/search', $data);
		$this->load->view('templates/footer', $data);
	}
	public function do_search()
	{
		if($this->session->userdata('logged_in'))
		{
			$data['log_check'] = TRUE;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search', 'Search', 'trim|required|xss_clean|alpha_dash|max_length[24]');
		if($this->form_validation->run() == FALSE)
		{
//Field validation failed.  User redirected to search page
			$data['users'] = $this->health->get_all_users();
			foreach ( $data['users'] as $user):
	// Calculate age
			$birthdate = $data['birthdate'] = $user->birthdate;
			$birthdate = date('Ymd', strtotime($birthdate));
			$diff = date('Ymd') - $birthdate;
			$data['age'] = $data['years'] = substr($diff, 0, -4);
	// Calculate last online
			$data['last_online'] = $user->last_online;
			$data['last_online'] = date("M j, g:i A T", $data['last_online']);
	// Format joined
			$data['joined'] = $user->joined;
			$data['joined'] = date("M j, g:i A T", $data['joined']);
	// Translate gym_partner to phrase
			if ($user->gym_partner === 'on') {
				$data['gym_partner'] = 'This user is currently looking for a gym partner';
			} else {
				$data['gym_partner'] = 'Not looking for a gym partner';
			}
			endforeach;
			$data['title'] = 'Search';
			$this->load->view('templates/header', $data);
			$this->load->view('pages/search', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			$slug = $this->input->post('search');
			redirect('users/'.$slug, 'refresh');
		}
	}

}

?>