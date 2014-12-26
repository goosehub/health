<?php
session_start();

class Dashboard extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
 }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
// Logged in, go to dashboard
      $this->health->last_online($users_id);
      $data['profile'] = $this->health->get_profile($users_id);
      $data['log_check'] = TRUE;
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
  function profile_form()
  {
    if($this->session->userdata('logged_in'))
    {
// Set data to populate form
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['username'] = $session_data['username'];
      $data['log_check'] = TRUE;
      $data['title'] = 'Basic Info Settings';
      $this->load->view('templates/header', $data);
      $this->load->view('user/set_profile', $data);
      $this->load->view('templates/footer', $data);
    }
    else
    {
// If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }
  public function set_profile()
  {
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email');
   $this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|max_length[24]');
   $this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|max_length[24]');
   $this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|xss_clean');
   $this->form_validation->set_rules('location', 'Location', 'trim|xss_clean|max_length[100]');
   $this->form_validation->set_rules('gym_partner', 'Gym Partner', 'trim|xss_clean');
   // $this->form_validation->set_rules('profile_picture', 'Profile Picture', 'trim|xss_clean');
   $this->form_validation->set_rules('private', 'Private', 'trim|xss_clean');
   $this->form_validation->set_rules('goal', 'Goal', 'trim|xss_clean|max_length[5000]');
   $this->form_validation->set_rules('about', 'About', 'trim|xss_clean|max_length[5000]');
   $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|alpha_dash|max_length[24]|callback_profile_insert_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to set_profile page
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['username'] = $session_data['username'];
      $data['log_check'] = TRUE;
      $data['title'] = 'Basic Info Settings';
      $this->load->view('templates/header', $data);
      $this->load->view('user/set_profile', $data);
      $this->load->view('templates/footer', $data);
   }
   else
   {
     //Go to dashboard
     redirect('dashboard', 'refresh');
   }
 }
  public function profile_insert_database($foo)
 {
//Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
   $first_name = $this->input->post('first_name');
   $last_name = $this->input->post('last_name');
   $birthdate = $this->input->post('birthdate');
   $gender = $this->input->post('gender');
   $location = $this->input->post('location');
   $gym_partner = $this->input->post('gym_partner');
   // $profile_picture = $this->input->post('profile_picture');
   $private = $this->input->post('private');
   $goal = $this->input->post('goal');
   $about = $this->input->post('about');
   $username = $this->input->post('username');

   $session_data = $this->session->userdata('logged_in');
   $users_id = $data['id'] = $session_data['id'];;

//query the database
   $result = $this->health->username($users_id, $username);

   if($result)
   {
// Username already exists
     $this->form_validation->set_message('profile_insert_database', 'Username already exists');
     return false;
   }
   else
   {
// Enter user into users tables
     $result = $this->health->set_profile($users_id, $email, $first_name, $last_name, $birthdate,
                                  $gender, $location, $gym_partner, $private, $goal, $about, $username);

     return TRUE;
   }
 }
 public function set_password()
  {
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|xss_clean|required');
   $this->form_validation->set_rules('password', 'New Password', 'trim|xss_clean|required|matches[confirm_password]');
   $this->form_validation->set_rules('existing_password', 'Existing Password', 'trim|xss_clean|required|callback_password_insert_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to set_profile page
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['username'] = $session_data['username'];
      $data['log_check'] = TRUE;
      $data['title'] = 'Changing Password';
      $this->load->view('templates/header', $data);
      $this->load->view('user/password_form', $data);
      $this->load->view('templates/footer', $data);
   }
   else
   {
     //Go to dashboard
     redirect('dashboard', 'refresh');
   }
 }
  public function password_insert_database($existing_password)
 {
// check password
   $password = $existing_password;
   $session_data = $this->session->userdata('logged_in');
   $users_id = $data['id'] = $session_data['id'];
   $username = $session_data['username'];
   $result = $this->health->login($username, $password);

   if(!$result)
   {
// Password incorrect
     $this->form_validation->set_message('password_insert_database', 'Password incorrect');
     return false;
   }
   else
   {
     $password = $this->input->post('password');
     $result = $this->health->set_password($users_id, $password);
     return TRUE;
   }
 }
}

?>