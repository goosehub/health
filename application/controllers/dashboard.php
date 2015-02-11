<?php
session_start();

// This controller is used for all Dashboard related functions

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('progress_model', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
    }
    
// Dashboard view
    public function index() {
// If user logged in
        if ($this->session->userdata('logged_in')) {
// Get data
            include 'global.php';
            $this->health->last_online($users_id);
            $data['profile']  = $this->health->get_profile($users_id);
            $data['username'] = $session_data['username'];
// Load view
            $data['title']    = $session_data['username'];
            $this->load->view('templates/header', $data);
            $this->load->view('user/dashboard', $data);
            $this->load->view('templates/footer', $data);
        } else {
//If user not logged in, redirect to login page
            redirect('login', 'refresh');
        }
    }
// Used for nutritional requirement
    public function requirements() {
// If user logged in
        if ($this->session->userdata('logged_in')) {
// Get data
            include 'global.php';
            $data['profile']  = $this->health->get_profile($users_id);
            $data['progress'] = $this->progress_model->get_progress($users_id);
// Calculate age
            if ($data['profile']['birthdate'] != '') {
                $birthdate = $data['birthdate'] = $data['profile']['birthdate'];
                $birthdate = date('Ymd', strtotime($birthdate));
                $diff      = date('Ymd') - $birthdate;
                $years     = $data['years'] = substr($diff, 0, -4);
            }
// Set variables
            $weight = $data['weight'] = $data['progress']->weight;
            $height = $data['height'] = $data['progress']->height;
            $gender = $data['gender'] = $data['profile']['gender'];
// Run equation
            if ($gender === 'Male') {
                $cal_req = 10 * $weight + 6.25 * $height - 5 * $years + 5;
            } else if ($gender === 'Female') {
                $cal_req = 10 * $weight + 6.25 * $height - 5 * $years - 161;
            } else {
                $cal_req = 'Unknown';
            }
            $data['cal_req'] = round($cal_req);
// Load view
            $data['title']   = $session_data['username'];
            $this->load->view('templates/header', $data);
            $this->load->view('user/requirements', $data);
            $this->load->view('templates/footer', $data);
        } else {
// If logged in, redirect to login page
            redirect('login', 'refresh');
        }
    }
// Used for entering profile information
    public function profile_form() {
        $data['image_error'] = '';
// If user logged in
        if ($this->session->userdata('logged_in')) {
// Get data
            include 'global.php';
            $data['profile'] = $this->health->get_profile($users_id);
// Load view
            $data['title']   = 'Basic Info Settings';
            $this->load->view('templates/header', $data);
            $this->load->view('user/set_profile', $data);
            $this->load->view('templates/footer', $data);
        } else {
// If not logged in, redirect to login page
            redirect('login', 'refresh');
        }
    }
// Used for processing profile information forms
    public function set_profile() {
// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean');
        $this->form_validation->set_rules('password', 'New Password', 'trim|xss_clean|matches[confirm_password]');
        $this->form_validation->set_rules('existing_password', 'Existing Password', 'trim|xss_clean|callback_password_insert_database');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|max_length[24]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|max_length[24]');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|xss_clean');
        $this->form_validation->set_rules('location', 'Location', 'trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('metric', 'Metric', 'trim|xss_clean');
        $this->form_validation->set_rules('gym_partner', 'Gym Partner', 'trim|xss_clean');
        $this->form_validation->set_rules('private', 'Private', 'trim|xss_clean');
        $this->form_validation->set_rules('goal', 'Goal', 'trim|xss_clean|max_length[5000]');
        $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|max_length[5000]');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|alpha_dash|max_length[24]|callback_profile_insert_database');
// If validation failed, load set_profile page
        if ($this->form_validation->run() == FALSE) {
            include 'global.php';
            $data['profile'] = $this->health->get_profile($users_id);
            $data['title']   = 'Basic Info Settings';
            $this->load->view('templates/header', $data);
            $this->load->view('user/set_profile', $data);
            $this->load->view('templates/footer', $data);
// Else, success, redirect to dashboard
        } else {
// Image upload
// Set rules
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '100000000';
            $config['max_width']     = '10240';
            $config['max_height']    = '7680';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);
