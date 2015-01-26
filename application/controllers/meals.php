<?php
session_start();
date_default_timezone_set('America/New_York');

// This controller is used for all Meals related functions

class Meals extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
        $this->load->helper(array(
            'form',
            'url',
            'date'
        ));
    }
// Meals dashboard
    public function index() {
        include 'global.php';
        $data['title'] = 'Meal Tracker';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_dash', $data);
        $this->load->view('templates/footer', $data);
    }
// Meals form
    public function meals_new() {
        include 'global.php';
        $data['title'] = 'New Meal';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_new', $data);
        $this->load->view('templates/footer', $data);
    }
// Meals history
    public function meals_list() {
        include 'global.php';
        $data['title'] = 'Meal History';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_list', $data);
        $this->load->view('templates/footer', $data);
    }
    
}

?>