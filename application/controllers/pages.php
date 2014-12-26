<?php

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
	  } else {
	  }
		$data['title'] = ucfirst($page); // Capitalize the first letter
    $this->load->helper(array('form'));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

// Intended for potential use as 

//    function start()
//   {
//     session_start();
//     if($this->session->userdata('logged_in'))
//     {
//       $session_data = $this->session->userdata('logged_in');
//       $users_id = $data['id'] = $session_data['id'];
//       settype($users_id, "integer");
//       $data['profile'] = $this->health->get_profile($users_id);
//       $data['log_check'] = TRUE;
//       $data['username'] = $session_data['username'];
//       // $data['title'] = $session_data['username'];
//       $data['title'] = 'Getting Started';
//       $this->load->view('templates/header', $data);
//       $this->load->view('pages/start', $data);
//       $this->load->view('user/set_profile', $data);
//       $this->load->view('templates/footer', $data);
//     }
//     else
//     {
// //If no session, redirect to login page
//       redirect('login', 'refresh');
//     }
//   }

}

?>