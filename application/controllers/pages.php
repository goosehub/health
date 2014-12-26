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

}

?>