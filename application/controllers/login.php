<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
 }

 function verifylogin()
  {
//This method will have the validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to login page
     include 'global.php';
     $data['title'] = 'Login';
     $this->load->view('templates/header');
     $this->load->view('pages/login');
     $this->load->view('templates/footer');
   }
   else
   {
//Go to private area
     redirect('dashboard', 'refresh');
   }

 }
  function check_database($password)
 {
//Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

//query the database
   $result = $this->health->login($username, $password);

// Advanced Validation

// Prevent user from accessing facebook accounts without being logged into to the facebook
   if ($password === 'facebook')
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
// Login if successful
   else if ($result)
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
     return TRUE;
   }
// Invalid username or password
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
  function logout()
  {
    session_start();
// Clear session data
    $this->session->unset_userdata('logged_in');
    session_destroy();
// Send to login page
    redirect('', 'refresh');
  }

}

?>