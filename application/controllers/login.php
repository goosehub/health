<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// Code above for security

// This controller is used for all login/logout related functions

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
    }
    
// Traditional verify login form
    public function verifylogin() {
// Validation with callback
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        
// If field validation failed.  User redirected to login page
        if ($this->form_validation->run() == FALSE) {
            include 'global.php';
            $data['title'] = 'Login';
            $this->load->view('templates/header');
            $this->load->view('pages/login');
            $this->load->view('templates/footer');
        } else {
// If success, Go to private area
            redirect('dashboard', 'refresh');
        }
        
    }
// Callback used in verifylogin
    public function check_database($password) {
// Validate against database
        $username = $this->input->post('username');
// Query the database
        $result = $this->health->login($username, $password);        
// Prevent user from accessing facebook accounts without being logged into to the facebook
        if ($password === 'facebook') {
// If user reaches this validation message, user is likely attempting to hack a users account
// Consider an admin notification here
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
// Login if successful
        else if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
// Else, invalid username or password
        else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
// Used to loggout
    public function logout() {
// Clear session data
        session_start();
        $this->session->unset_userdata('logged_in');
        session_destroy();
// Send to login page
        redirect('', 'refresh');
    }
    
}

?>