// If upload failed, load form with errors
            if (!$this->upload->do_upload()) {
                $data['image_error'] = $this->upload->display_errors();
                include 'global.php';
                $data['profile'] = $this->health->get_profile($users_id);
                $data['title'] = 'Error';
                $this->load->view('templates/header', $data);
                $this->load->view('user/set_profile', $data);
                $this->load->view('templates/footer', $data);
// Else success, set data and redirect to dashboard
            } else {
                include 'global.php';
                $file     = $this->upload->data();
                $filename = $file['file_name'];
                $this->health->set_profile_picture($users_id, $filename);
                redirect('dashboard', 'refresh');
            }
        }
    }
// Callback used in set_profile
    public function profile_insert_database() {
//Field validation succeeded.  Validate against database
        $email       = $this->input->post('email');
        $first_name  = $this->input->post('first_name');
        $last_name   = $this->input->post('last_name');
        $birthdate   = $this->input->post('birthdate');
        $gender      = $this->input->post('gender');
        $location    = $this->input->post('location');
        $gym_partner = $this->input->post('gym_partner');
        $private     = $this->input->post('private');
        $metric      = $this->input->post('metric');
        $goal        = $this->input->post('goal');
        $about       = $this->input->post('about');
        $username    = $this->input->post('username');
        $session_data = $this->session->userdata('logged_in');
        $users_id     = $data['id'] = $session_data['id'];        
// Query the database for username change
        $result = $this->health->username($users_id, $username);
// If username exists, fail validation
        if ($result) {
            $this->form_validation->set_message('profile_insert_database', 'Username already exists');
            return false;
// Else, update profile information
        } else {
            $result = $this->health->set_profile($users_id, $email, $first_name, $last_name, $birthdate, $gender, $location, $metric, $gym_partner, $private, $goal, $about, $username);
            return TRUE;
        }
    }
// Callback used in set_password
    public function password_insert_database($existing_password) {
// Get data
        $existing_password     = $existing_password;
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        $session_data = $this->session->userdata('logged_in');
        $users_id     = $data['id'] = $session_data['id'];
        $username     = $session_data['username'];
// If not password given, pass validation
        if ($password === '')
        {
            return TRUE;
        }
// Check if new password matches confirm password
        else if ($password === $confirm_password)
        {
            $result       = $this->health->login($username, $existing_password);
    // If no result
            if (!$result) {
    // Password incorrect
                $this->form_validation->set_message('password_insert_database', 'Password incorrect');
                return false;
    // Else, success, change password and pass validation
            } else {
                $password = $this->input->post('password');
                $result   = $this->health->set_password($users_id, $password);
                return TRUE;
            }
        }
// If confirm password does not match, fail validation
        else
        {
            return false;
        }
    }
// Used for requesting freindship
    function friend($slug) {
        $friend       = $this->health->get_profile_slug($slug);
        $friend_key   = $friend['id'];
        $session_data = $this->session->userdata('logged_in');
        $user_key     = $session_data['id'];
        $this->health->friend_request($user_key, $friend_key);
        redirect('users/' . $slug, 'refresh');
    }
// Used for listing pending friend requests
    public function friend_requests() {
        include 'global.php';
        $this->load->helper('date');
        $data['requests'] = $this->health->find_requests($user_key);
        $data['title']    = 'Friend Requests';
        $this->load->view('templates/header', $data);
        $this->load->view('user/friend_requests', $data);
        $this->load->view('templates/footer', $data);
    }
// Used for accepting friend requests
    public function accept($friend_key) {
        include 'global.php';
        $this->health->accept_request($user_key, $friend_key);
        redirect('dashboard', 'refresh');
    }
// Used for rejecting friend requests
    public function reject($friend_key) {
        include 'global.php';
        $this->health->delete_friend($user_key, $friend_key);
        redirect('dashboard', 'refresh');
    }
    
}

?>