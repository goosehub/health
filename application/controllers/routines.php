<?php
session_start();
date_default_timezone_set('America/New_York');

// This controller is used for all Routine related functions

class Routines extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
        $this->load->helper(array(
            'form',
            'url',
            'date'
        ));
    }
// Routine dashboard
    public function index() {
        include 'global.php';
        $data['title'] = 'Meal Tracker';
        $this->load->view('templates/header', $data);
        $this->load->view('routines/routines_dash', $data);
        $this->load->view('templates/footer', $data);
    }
// Routine form
    public function routines_new() {
        include 'global.php';
        $data['title'] = 'New Routine';
        $this->load->view('templates/header', $data);
        $this->load->view('routines/routines_new', $data);
        $this->load->view('templates/footer', $data);
    }
// Routine history/list
    public function routines_list() {
        include 'global.php';
        $data['title'] = 'Routine History';
        $this->load->view('templates/header', $data);
        $this->load->view('routines/routines_list', $data);
        $this->load->view('templates/footer', $data);
    }
    
}

?>