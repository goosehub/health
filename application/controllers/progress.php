<?php
session_start();
date_default_timezone_set('America/New_York');

// This controller is used for all Progress related functions

class Progress extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('progress_model', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
        $this->load->helper(array('date'));
    }
// The progress dashboard
    public function index() {
// If user logged in
        if ($this->session->userdata('logged_in')) {
            include 'global.php';
            $data['title'] = 'My Progress';
            $data['joined'] = date("Y-m-d", $data['self']['joined']);
            $data['today'] = date("Y-m-d", time());
            $this->load->view('templates/header', $data);
            $this->load->view('progress/progress_dash', $data);
            $this->load->view('templates/footer', $data);
        } else {
//If user not logged in, redirect to login page
            redirect('login', 'refresh');
        }
    }
// The progress history
    public function progress_list($slug) {
// Get data
        $data['profile']  = $this->health->get_profile_slug($slug);
        $profile_id       = $data['profile']['id'];
        $data['progress'] = $this->progress_model->get_all_progress($profile_id);
// Load view
        include 'global.php';
        $data['title'] = 'Progress Points';
        $this->load->view('templates/header', $data);
        $this->load->view('progress/progress_list', $data);
        $this->load->view('templates/footer', $data);
    }
// Progress point view
    public function point($slug, $point) {
// If logged in
        if ($this->session->userdata('logged_in')) {
// !!START!! progress comments
// Validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|max_length[500]');
// If validation failed, do nothing
            if ($this->form_validation->run() == FALSE) {
// If validation successful
            } else {
// Get data
                $message       = $this->input->post('message');
                $session_data  = $this->session->userdata('logged_in');
                $friend_key    = $session_data['id'];
                $timestamp     = time();
// Enter into progress_comments table
                $progress_user = $this->health->get_profile_slug($slug);
                $profile_id    = $progress_user['id'];
                $result        = $this->progress_model->comment_insert($profile_id, $friend_key, $point, $message, $timestamp);
// Redirect to page to prevent form resubmission
                redirect('users/' . $slug . '/progress/' . $point . '', 'refresh');
            }
// !!END!! progress comments
        }
// Get Data
        include 'global.php';
        $data['user_username'] = $slug;
        $data['profile']       = $this->health->get_profile_slug($slug);
        $data['point']         = $point;
// Check if profile found
        if (isset($data['profile']['id'])) {
            $friend_key = $data['profile']['id'];
// If found and user logged in, check friend status
            if ($this->session->userdata('logged_in')) {
                $data['friend_status'] = $friend_status = $this->health->friend_status($user_key, $friend_key);
            }
// If friend, user can view page even if private
            if (!empty($friend_status) && $friend_status['status'] === 'accepted') {
                $view_allowed = TRUE;
// If not a friend, privacy will block page from user
            } else {
                $view_allowed = false;
            }
        }
// If profile is not found, load not found page
        if (!$data['profile']) {
            $data['title'] = $slug;
            $data['slug']  = $slug;
            $this->load->view('templates/header', $data);
            $this->load->view('profile/not_found', $data);
            $this->load->view('templates/footer', $data);
        }
// If private and not friends, load private page
        else if ($data['profile']['private'] === 'on' && $view_allowed != TRUE) {
            $data['title'] = $slug;
            $data['slug']  = $slug;
            $this->load->view('templates/header', $data);
            $this->load->view('profile/private', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $profile_id     = $data['profile']['id'];
            $progress       = $data['progress'] = $this->progress_model->get_progress_point($profile_id, $point);
            $data['images'] = $this->progress_model->get_images($profile_id, $point);
// If point not found, load point not found page
            if (!$data['progress']) {
                $data['title'] = 'Progress Points';
                $this->load->view('templates/header', $data);
                $this->load->view('progress/point_not_found', $data);
                $this->load->view('templates/footer', $data);
// Else, load progress point
            } else {
// Get progress comments
                $this->load->helper('date');
                $data['progress_comments'] = $this->progress_model->progress_comments_get($profile_id, $point);
// Set imperial conversion ratios
                $cm_conv                   = 0.39370079;
                $kg_conv                   = 2.20462262;
// Weights Conversions - kg to lbs
                $weights                   = array(
                    'weight' => $progress->weight,
                    'squats' => $progress->squats,
                    'bench' => $progress->bench,
                    'deadlift' => $progress->deadlift
                );
                foreach ($weights as &$value) {
                    $value = $value * $kg_conv;
                }
// Lengths Conversions - cm to inches
                $lengths = array(
                    'height' => $progress->height,
                    'arm' => $progress->arm,
                    'thigh' => $progress->thigh,
                    'waist' => $progress->waist,
                    'chest' => $progress->chest,
                    'calves' => $progress->calves,
                    'forearms' => $progress->forearms,
                    'neck' => $progress->neck,
                    'hips' => $progress->hips
                );
                foreach ($lengths as &$value) {
                    $value = $value * $cm_conv;
                }
// Rounding
                $rounded = array(
                    'weight' => $progress->weight,
                    'squats' => $progress->squats,
                    'bench' => $progress->bench,
                    'deadlift' => $progress->deadlift,
                    'height' => $progress->height,
                    'arm' => $progress->arm,
                    'thigh' => $progress->thigh,
                    'waist' => $progress->waist,
                    'chest' => $progress->chest,
                    'calves' => $progress->calves,
                    'forearms' => $progress->forearms,
                    'neck' => $progress->neck,
                    'hips' => $progress->hips,
                    'i_weight' => $weights['weight'],
                    'i_squats' => $weights['squats'],
                    'i_bench' => $weights['bench'],
                    'i_deadlift' => $weights['deadlift'],
                    'i_height' => $lengths['height'],
                    'i_arm' => $lengths['arm'],
                    'i_thigh' => $lengths['thigh'],
                    'i_waist' => $lengths['waist'],
                    'i_chest' => $lengths['chest'],
                    'i_calves' => $lengths['calves'],
                    'i_forearms' => $lengths['forearms'],
                    'i_neck' => $lengths['neck'],
                    'i_hips' => $lengths['hips'],
                    'bodyfat' => $progress->bodyfat
                );
                foreach ($rounded as &$value) {
                    $value = round($value, 2, PHP_ROUND_HALF_UP);
                }
                $data['measurement'] = $rounded;
// Calculate age
                if ($data['profile']['birthdate'] != '') {
                    $birthdate   = $data['birthdate'] = $data['profile']['birthdate'];
                    $birthdate   = date('Ymd', strtotime($birthdate));
                    $diff        = date('Ymd', $progress->timestamp) - $birthdate;
                    $data['age'] = $data['years'] = substr($diff, 0, -4);
                } else {
                    $data['age'] = $data['profile']['birthdate'];
                }
// Load view
                $this->load->helper('form');
                $data['title'] = 'Progress point for ' . $point;
                $this->load->view('templates/header', $data);
                $this->load->view('progress/point_view', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }
// Compare two progress points
    public function compare($slug, $before, $after, $graph) {
// Load data
        include 'global.php';
        $data['user_username'] = $slug;
        $data['profile']       = $this->health->get_profile_slug($slug);
        $data['before']        = $before;
        $data['after']         = $after;     
// Check if profile is found
        if (isset($data['profile']['id'])) {
            $friend_key = $data['profile']['id'];
// If found and logged in, check friend status
            if ($this->session->userdata('logged_in')) {
                $data['friend_status'] = $friend_status = $this->health->friend_status($user_key, $friend_key);
            }
// If friends, user can view page even if private
            if (!empty($friend_status) && $friend_status['status'] === 'accepted') {
                $view_allowed = TRUE;
// If not a friend, privacy will block page from user
            } else {
                $view_allowed = false;
            }
        }
// If username not found, direct to not found page
        if (!$data['profile']) {
            $data['title'] = $slug;
            $data['slug']  = $slug;
            $this->load->view('templates/header', $data);
            $this->load->view('profile/not_found', $data);
            $this->load->view('templates/footer', $data);
        }
// If private and not friends, direct to private page
        else if ($data['profile']['private'] === 'on' && $view_allowed != TRUE) {
            $data['title'] = $slug;
            $data['slug']  = $slug;
            $this->load->view('templates/header', $data);
            $this->load->view('profile/private', $data);
            $this->load->view('templates/footer', $data);
// Else, move to checking for data points
        } else {
// Get data for points
            $profile_id       = $data['profile']['id'];
            $before_data      = $data['before_data'] = $this->progress_model->get_progress_point($profile_id, $before);
            $data['b_images'] = $this->progress_model->get_images($profile_id, $before);
            $after_data       = $data['after_data'] = $this->progress_model->get_progress_point($profile_id, $after);
            $data['a_images'] = $this->progress_model->get_images($profile_id, $after);
// If either point not found, direct to point not found page
            if (!$data['before_data'] || !$data['after_data']) {
                $data['point'] = $before . ' and ' . $after . '';
                $data['title'] = 'Progress Points';
                $this->load->view('templates/header', $data);
                $this->load->view('progress/point_not_found', $data);
                $this->load->view('templates/footer', $data);
// Else, everything is good to go, load comparison page
            } else {
// Set imperial conversion ratios
                $cm_conv = 0.39370079;
                $kg_conv = 2.20462262;
// Weights Conversions - kg to lbs
                $weights = array(
                    'b_weight' => $before_data->weight,
                    'b_squats' => $before_data->squats,
                    'b_bench' => $before_data->bench,
                    'b_deadlift' => $before_data->deadlift,
                    'a_weight' => $after_data->weight,
                    'a_squats' => $after_data->squats,
                    'a_bench' => $after_data->bench,
                    'a_deadlift' => $after_data->deadlift
                );
                foreach ($weights as &$value) {
                    $value = $value * $kg_conv;
                }
// Lengths Conversions - cm to inches
                $lengths = array(
                    'b_height' => $before_data->height,
                    'b_arm' => $before_data->arm,
                    'b_thigh' => $before_data->thigh,
                    'b_waist' => $before_data->waist,
                    'b_chest' => $before_data->chest,
                    'b_calves' => $before_data->calves,
                    'b_forearms' => $before_data->forearms,
                    'b_neck' => $before_data->neck,
                    'b_hips' => $before_data->hips,
                    'a_height' => $after_data->height,
                    'a_arm' => $after_data->arm,
                    'a_thigh' => $after_data->thigh,
                    'a_waist' => $after_data->waist,
                    'a_chest' => $after_data->chest,
                    'a_calves' => $after_data->calves,
                    'a_forearms' => $after_data->forearms,
                    'a_neck' => $after_data->neck,
                    'a_hips' => $after_data->hips
                );
                foreach ($lengths as &$value) {
                    $value = $value * $cm_conv;
                }
// Rounding
                $rounded = array(
                    'b_weight' => $before_data->weight,
                    'b_squats' => $before_data->squats,
                    'b_bench' => $before_data->bench,
                    'b_deadlift' => $before_data->deadlift,
                    'b_height' => $before_data->height,
                    'b_arm' => $before_data->arm,
                    'b_thigh' => $before_data->thigh,
                    'b_waist' => $before_data->waist,
                    'b_chest' => $before_data->chest,
                    'b_calves' => $before_data->calves,
                    'b_forearms' => $before_data->forearms,
                    'b_neck' => $before_data->neck,
                    'b_hips' => $before_data->hips,
                    'b_i_weight' => $weights['b_weight'],
                    'b_i_squats' => $weights['b_squats'],
                    'b_i_bench' => $weights['b_bench'],
                    'b_i_deadlift' => $weights['b_deadlift'],
                    'b_i_height' => $lengths['b_height'],
                    'b_i_arm' => $lengths['b_arm'],
                    'b_i_thigh' => $lengths['b_thigh'],
                    'b_i_waist' => $lengths['b_waist'],
                    'b_i_chest' => $lengths['b_chest'],
                    'b_i_calves' => $lengths['b_calves'],
                    'b_i_forearms' => $lengths['b_forearms'],
                    'b_i_neck' => $lengths['b_neck'],
                    'b_i_hips' => $lengths['b_hips'],
                    'b_bodyfat' => $before_data->bodyfat,
                    'a_weight' => $after_data->weight,
                    'a_squats' => $after_data->squats,
                    'a_bench' => $after_data->bench,
                    'a_deadlift' => $after_data->deadlift,
                    'a_height' => $after_data->height,
                    'a_arm' => $after_data->arm,
                    'a_thigh' => $after_data->thigh,
                    'a_waist' => $after_data->waist,
                    'a_chest' => $after_data->chest,
                    'a_calves' => $after_data->calves,
                    'a_forearms' => $after_data->forearms,
                    'a_neck' => $after_data->neck,
                    'a_hips' => $after_data->hips,
                    'a_i_weight' => $weights['a_weight'],
                    'a_i_squats' => $weights['a_squats'],
                    'a_i_bench' => $weights['a_bench'],
                    'a_i_deadlift' => $weights['a_deadlift'],
                    'a_i_height' => $lengths['a_height'],
                    'a_i_arm' => $lengths['a_arm'],
                    'a_i_thigh' => $lengths['a_thigh'],
                    'a_i_waist' => $lengths['a_waist'],
                    'a_i_chest' => $lengths['a_chest'],
                    'a_i_calves' => $lengths['a_calves'],
                    'a_i_forearms' => $lengths['a_forearms'],
                    'a_i_neck' => $lengths['a_neck'],
                    'a_i_hips' => $lengths['a_hips'],
                    'a_bodyfat' => $after_data->bodyfat
                );
                foreach ($rounded as &$value) {
                    $value = round($value, 2, PHP_ROUND_HALF_UP);
                }
// Find difference in measurement by subtracting the before from the after
                $rounded['d_weight']     = $rounded['a_weight'] - $rounded['b_weight'];
                $rounded['d_i_weight']   = $rounded['a_i_weight'] - $rounded['b_i_weight'];
                $rounded['d_squats']     = $rounded['a_squats'] - $rounded['b_squats'];
                $rounded['d_i_squats']   = $rounded['a_i_squats'] - $rounded['b_i_squats'];
                $rounded['d_bench']      = $rounded['a_bench'] - $rounded['b_bench'];
                $rounded['d_i_bench']    = $rounded['a_i_bench'] - $rounded['b_i_bench'];
                $rounded['d_deadlift']   = $rounded['a_deadlift'] - $rounded['b_deadlift'];
                $rounded['d_i_deadlift'] = $rounded['a_i_deadlift'] - $rounded['b_i_deadlift'];
                $rounded['d_height']     = $rounded['a_height'] - $rounded['b_height'];
                $rounded['d_i_height']   = $rounded['a_i_height'] - $rounded['b_i_height'];
                $rounded['d_arm']        = $rounded['a_arm'] - $rounded['b_arm'];
                $rounded['d_i_arm']      = $rounded['a_i_arm'] - $rounded['b_i_arm'];
                $rounded['d_calves']     = $rounded['a_calves'] - $rounded['b_calves'];
                $rounded['d_i_calves']   = $rounded['a_i_calves'] - $rounded['b_i_calves'];
                $rounded['d_thigh']      = $rounded['a_thigh'] - $rounded['b_thigh'];
                $rounded['d_i_thigh']    = $rounded['a_i_thigh'] - $rounded['b_i_thigh'];
                $rounded['d_waist']      = $rounded['a_waist'] - $rounded['b_waist'];
                $rounded['d_i_waist']    = $rounded['a_i_waist'] - $rounded['b_i_waist'];
                $rounded['d_chest']      = $rounded['a_chest'] - $rounded['b_chest'];
                $rounded['d_i_chest']    = $rounded['a_i_chest'] - $rounded['b_i_chest'];
                $rounded['d_forearms']   = $rounded['a_forearms'] - $rounded['b_forearms'];
                $rounded['d_i_forearms'] = $rounded['a_i_forearms'] - $rounded['b_i_forearms'];
                $rounded['d_neck']       = $rounded['a_neck'] - $rounded['b_neck'];
                $rounded['d_i_neck']     = $rounded['a_i_neck'] - $rounded['b_i_neck'];
                $rounded['d_hips']       = $rounded['a_hips'] - $rounded['b_hips'];
                $rounded['d_i_hips']     = $rounded['a_i_hips'] - $rounded['b_i_hips'];
                $rounded['d_bodyfat']    = $rounded['a_bodyfat'] - $rounded['b_bodyfat'];
                $data['measurement'] = $rounded;
// Determine if gain or loss change, so plain english can be used in place of math signs
                $changes = array(
                    'c_weight' => $rounded['d_weight'],
                    'c_squats' => $rounded['d_squats'],
                    'c_bench' => $rounded['d_bench'],
                    'c_deadlift' => $rounded['d_deadlift'],
                    'c_height' => $rounded['d_height'],
                    'c_arm' => $rounded['d_arm'],
                    'c_thigh' => $rounded['d_thigh'],
                    'c_waist' => $rounded['d_waist'],
                    'c_chest' => $rounded['d_chest'],
                    'c_calves' => $rounded['d_calves'],
                    'c_forearms' => $rounded['d_forearms'],
                    'c_neck' => $rounded['d_neck'],
                    'c_hips' => $rounded['d_hips'],
                    'c_bodyfat' => $rounded['d_bodyfat']
                );
                foreach ($changes as &$value) {
                    if ($value < 0) {
                        $value = 'Loss of';
                    } else {
                        $value = 'Gain of';
                    }
                }
                $data['change'] = $changes;
// Calculate age
                if ($data['profile']['birthdate'] != '') {
                    $birthdate   = $data['birthdate'] = $data['profile']['birthdate'];
                    $birthdate   = date('Ymd', strtotime($birthdate));
                    $diff        = date('Ymd', $before_data->timestamp) - $birthdate;
                    $data['age'] = $data['years'] = substr($diff, 0, -4);
                } else {
                    $data['age'] = $data['profile']['birthdate'];
                }
// Get items to be graphed
                $timestamp_before = $before_data->timestamp;
                $timestamp_after = $after_data->timestamp;
                $data['graphed'] = $this->progress_model->get_progress_graph(
                    $profile_id, $timestamp_before, $timestamp_after, $graph);
                $data['graph_item'] = ucfirst($graph);
// Load view
                $data['title'] = 'Progress Comparison | ' . $before . ' | ' . $after . '';
                $this->load->view('templates/header', $data);
                $this->load->view('progress/compare', $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }
// Used for finding two points user likely wants to compare
    public function find_compare() {
// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('before', 'Before', 'trim|xss_clean|alpha_numeric|max_length[24]');
        $this->form_validation->set_rules('after', 'After', 'trim|xss_clean|alpha_numeric|max_length[24]');
// Get User Info
        $session_data = $this->session->userdata('logged_in');
        $user_key     = $session_data['id'];
        $slug         = $session_data['username'];
// Format
        $before       = $this->input->post('before');
        $after        = $this->input->post('after');
        $before       = strtotime($before);
        $after        = strtotime($after);
        $before_point = date('m-d-y', $before);
        $after_point  = date('m-d-y', $after);
// Find closest point
        $before       = $this->progress_model->compare_search($user_key, $before, $before_point, 'before');
        $after        = $this->progress_model->compare_search($user_key, $after, $after_point, 'after');
        $before       = $before->date;
        $after        = $after->date;
// Redirect
        redirect('users/' . $slug . '/progress/' . $before . '/' . $after . '/weight', 'refresh');
    }
// Find progress point
    public function find_point($slug) {
// Validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', 'Date', 'trim|xss_clean|alpha_numeric|max_length[24]');
// Get User Info
        $data['profile'] = $this->health->get_profile_slug($slug);
        $user_key        = $data['profile']['id'];
// Format
        $date            = $this->input->post('date');
        $date            = strtotime($date);
        $date_point      = date('m-d-y', $date);
// Find closest point
        $date            = $this->progress_model->compare_search($user_key, $date, $date_point);
        $date            = $date->date;
// Redirect
        redirect('users/' . $slug . '/progress/' . $date . '', 'refresh');
    }
// Used by user to enter progress
    public function progress_form() {
// If user is logged in
        if ($this->session->userdata('logged_in')) {
// Get data
            include 'global.php';
            $data['date']    = date("m-d-y");
            $data['profile'] = $this->health->get_profile($users_id);
            $progress        = $data['progress'] = $this->progress_model->get_progress($users_id);
// If not metric
            if ($data['profile']['metric'] === '0') {
// Set conversion ratios
                $cm_conv = 0.39370079;
                $kg_conv = 2.20462262;
// Convert Weights - kg
                $weights = array(
                    'weight' => $progress->weight,
                    'squats' => $progress->squats,
                    'bench' => $progress->bench,
                    'deadlift' => $progress->deadlift
                );
                foreach ($weights as &$value) {
                    $value = $value * $kg_conv;
                }
// Convert Lengths - cm
                $lengths = array(
                    'height' => $progress->height,
                    'arm' => $progress->arm,
                    'thigh' => $progress->thigh,
                    'waist' => $progress->waist,
                    'chest' => $progress->chest,
                    'calves' => $progress->calves,
                    'forearms' => $progress->forearms,
                    'neck' => $progress->neck,
                    'hips' => $progress->hips
                );
                foreach ($lengths as &$value) {
                    $value = $value * $cm_conv;
                }
// Convert back to progress for consistency with metric users that don't convert
                $data['progress']->weight   = $weights['weight'];
                $data['progress']->squats   = $weights['squats'];
                $data['progress']->bench    = $weights['bench'];
                $data['progress']->deadlift = $weights['deadlift'];
                $data['progress']->height   = $lengths['height'];
                $data['progress']->arm      = $lengths['arm'];
                $data['progress']->thigh    = $lengths['thigh'];
                $data['progress']->waist    = $lengths['waist'];
                $data['progress']->chest    = $lengths['chest'];
                $data['progress']->calves   = $lengths['calves'];
                $data['progress']->forearms = $lengths['forearms'];
                $data['progress']->neck     = $lengths['neck'];
                $data['progress']->hips     = $lengths['hips'];
            }
// Rounding
            $rounded = array(
                'weight' => $progress->weight,
                'squats' => $progress->squats,
                'bench' => $progress->bench,
                'deadlift' => $progress->deadlift,
                'height' => $progress->height,
                'arm' => $progress->arm,
                'thigh' => $progress->thigh,
                'waist' => $progress->waist,
                'chest' => $progress->chest,
                'calves' => $progress->calves,
                'forearms' => $progress->forearms,
                'neck' => $progress->neck,
                'hips' => $progress->hips,
                'bodyfat' => $progress->bodyfat
            );
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
        } else {
// If user not logged in, redirect to login page
            redirect('login', 'refresh');
        }
    }
// Used for processing submitted progress points
    public function set_progress() {
// Get data
        include 'global.php';
        $data['profile'] = $this->health->get_profile($user_key);
// Set Rules
// Involves callback for file upload
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '100000000';
        $config['max_width']     = '10240';
        $config['max_height']    = '7680';
        $config['encrypt_name']  = TRUE;
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
        $name       = $this->input->post('name');
        $comment    = $this->input->post('comment');
        $weight     = $this->input->post('weight');
        $height     = $this->input->post('height');
        $arm        = $this->input->post('arm');
        $thigh      = $this->input->post('thigh');
        $waist      = $this->input->post('waist');
        $chest      = $this->input->post('chest');
        $calves     = $this->input->post('calves');
        $forearms   = $this->input->post('forearms');
        $neck       = $this->input->post('neck');
        $hips       = $this->input->post('hips');
        $bodyfat    = $this->input->post('bodyfat');
        $squats     = $this->input->post('squats');
        $bench      = $this->input->post('bench');
        $deadlift   = $this->input->post('deadlift');
        $caption_01 = $this->input->post('picture_01_caption');
        $caption_02 = $this->input->post('picture_02_caption');
        $caption_03 = $this->input->post('picture_03_caption');
        $caption_04 = $this->input->post('picture_04_caption');
        $caption_05 = $this->input->post('picture_05_caption');
        $caption_06 = $this->input->post('picture_06_caption');
        $file01     = $this->input->post('picture_01');
        $file02     = $this->input->post('picture_02');
        $file03     = $this->input->post('picture_03');
        $file04     = $this->input->post('picture_04');
        $file05     = $this->input->post('picture_05');
        $file06     = $this->input->post('picture_06');
// If validation failed, run the progress_form controller
        if ($this->form_validation->run() == FALSE) {
            $this->progress_form();
        }
// Else enter data
        else {
// Get File Data
            $files = $data['test'] = $this->upload->get_multi_upload_data();
            if (isset($files[0]['file_name'])) {
                $filename_01 = $files[0]['file_name'];
                $filesize_01 = $files[0]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_01, $caption_01, $filesize_01);
            }
            if (isset($files[1]['file_name'])) {
                $filename_02 = $files[1]['file_name'];
                $filesize_02 = $files[1]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_02, $caption_02, $filesize_02);
            }
            if (isset($files[2]['file_name'])) {
                $filename_03 = $files[2]['file_name'];
                $filesize_03 = $files[2]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_03, $caption_03, $filesize_03);
            }
            if (isset($files[3]['file_name'])) {
                $filename_04 = $files[3]['file_name'];
                $filesize_04 = $files[3]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_04, $caption_04, $filesize_04);
            }
            if (isset($files[4]['file_name'])) {
                $filename_05 = $files[4]['file_name'];
                $filesize_05 = $files[4]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_05, $caption_05, $filesize_05);
            }
            if (isset($files[5]['file_name'])) {
                $filename_06 = $files[5]['file_name'];
                $filesize_06 = $files[5]['file_size'];
                $result      = $this->progress_model->upload_images($user_key, $filename_06, $caption_06, $filesize_06);
            }
// If user settings are imperial, do conversions
            if ($data['profile']['metric'] === '0') {
// Convert lbs to kg
                $weight   = $weight * 0.45359237;
                $squats   = $squats * 0.45359237;
                $bench    = $bench * 0.45359237;
                $deadlift = $deadlift * 0.45359237;
// Convert inches to cm
                $height   = $height * 2.54;
                $arm      = $arm * 2.54;
                $thigh    = $thigh * 2.54;
                $waist    = $waist * 2.54;
                $chest    = $chest * 2.54;
                $calves   = $calves * 2.54;
                $forearms = $forearms * 2.54;
                $neck     = $neck * 2.54;
                $hips     = $hips * 2.54;
            }
// Check if progress point for today exists
            $point_exists = $this->progress_model->get_progress($users_id);
            $date         = date("m-d-y");
// If point exists, do update
            if ($point_exists->date === $date) {
                $result = $this->progress_model->update_progress($users_id, $name, $comment, $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck, $hips, $bodyfat, $squats, $bench, $deadlift);
            } else {
// Else, new progress point
                $result = $this->progress_model->set_progress($users_id, $name, $comment, $weight, $height, $arm, $thigh, $waist, $chest, $calves, $forearms, $neck, $hips, $bodyfat, $squats, $bench, $deadlift);
            }
// Redirect to dashboard
            redirect('dashboard', 'refresh');
        }
    }
// Callback for file upload in set_progress
// !!NOTE!! Needs error reporting
    public function file_upload($foo) {
        if (!$this->upload->do_multi_upload("files") && $_FILES['files']['size'] == 0) {
            $this->form_validation->set_message('file_upload', 'Your file was not uploaded successfully');
            return false;
        }
    }
    
}
?>