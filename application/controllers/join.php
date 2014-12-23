<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
     session_start();

class Join extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
 }

 function verifyjoin()
  {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_insert_database');

   if($this->form_validation->run() == FALSE)
   {
      $data['log_check'] = FALSE;
     //Field validation failed.  User redirected to join page
     $this->load->view('templates/header', $data);
     $this->load->view('pages/join', $data);
     $this->load->view('templates/footer', $data);
   }
   else
   {

     //Go to private area
     redirect('dashboard', 'refresh');
   }
 }
  function insert_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = md5($password);

//query the database
   $result = $this->health->login($username, $password);

   if($result)
   {
     $this->form_validation->set_message('check_database', 'Username already exists');
     return false;
   }
   else
   {
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