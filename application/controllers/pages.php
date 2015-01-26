<?php
session_start();
date_default_timezone_set('America/New_York');

// This controller is used for misc pages functions

class Pages extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
    }
    
// This is a utility function
// Can be used for a variety of different pages
// Specify in routes
    public function view($page = 'home') {
// If not found, 404
        if (!file_exists(APPPATH . '/views/pages/' . $page . '.php')) {
            show_404();
        }
// Get data and load view
        include 'global.php';
		$data['title'] = ucfirst($page);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
// Browse recently joined users
    public function browse() {
        include 'global.php';
        $data['users'] = $this->health->get_all_users();
        $data['title'] = 'Browse';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/browse', $data);
        $this->load->view('templates/footer', $data);
    }
// Search for users
// by username only
    public function do_search() {
        include 'global.php';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('search', 'Search', 'trim|required|xss_clean');
// Form can not be failed, but including for consistency
        if ($this->form_validation->run() == FALSE) {
// Else, direct to url that search indicates
        } else {
            $slug = $this->input->post('search');
            redirect('users/' . $slug, 'refresh');
        }
    }
// Utility redirect to root
    public function redirect() {
        redirect('/', 'refresh');
    }
    
}

?>