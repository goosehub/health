<?php

class Pages extends CI_Controller {

	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
				show_404();
			}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	function login()
	{
	  $this->load->helper(array('form'));
	  $this->load->view('login');
	}
	function dashboard()
	{
		session_start();
	  if($this->session->userdata('logged_in'))
	  {
	    $session_data = $this->session->userdata('logged_in');
	    $data['username'] = $session_data['username'];
	    $data['title'] = $session_data['username'];
		$this->load->view('templates/header', $data);
	    $this->load->view('user/dashboard', $data);
		$this->load->view('templates/footer', $data);
	  }
	  else
	  {
	    //If no session, redirect to login page
	    redirect('login', 'refresh');
	  }
	}

	function logout()
	{
		session_start();
	  $this->session->unset_userdata('logged_in');
	  session_destroy();
	  
	  redirect('pages/view', 'refresh');
	}
}