<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Join extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
 }
  function index()
  {
    $data['title'] = 'Join';
    $this->load->view('templates/header', $data);
    $this->load->view('pages/join', $data);
    $this->load->view('templates/footer', $data);
  }
 function verifyjoin()
  {
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_dash|max_length[24]');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|alpha_dash|max_length[24]|matches[confirm_password]|callback_insert_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to join page
      $data['title'] = 'Join';
      $this->load->view('templates/header', $data);
      $this->load->view('pages/join', $data);
      $this->load->view('templates/footer', $data);
   }
   else
   {
//Login
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $result = $this->health->login($username, $password);
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
   }
// Go to start function
     redirect('join/start', 'refresh');
   }
 }
  function insert_database($password)
 {
//Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = md5($password);

//query the database
   $result = $this->health->join($username, $password);

   if($result)
   {
// Username already exists
     $this->form_validation->set_message('insert_database', 'Username already exists');
     return false;
   }
   else
   {
// Enter user into users tables
     $result = $this->health->join($username, $password);
     $sess_array = array();
     $sess_array = array(
     'username' => $username
     );

     $this->session->set_userdata('logged_in', $sess_array);
     return TRUE;
   }
 }
    function start()
// This class is set_profile with starting out guidance
  {
    if($this->session->userdata('logged_in'))
    {
// Set data to populate form
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $users_id = $data['id'] = $session_data['id'];
    settype($users_id, "integer");
    $data['profile'] = $this->health->get_profile($users_id);
    $data['log_check'] = TRUE;
    $data['title'] = 'Getting Set Up';
    $this->load->view('templates/header', $data);
    $this->load->view('pages/start', $data);
    $this->load->view('user/set_profile', $data);
    $this->load->view('templates/footer', $data);
    }
    else
    {
//If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }

}

?>