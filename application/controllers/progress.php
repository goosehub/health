<?php
session_start();

class Progress extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('progress_model','',TRUE);
 }
   function progress_form()
  {
    if($this->session->userdata('logged_in'))
    {
      $data['log_check'] = TRUE;
// Set data to populate form
      $time = time();
	    $data['date'] = date("m/d/y gA");
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['progress'] = $this->progress_model->get_progress($users_id);
      $data['username'] = $session_data['username'];
// Load view
      $data['title'] = 'Set a Progress Point';
      $this->load->view('templates/header', $data);
      $this->load->view('progress/progress_form', $data);
      $this->load->view('templates/footer', $data);
    }
    else
    {
// If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }
  public function set_progress()
 {
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
   $this->form_validation->set_rules('comment', 'Comment', 'trim|xss_clean|max_length[10000]');
   $this->form_validation->set_rules('weight', 'Weight', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('height', 'Height', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('arm', 'Arm', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('thigh', 'Thigh', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('waist', 'Waist', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('chest', 'Chest', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('calves', 'Calves', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('forearms', 'Forearms', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('neck', 'Neck', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('hips', 'Hips', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('bodyfat', 'Bodyfat', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('squats', 'Squats', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('bench', 'Bench', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('deadlift', 'Deadlift', 'trim|xss_clean|integer');
   $this->form_validation->set_rules('picture-01_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-02_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-03_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-04_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-05_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');

   if($this->form_validation->run() == FALSE)
   {
//Field validation failed.  User redirected to set_profile page
      $session_data = $this->session->userdata('logged_in');
      $users_id = $data['id'] = $session_data['id'];
      settype($users_id, "integer");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['username'] = $session_data['username'];
      $data['log_check'] = TRUE;
// Load view
      $data['title'] = 'Basic Info Settings';
      $this->load->view('templates/header', $data);
      $this->load->view('user/set_profile', $data);
      $this->load->view('templates/footer', $data);
   }
   else
   {
       $name = $this->input->post('name');
       $comment = $this->input->post('comment');
       $weight = $this->input->post('weight');
       $height = $this->input->post('height');
       $arm = $this->input->post('arm');
       $thigh = $this->input->post('thigh');
       $waist = $this->input->post('waist');
       $chest = $this->input->post('chest');
       $calves = $this->input->post('calves');
       $forearms = $this->input->post('forearms');
       $neck = $this->input->post('neck');
       $hips = $this->input->post('hips');
       $bodyfat = $this->input->post('bodyfat');
       $squats = $this->input->post('squats');
       $bench = $this->input->post('bench');
       $deadlift = $this->input->post('deadlift');
       $picture_01_caption = $this->input->post('picture_01_caption');
       $picture_02_caption = $this->input->post('picture_02_caption');
       $picture_03_caption = $this->input->post('picture_03_caption');
       $picture_04_caption = $this->input->post('picture_04_caption');
       $picture_05_caption = $this->input->post('picture_05_caption');
    // Get user id
       $session_data = $this->session->userdata('logged_in');
       $users_id = $data['id'] = $session_data['id'];;
    // Enter progress into progress tables
         $result = $this->progress_model->set_progress($users_id, $name, $comment, 
          $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck,
           $hips, $bodyfat, $squats, $bench, $deadlift, $picture_01_caption, 
           $picture_02_caption, $picture_03_caption, $picture_04_caption, $picture_05_caption);
     //Go to dashboard
     redirect('dashboard', 'refresh');
   }
 }

}
?>