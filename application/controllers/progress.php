<?php
session_start();
date_default_timezone_set('America/New_York');

class Progress extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('health','',TRUE);
   $this->load->model('progress_model','',TRUE);
   $this->load->model('conversation_model','',TRUE); 
   $this->load->helper(array('form', 'url', 'date'));
 }
    function progress_list($slug)
   {
     if($this->session->userdata('logged_in'))
     {
 // Get data
       $data['profile'] = $this->health->get_profile_slug($slug);
       $profile_id = $data['profile']['id'];
       $data['progress'] = $this->progress_model->get_all_progress($profile_id);
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
  function point($slug, $point)
  {
// Log check
    if($this->session->userdata('logged_in'))
    {
// Enter progress comment
// Validation
       $this->load->library('form_validation');
       $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[500]');
      if ($this->form_validation->run() == FALSE)
      {
//Field validation failed
      }
      else
      {
// Get information
        $message = $this->input->post('message');
        $session_data = $this->session->userdata('logged_in');
        $friend_key = $session_data['id'];
        $timestamp = time();
// Enter into progress_comments table
        $progress_user = $this->health->get_profile_slug($slug);
        $profile_id = $progress_user['id'];
        $result = $this->progress_model->comment_insert($profile_id, $friend_key, $point,
        $message, $timestamp);
// Redirect to page to prevent form resubmission
          redirect('users/'.$slug.'/progress/'.$point.'', 'refresh');
        }
    }
    include 'global.php';
    $data['user_username'] = $slug;
    $data['point'] = $point;
    $data['profile'] = $this->health->get_profile_slug($slug);
    if (isset($data['profile']['id'])) {  
      $friend_key = $data['profile']['id'];
      if($this->session->userdata('logged_in'))
      { $data['friend_status'] = $friend_status = $this->health->friend_status($user_key, $friend_key); }
        if (!empty($friend_status) && $friend_status[0]->status === 'accepted') 
        { $view_allowed = TRUE; } else { $view_allowed = false; } 
    }
// If not found, direct to not found page
    if (! $data['profile']) {
      $data['title'] = $slug;
      $data['slug'] = $slug;
      $this->load->view('templates/header', $data);
      $this->load->view('profile/not_found', $data);
      $this->load->view('templates/footer', $data);
    } 
// If private and not friends, direct to private page
    else if ($data['profile']['private'] === 'on'
      && $view_allowed != TRUE) {
      $data['title'] = $slug;
      $data['slug'] = $slug;
      $this->load->view('templates/header', $data);
      $this->load->view('profile/private', $data);
      $this->load->view('templates/footer', $data);
    }
    else
    {
      $profile_id = $data['profile']['id'];
      $progress = $data['progress'] = $this->progress_model->get_progress_point($profile_id, $point);
      $data['images'] = $this->progress_model->get_images($profile_id, $point);
// If point not found, direct to point not found page
      if (! $data['progress']) {
        $data['title'] = 'Progress Points';
        $this->load->view('templates/header', $data);
        $this->load->view('progress/point_not_found', $data);
        $this->load->view('templates/footer', $data);
      }
      else
      {
// Get progress comments
        $this->load->helper('date');
        $data['progress_comments'] = $this->progress_model->progress_comments_get($profile_id, $point);
// Imperial Conversions
// Set conversion ratios
        $cm_conv = 0.39370079;
        $kg_conv = 2.20462262;
// Weights Conversions - kg to lbs
        $weights = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
          'deadlift'=>$progress->deadlift); 
        foreach ($weights as &$value) {
            $value = $value * $kg_conv;
        }
// Lengths Conversions - cm to inches
        $lengths = array('height'=>$progress->height, 'arm'=>$progress->arm, 'thigh'=>$progress->thigh,
          'waist'=>$progress->waist, 'chest'=>$progress->chest, 'calves'=>$progress->calves,
          'forearms'=>$progress->forearms, 'neck'=>$progress->neck, 'hips'=>$progress->hips); 
        foreach ($lengths as &$value) {
            $value = $value * $cm_conv;
        }
// Rounding
      $rounded = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
        'deadlift'=>$progress->deadlift, 'height'=>$progress->height, 'arm'=>$progress->arm,
        'thigh'=>$progress->thigh, 'waist'=>$progress->waist, 'chest'=>$progress->chest, 
        'calves'=>$progress->calves, 'forearms'=>$progress->forearms, 'neck'=>$progress->neck,
        'hips'=>$progress->hips, 'i_weight'=>$weights['weight'], 'i_squats'=>$weights['squats'], 'i_bench'=>$weights['bench'],
        'i_deadlift'=>$weights['deadlift'], 'i_height'=>$lengths['height'], 'i_arm'=>$lengths['arm'],
        'i_thigh'=>$lengths['thigh'], 'i_waist'=>$lengths['waist'], 'i_chest'=>$lengths['chest'], 
        'i_calves'=>$lengths['calves'], 'i_forearms'=>$lengths['forearms'], 'i_neck'=>$lengths['neck'],
        'i_hips'=>$lengths['hips'], 'bodyfat'=>$progress->bodyfat); 
      foreach ($rounded as &$value) {
        $value = round($value, 2, PHP_ROUND_HALF_UP);
      }
      $data['measurement'] = $rounded;
// Calculate age
      if ($data['profile']['birthdate'] != '') 
      {
        $birthdate = $data['birthdate'] = $data['profile']['birthdate'];
        $birthdate = date('Ymd', strtotime($birthdate));
        $diff = date('Ymd', $progress->timestamp) - $birthdate;
        $data['age'] = $data['years'] = substr($diff, 0, -4);
      }
      else
      {
        $data['age'] = $data['profile']['birthdate'];
      }
  // Load view
        $this->load->helper('form');
        $data['title'] = 'Progress point for '.$point;
        $this->load->view('templates/header', $data);
        $this->load->view('progress/point_view', $data);
        $this->load->view('templates/footer', $data);
      }
    }
  }
  public function progress_form()
  {
    if($this->session->userdata('logged_in'))
    {
      include 'global.php';
	    $data['date'] = date("m-d-y");
      $data['profile'] = $this->health->get_profile($users_id);
      $progress = $data['progress'] = $this->progress_model->get_progress($users_id);
// If not metric
      if ($data['profile']['metric'] === '0') {
// Set conversion ratios
        $cm_conv = 0.39370079;
        $kg_conv = 2.20462262;
// Convert
        // Weights - kg
        $weights = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
          'deadlift'=>$progress->deadlift); 
        foreach ($weights as &$value) {
            $value = $value * $kg_conv;
        }
        // Lengths - cm
        $lengths = array('height'=>$progress->height, 'arm'=>$progress->arm, 'thigh'=>$progress->thigh,
          'waist'=>$progress->waist, 'chest'=>$progress->chest, 'calves'=>$progress->calves,
          'forearms'=>$progress->forearms, 'neck'=>$progress->neck, 'hips'=>$progress->hips); 
        foreach ($lengths as &$value) {
            $value = $value * $cm_conv;
        }

// Convert back to progress for consistency with metric users that don't convert
        $data['progress']->weight = $weights['weight'];
        $data['progress']->squats = $weights['squats'];
        $data['progress']->bench = $weights['bench'];
        $data['progress']->deadlift = $weights['deadlift'];
        $data['progress']->height = $lengths['height'];
        $data['progress']->arm = $lengths['arm'];
        $data['progress']->thigh = $lengths['thigh'];
        $data['progress']->waist = $lengths['waist'];
        $data['progress']->chest = $lengths['chest'];
        $data['progress']->calves = $lengths['calves'];
        $data['progress']->forearms = $lengths['forearms'];
        $data['progress']->neck = $lengths['neck'];
        $data['progress']->hips = $lengths['hips'];
      }

// Round

      $rounded = array('weight'=>$progress->weight, 'squats'=>$progress->squats, 'bench'=>$progress->bench,
        'deadlift'=>$progress->deadlift, 'height'=>$progress->height, 'arm'=>$progress->arm,
        'thigh'=>$progress->thigh, 'waist'=>$progress->waist, 'chest'=>$progress->chest, 
        'calves'=>$progress->calves, 'forearms'=>$progress->forearms, 'neck'=>$progress->neck,
        'hips'=>$progress->hips, 'bodyfat'=>$progress->bodyfat); 
      foreach ($rounded as &$value) {
        $value = round($value, 2, PHP_ROUND_HALF_UP);
      }
      $data['measurement'] = $rounded;

// Set unit type
     if ($data['profile']['metric'] === '0') {
       $data['cm'] = 'inches';
       $data['kg'] = 'pounds';
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
// Set some basic info
   include 'global.php';
   $data['profile'] = $this->health->get_profile($users_id);

// Set Rules
   $config['upload_path'] = './uploads/';
   $config['allowed_types'] = 'gif|jpg|png';
   $config['max_size'] = '100000000';
   $config['max_width']  = '10240';
   $config['max_height']  = '7680';
   $config['encrypt_name'] = TRUE;
   $this->load->library('upload', $config);
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
   $this->form_validation->set_rules('picture-06_caption', 'Image Caption', 'trim|xss_clean|max_length[500]|callback_file_upload');

// Store Inputs
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
   $caption_01 = $this->input->post('picture_01_caption');
   $caption_02 = $this->input->post('picture_02_caption');
   $caption_03 = $this->input->post('picture_03_caption');
   $caption_04 = $this->input->post('picture_04_caption');
   $caption_05 = $this->input->post('picture_05_caption');
   $caption_06 = $this->input->post('picture_06_caption');
   $file01 = $this->input->post('picture_01');
   $file02 = $this->input->post('picture_02');
   $file03 = $this->input->post('picture_03');
   $file04 = $this->input->post('picture_04');
   $file05 = $this->input->post('picture_05');
   $file06 = $this->input->post('picture_06');

// Validate text fields
   if($this->form_validation->run() == FALSE)
   {
      $this->progress_form();
   }
// Validate file fields
   // else 
   else
   {
// Store Data

// Get File Data
        $files = $data['test'] = $this->upload->get_multi_upload_data();
        if (isset($files[0]['file_name'])) 
          {
            $filename_01 = $files[0]['file_name'];
            $filesize_01 = $files[0]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_01, $caption_01, $filesize_01);
          }
        if (isset($files[1]['file_name'])) 
          {
            $filename_02 = $files[1]['file_name'];
            $filesize_02 = $files[1]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_02, $caption_02, $filesize_02);
          }
        if (isset($files[2]['file_name'])) 
          {
            $filename_03 = $files[2]['file_name'];
            $filesize_03 = $files[2]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_03, $caption_03, $filesize_03);
          }
        if (isset($files[3]['file_name'])) 
          {
            $filename_04 = $files[3]['file_name'];
            $filesize_04 = $files[3]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_04, $caption_04, $filesize_04);
          }
        if (isset($files[4]['file_name'])) 
          {
            $filename_05 = $files[4]['file_name'];
            $filesize_05 = $files[4]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_05, $caption_05, $filesize_05);
          }
        if (isset($files[5]['file_name'])) 
          {
            $filename_06 = $files[5]['file_name'];
            $filesize_06 = $files[5]['file_size'];
            $result = $this->progress_model->upload_images($user_key, $filename_06, $caption_06, $filesize_06);
          }
        // $filesize = $files['file_size'];
        // $result = $this->progressfilename_05, $caption_05);

// If user settings are imperial, do conversions
       if ($data['profile']['metric'] === '0') {
          // Convert lbs to kg
          $weight = $weight * 0.45359237;
          $squats = $squats * 0.45359237;
          $bench = $bench * 0.45359237;
          $deadlift = $deadlift * 0.45359237;
          // Convert inches to cm
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
            $hips, $bodyfat, $squats, $bench, $deadlift);
       } 
       else
       {
// Enter new progress point
         $result = $this->progress_model->set_progress($users_id, $name, $comment, 
          $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck,
           $hips, $bodyfat, $squats, $bench, $deadlift);
     }

//Go to dashboard
       redirect('dashboard', 'refresh');
        // $this->load->view('templates/test', $data);

   }
 }
 function file_upload($foo)
 {
    if(! $this->upload->do_multi_upload("files")
      && $_FILES['files']['size'] == 0)
       {
          $this->form_validation->set_message('file_upload', 'Your file was not uploaded successfully');
          return false;
       }
 }

}
?>