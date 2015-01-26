<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// Code above for security
session_start();

// This controller is used for all Join related functions

class Join extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
        $this->load->model('join_model', '', TRUE);
    }
// Join page
    public function index() {
        include 'global.php';
        $data['title'] = 'Join';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/join', $data);
        $this->load->view('templates/footer', $data);
    }
// Verify join form
    public function verifyjoin() {
// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|max_length[100]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_dash|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|alpha_dash|max_length[100]|matches[confirm_password]|callback_insert_database');
// If validation fails
        if ($this->form_validation->run() == FALSE) {
// Clear session data
            $this->session->unset_userdata('logged_in');
            session_destroy();
// User redirected to join page
            include 'global.php';
            $data['title'] = 'Join';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/join', $data);
            $this->load->view('templates/footer', $data);
// Else Login
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $result   = $this->health->login($username, $password);
            if ($result) {
                $sess_array = array();
                foreach ($result as $row) {
                    $sess_array = array(
                        'id' => $row->id,
                        'username' => $row->username
                    );
                    $this->session->set_userdata('logged_in', $sess_array);
                }
            }
// Go to start function to load start page
            redirect('join/start', 'refresh');
        }
    }
// Callback used in verifyjoin
    public function insert_database($password) {
// Set data
        $email    = $this->input->post('email');
        $username = $this->input->post('username');
        $password = md5($password);
// Check if valid email
        $this->load->helper('email');
        if (!valid_email($email)) {
            $this->form_validation->set_message('insert_database', 'This is not a working email address');
            return false;
        } else {
//Submit to model to enter user into users table
            $facebook_id = '';
            $result      = $this->join_model->new_member($username, $password, $email, $facebook_id);
// If username already exists, fail validation
            if ($result) {
                $this->form_validation->set_message('insert_database', 'Username already exists');
                return false;
// Else, success
            } else {
// Set user as logged in
                $sess_array = array();
                $sess_array = array(
                    'username' => $username
                );
                $this->session->set_userdata('logged_in', $sess_array);
                return TRUE;
            }
        }
    }
// Start page. A basic info page customized for users who just joined
    public function start()
        {
// If logged in, get data and load view
        if ($this->session->userdata('logged_in')) {
            include 'global.php';
            $data['username'] = $session_data['username'];
            $users_id         = $data['id'] = $session_data['id'];
            $data['profile']  = $this->health->get_profile($users_id);
            $data['title']    = 'Getting Set Up';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/start', $data);
            $this->load->view('user/set_profile', $data);
            $this->load->view('templates/footer', $data);
        } else {
//If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }
// Used for users joining with facebook
    public function facebook_join($username, $email, $facebook_id) {
// Format Variables
        $username = str_replace('%20', '_', $username);
        $password = 'facebook';
// Send to model for work
        $result = $this->join_model->new_member($username, $password, $email, $facebook_id);
        $result = $this->health->get_profile_slug($username);
// Log user in
        $sess_array = array();
        $sess_array = array(
            'username' => $username,
            'id' => $result['id']
        );
        $this->session->set_userdata('logged_in', $sess_array);
// Redirect to start function
        redirect('join/start', 'refresh');
    }
// For users logging in with facebook
    public function facebook_login($username, $email, $facebook_id) {
// Format Variables
        $username = str_replace('%20', '_', $username);
        $result   = $this->health->get_profile_slug($username);
// Log user in
        $sess_array = array();
        $sess_array = array(
            'username' => $username,
            'id' => $result['id']
        );
        $this->session->set_userdata('logged_in', $sess_array);
// Redirect to dashboard
        redirect('dashboard', 'refresh');
    }
    
}

?>