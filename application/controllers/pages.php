<?php
session_start();
date_default_timezone_set('America/New_York');

class Pages extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
 }

// Utility function. Can be used for a variety of views
	public function view($page = 'home')
	{
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
			{
				show_404();
			}
	    include 'global.php';
		$data['title'] = ucfirst($page); // Capitalize the first letter
	    $this->load->helper(array('form'));
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
	public function search()
	{
	    include 'global.php';
		$data['users'] = $this->health->get_all_users();
	    $this->load->helper(array('form'));
		$data['title'] = 'Search';
		$this->load->view('templates/header', $data);
		$this->load->view('pages/search', $data);
		$this->load->view('templates/footer', $data);
	}
	public function do_search()
	{
	    include 'global.php';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search', 'Search', 'trim|required|xss_clean|alpha_dash|max_length[24]');
		if($this->form_validation->run() == FALSE)
		{
//Field validation failed.  User redirected to search page
			$data['users'] = $this->health->get_all_users();
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