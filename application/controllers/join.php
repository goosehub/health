<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();

class Join extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
 }
  function index()
  {
    include 'global.php';
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
   $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to join page
      include 'global.php';
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
//Field validation succeeded.
   $email = $this->input->post('email');
   $username = $this->input->post('username');
   $password = md5($password);

//Submit to model to enter user into users table
   $result = $this->health->join($username, $password, $email);

   if($result)
   {
// Username already exists
     $this->form_validation->set_message('insert_database', 'Username already exists');
     return false;
   }
   else
   {
// Success
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
    include 'global.php';
    $data['username'] = $session_data['username'];
    $users_id = $data['id'] = $session_data['id'];
    $data['profile'] = $this->health->get_profile($users_id);
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