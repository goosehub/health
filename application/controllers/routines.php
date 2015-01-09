<?php
session_start();
date_default_timezone_set('America/New_York');

class Routines extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
   $this->load->helper(array('form', 'url', 'date'));
 }
  function index()
  {
       include 'global.php';
       $data['title'] = 'Meal Tracker';
       $this->load->view('templates/header', $data);
       $this->load->view('routines/routines_dash', $data);
       $this->load->view('templates/footer', $data);   
  }

}

?>