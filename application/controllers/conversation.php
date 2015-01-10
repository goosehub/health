<?php
session_start();
date_default_timezone_set('America/New_York');

class Conversation extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('conversation_model','',TRUE);
   $this->load->helper('date');
 }

  function index()
  {
    if($this->session->userdata('logged_in'))
    {
        include 'global.php';
        $data['convos'] = $this->conversation_model->conversation_list($user_key);
        function get_day_name($timestamp) {
            $date = date('d/m/Y', $timestamp);
            if($date == date('d/m/Y')) {
              $day_name = 'Today at';
            } 
            else if($date == date('d/m/Y',now() - (24 * 60 * 60))) 
            {
              $day_name = 'Yesterday at';
            }
            else
            {
              $day_name = date('M d Y', $timestamp);
            }
            $hours_mins = date('H:m a', $timestamp);
            return $day_name.' '.$hours_mins;
        }
// Load view
        $data['title'] = "Your Conversations";
        $this->load->view('templates/header', $data);
        $this->load->view('user/conversations_list', $data);
        $this->load->view('templates/footer', $data);
    }
  }
  function view($slug)
  {
    if($this->session->userdata('logged_in'))
    {
      include 'global.php';
      $this->load->helper('date');
// Get information for both posting and viewing
      $data['friend'] = $friend_key = $this->health->get_profile_slug($slug);
      $friend_key = $data['friend']['id'];
      $timestamp = $data['now'] = time();
// Posting messages
// Validation
     $this->load->library('form_validation');
     $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[10000]');
     if($this->form_validation->run() == FALSE)
    { //Field validation failed
    }
    else
    {
// Insert message in database
      $message = $this->input->post('message');
      $result = $this->conversation_model->new_message($user_key, $friend_key, $message, $timestamp);
    }
// Viewing messages
// Load Messages
      $data['test1'] = $user_key;
      $data['test2'] = $friend_key;
      $data['messages'] = $this->conversation_model->load_messages($user_key, $friend_key);
// Load view
      $data['title'] = "Conversation with ".$data['friend']['username'];
      $this->load->view('templates/header', $data);
      $this->load->view('user/conversation_view', $data);
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