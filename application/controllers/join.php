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
    $data['log_check'] = FALSE;
    $data['title'] = 'Join';
    $this->load->view('templates/header', $data);
    $this->load->view('pages/join', $data);
    $this->load->view('templates/footer', $data);
  }
 function verifyjoin()
  {
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_insert_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to join page
      $data['log_check'] = FALSE;
      $this->load->view('templates/header', $data);
      $this->load->view('pages/join', $data);
      $this->load->view('templates/footer', $data);
   }
   else
   {
     //Go to private area
     redirect('login', 'refresh');
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
     $this->form_validation->set_message('check_database', 'Username already exists');
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

}

?>