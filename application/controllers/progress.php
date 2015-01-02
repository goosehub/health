<?php
session_start();

class Progress extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('progress_model','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
 }
    function progress_list($slug)
   {
     if($this->session->userdata('logged_in'))
     {
 // Get data
       $data['profile'] = $this->health->get_profile_slug($slug);
       $user_key = $data['profile']['id'];
       $data['progress'] = $this->progress_model->get_all_progress($user_key);
 // Load view
       include 'global.php';
       $data['title'] = 'Progress Points';
       $this->load->view('templates/header', $data);
       $this->load->view('progress/progress_list', $data);
       $this->load->view('templates/footer', $data);
     }
    else
    {
// If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }
   function progress_form()
  {
    if($this->session->userdata('logged_in'))
    {
      include 'global.php';
// Set data to populate form
	    $data['date'] = date("m-d-y");
      $data['profile'] = $this->health->get_profile($users_id);
      $data['progress'] = $this->progress_model->get_progress($users_id);
// If not metric
      if ($data['profile']['metric'] === '0') {
// Set conversion ratios
        $cm_conv = 0.39370079;
        $kg_conv = 2.20462262;
// Convert
        $data['progress']->weight = $data['progress']->weight * $kg_conv;
        $data['progress']->squats = $data['progress']->squats * $kg_conv;
        $data['progress']->bench = $data['progress']->bench * $kg_conv;
        $data['progress']->deadlift = $data['progress']->deadlift * $kg_conv;
        $data['progress']->height = $data['progress']->height * $cm_conv;
        $data['progress']->arm = $data['progress']->arm * $cm_conv;
        $data['progress']->thigh = $data['progress']->thigh * $cm_conv;
        $data['progress']->waist = $data['progress']->waist * $cm_conv;
        $data['progress']->chest = $data['progress']->chest * $cm_conv;
        $data['progress']->calves = $data['progress']->calves * $cm_conv;
        $data['progress']->forearms = $data['progress']->forearms * $cm_conv;
        $data['progress']->neck = $data['progress']->neck * $cm_conv;
        $data['progress']->hips = $data['progress']->hips * $cm_conv;
      }
// Round
      $data['progress']->weight = round($data['progress']->weight, 2, PHP_ROUND_HALF_UP);
      $data['progress']->squats = round($data['progress']->squats, 2, PHP_ROUND_HALF_UP);
      $data['progress']->bench = round($data['progress']->bench, 2, PHP_ROUND_HALF_UP);
      $data['progress']->deadlift = round($data['progress']->deadlift, 2, PHP_ROUND_HALF_UP);
      $data['progress']->height = round($data['progress']->height, 1, PHP_ROUND_HALF_UP);
      $data['progress']->arm = round($data['progress']->arm, 1, PHP_ROUND_HALF_UP);
      $data['progress']->thigh = round($data['progress']->thigh, 1, PHP_ROUND_HALF_UP);
      $data['progress']->waist = round($data['progress']->waist, 1, PHP_ROUND_HALF_UP);
      $data['progress']->chest = round($data['progress']->chest, 1, PHP_ROUND_HALF_UP);
      $data['progress']->calves = round($data['progress']->calves, 1, PHP_ROUND_HALF_UP);
      $data['progress']->forearms = round($data['progress']->forearms, 1, PHP_ROUND_HALF_UP);
      $data['progress']->neck = round($data['progress']->neck, 1, PHP_ROUND_HALF_UP);
      $data['progress']->hips = round($data['progress']->hips, 1, PHP_ROUND_HALF_UP);
      $data['progress']->bodyfat = round($data['progress']->bodyfat, 1, PHP_ROUND_HALF_UP);
// Set unit type
     if ($data['profile']['metric'] === '0') {
       $data['cm'] = 'in';
       $data['kg'] = 'lbs';
     } else {
       $data['cm'] = 'cm';
       $data['kg'] = 'kg';
     }
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
   include 'global.php';
   $data['profile'] = $this->health->get_profile($users_id);
// Validation
   $this->load->library('form_validation');
   $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|max_length[24]');
   $this->form_validation->set_rules('comment', 'Comment', 'trim|xss_clean|max_length[10000]');
   $this->form_validation->set_rules('weight', 'Weight', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('height', 'Height', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('arm', 'Arm', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('thigh', 'Thigh', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('waist', 'Waist', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('chest', 'Chest', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('calves', 'Calves', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('forearms', 'Forearms', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('neck', 'Neck', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('hips', 'Hips', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('bodyfat', 'Bodyfat', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('squats', 'Squats', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('bench', 'Bench', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('deadlift', 'Deadlift', 'trim|xss_clean|numeric');
   $this->form_validation->set_rules('picture-01_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-02_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-03_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-04_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');
   $this->form_validation->set_rules('picture-05_caption', 'Image Caption', 'trim|xss_clean|max_length[500]');

   if($this->form_validation->run() == FALSE)
   {
// Field validation failed.  User redirected to set_profile page
// Load view
      $data['title'] = 'Basic Info Settings';
      $this->load->view('templates/header', $data);
      $this->load->view('progress/progress_form', $data);
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
       if ($data['profile']['metric'] === '0') {
          // Convert lbs to kg
          $weight = $weight * 0.45359237;
          $squats = $squats * 0.45359237;
          $bench = $bench * 0.45359237;
          $deadlift = $deadlift * 0.45359237;
          // Convert in to cm
          $height = $height * 2.54;
          $arm = $arm * 2.54;
          $thigh = $thigh * 2.54;
          $waist = $waist * 2.54;
          $chest = $chest * 2.54;
          $calves = $calves * 2.54;
          $forearms = $forearms * 2.54;
          $neck = $neck * 2.54;
          $hips = $hips * 2.54;
       }
// Check if progress point for today exists
       $point_exists = $this->progress_model->get_progress($users_id);
       $date = date("m-d-y");
       if ($point_exists->date === $date) {
// Update latest progress point
        $result = $this->progress_model->update_progress($users_id, $name, $comment, 
         $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck,
          $hips, $bodyfat, $squats, $bench, $deadlift, $picture_01_caption, 
          $picture_02_caption, $picture_03_caption, $picture_04_caption, $picture_05_caption);
       } else {
// Enter new progress point
       $result = $this->progress_model->set_progress($users_id, $name, $comment, 
        $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck,
         $hips, $bodyfat, $squats, $bench, $deadlift, $picture_01_caption, 
         $picture_02_caption, $picture_03_caption, $picture_04_caption, $picture_05_caption);
     }

//Go to dashboard
       redirect('dashboard', 'refresh');
   }
 }

}
?>