<?php
session_start();
date_default_timezone_set('America/New_York');

// This controller is used for all Meals related functions

class Meals extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('health', '', TRUE);
        $this->load->model('conversation_model', '', TRUE);
        $this->load->model('meals_model', '', TRUE);
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
        $data['today'] = date("Y-m-d", time());
        $data['current_time'] = date("H:i", time());
        $data['title'] = 'New Meal';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_new', $data);
        $this->load->view('templates/footer', $data);
    }
// Meals history
    public function meals_list($slug) {
        include 'global.php';
        $data['profile']  = $this->health->get_profile_slug($slug);
        $profile_id = $data['profile']['id'];
        $data['meals'] = $this->meals_model->get_meal_list($profile_id);
        $data['title'] = 'Meal History';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_list', $data);
        $this->load->view('templates/footer', $data);
    }
// Meal View
    public function meal_view($slug, $meal_slug) {
// Get profile data
        include 'global.php';
        $data['profile']  = $this->health->get_profile_slug($slug);
        $profile_id = $data['profile']['id'];
// Get meal data
        $data['meal'] = $this->meals_model->get_meal_item($profile_id, $meal_slug);
// Get food data
            $data['food'][0] = $this->meals_model->get_food_item($data['meal']->food_key_01);
            $data['food'][1] = $this->meals_model->get_food_item($data['meal']->food_key_02);
            $data['food'][2] = $this->meals_model->get_food_item($data['meal']->food_key_03);
            $data['food'][3] = $this->meals_model->get_food_item($data['meal']->food_key_04);
            $data['food'][4] = $this->meals_model->get_food_item($data['meal']->food_key_05);
            $data['food'][5] = $this->meals_model->get_food_item($data['meal']->food_key_06);
            $data['food'][6] = $this->meals_model->get_food_item($data['meal']->food_key_07);
            $data['food'][7] = $this->meals_model->get_food_item($data['meal']->food_key_08);
            $data['food'][8] = $this->meals_model->get_food_item($data['meal']->food_key_09);
            $data['food'][9] = $this->meals_model->get_food_item($data['meal']->food_key_10);
            $data['food'][10] = $this->meals_model->get_food_item($data['meal']->food_key_11);
            $data['food'][11] = $this->meals_model->get_food_item($data['meal']->food_key_12);
            $data['food'][12] = $this->meals_model->get_food_item($data['meal']->food_key_13);
            $data['food'][13] = $this->meals_model->get_food_item($data['meal']->food_key_14);
            $data['food'][14] = $this->meals_model->get_food_item($data['meal']->food_key_15);
            $data['food'][15] = $this->meals_model->get_food_item($data['meal']->food_key_16);
            $data['food'][16] = $this->meals_model->get_food_item($data['meal']->food_key_17);
            $data['food'][17] = $this->meals_model->get_food_item($data['meal']->food_key_18);
            $data['food'][18] = $this->meals_model->get_food_item($data['meal']->food_key_19);
            $data['food'][19] = $this->meals_model->get_food_item($data['meal']->food_key_20);
            $data['food'][20] = $this->meals_model->get_food_item($data['meal']->food_key_21);
            $data['food'][21] = $this->meals_model->get_food_item($data['meal']->food_key_22);
            $data['food'][22] = $this->meals_model->get_food_item($data['meal']->food_key_23);
            $data['food'][23] = $this->meals_model->get_food_item($data['meal']->food_key_24);
        // 
        $data['title'] = 'Meal History';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_view', $data);
        $this->load->view('templates/footer', $data);
    }
// Meals Create
    public function create_meal() {
// Get User Data
        include 'global.php';
        $data['profile'] = $this->health->get_profile($user_key);
// Set Rules
// Meal Fields
        $this->load->library('form_validation');
        $this->form_validation->set_rules('meal_name', 'Meal Name', 'trim|xss_clean|max_length[64]');
        $this->form_validation->set_rules('date', 'Date', 'trim|xss_clean|max_length[64]|required');
        $this->form_validation->set_rules('time', 'Time', 'trim|xss_clean|max_length[64]|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|xss_clean|max_length[10000]');
// Food Fields
        $this->form_validation->set_rules('food_name[]', 'Meal Name', 'trim|xss_clean|max_length[64]');
        $this->form_validation->set_rules('serving_size[]', 'Serving Sizes', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('calories[]', 'calories', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('calories_fat[]', 'calories_fat', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('total_fat[]', 'total_fat', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('saturated_fat[]', 'saturated_fat', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('trans_fat[]', 'trans_fat', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('cholesterol[]', 'cholesterol', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('sodium[]', 'sodium', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('total_carb[]', 'total_carb', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('dietary_fiber[]', 'dietary_fiber', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('sugars[]', 'sugars', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('protein[]', 'protein', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('calcium[]', 'calcium', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('folic_acid[]', 'folic_acid', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('iron[]', 'iron', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('magnesium[]', 'magnesium', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('niacin[]', 'niacin', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('potassium[]', 'potassium', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('riboflavin[]', 'riboflavin', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_a[]', 'vit_a', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_b6[]', 'vit_b6', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_b12[]', 'vit_b12', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_c[]', 'vit_c', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_d[]', 'vit_d', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('vit_e[]', 'vit_e', 'trim|xss_clean|max_length[12]|numeric');
        $this->form_validation->set_rules('zinc[]', 'zinc', 'trim|xss_clean|max_length[12]|numeric');
// Store inputs
        $meal_name       = $this->input->post('meal_name');
        $save_as_recipe       = $this->input->post('save_as_recipe');
        $category       = $this->input->post('category');
        $date       = $this->input->post('date');
        $time       = $this->input->post('time');
        $comment    = $this->input->post('comment');
        $save_as_recipe    = $this->input->post('save_as_recipe');
        $food_name    = $this->input->post('food_name');
        $save_as_food    = $this->input->post('save_as_food');
        $food_type_vegetable    = $this->input->post('food_type_vegetable');
        $food_type_fruit    = $this->input->post('food_type_fruit');
        $food_type_protein    = $this->input->post('food_type_protein');
        $food_type_dairy    = $this->input->post('food_type_dairy');
        $food_type_fats    = $this->input->post('food_type_fats');
        $food_type_grain    = $this->input->post('food_type_grain');
        $food_type_other    = $this->input->post('food_type_other');
        $calories    = $this->input->post('calories');
        $calories_fat    = $this->input->post('calories_fat');
        $total_fat    = $this->input->post('total_fat');
        $saturated_fat    = $this->input->post('saturated_fat');
        $trans_fat    = $this->input->post('trans_fat');
        $cholesterol    = $this->input->post('cholesterol');
        $sodium    = $this->input->post('sodium');
        $total_carb    = $this->input->post('total_carb');
        $dietary_fiber    = $this->input->post('dietary_fiber');
        $sugars    = $this->input->post('sugars');
        $protein    = $this->input->post('protein');
        $calcium    = $this->input->post('calcium');
        $folic_acid    = $this->input->post('folic_acid');
        $iron    = $this->input->post('iron');
        $magnesium    = $this->input->post('magnesium');
        $niacin    = $this->input->post('niacin');
        $potassium    = $this->input->post('potassium');
        $riboflavin    = $this->input->post('riboflavin');
        $vit_a    = $this->input->post('vit_a');
        $vit_b6    = $this->input->post('vit_b6');
        $vit_b12    = $this->input->post('vit_b12');
        $vit_c    = $this->input->post('vit_c');
        $vit_d    = $this->input->post('vit_d');
        $vit_e    = $this->input->post('vit_e');
        $zinc    = $this->input->post('zinc');
// Turn date and time into timestamp, then timestamp into slug
        $datetime = $date.' '.$time;
        $timestamp = strtotime($datetime);
        $slug = date('M-d-Y_h:i_A', $timestamp);

// If validation fails, reload meals form and display errors
        if ($this->form_validation->run() == FALSE) {
            $this->meals_new();
        }
        else
        {
// Insert into foods table with loop
            for ($i = 0; $i < 24; $i++)
            {
// Give empty checkbox and radio inputs a blank value
                if (! isset($save_as_food[$i])) { $save_as_food[$i] = ''; }
                if (! isset($food_type_vegetable[$i])) { $food_type_vegetable[$i] = ''; }
                if (! isset($food_type_fruit[$i])) { $food_type_fruit[$i] = ''; }
                if (! isset($food_type_protein[$i])) { $food_type_protein[$i] = ''; }
                if (! isset($food_type_dairy[$i])) { $food_type_dairy[$i] = ''; }
                if (! isset($food_type_fats[$i])) { $food_type_fats[$i] = ''; }
                if (! isset($food_type_grain[$i])) { $food_type_grain[$i] = ''; }
                if (! isset($food_type_other[$i])) { $food_type_other[$i] = ''; }
// When food does not exist, make the result a blank value
                if (! isset($food_name[$i])) {
                    $food_result[$i] = '';
                }
                else
                {
                    $food_result[$i] = $this->meals_model->new_food($user_key, $timestamp, 
                    $food_name[$i], $save_as_food[$i], $food_type_vegetable[$i], $food_type_fruit[$i],
                    $food_type_protein[$i], $food_type_dairy[$i], $food_type_fats[$i], 
                    $food_type_grain[$i], $food_type_other[$i], $calories[$i], $calories_fat[$i], 
                    $total_fat[$i], $saturated_fat[$i], $trans_fat[$i], $cholesterol[$i],
                    $sodium[$i], $total_carb[$i], $dietary_fiber[$i], $sugars[$i], 
                    $protein[$i], $calcium[$i], $folic_acid[$i], $iron[$i], $magnesium[$i], 
                    $niacin[$i], $potassium[$i], $riboflavin[$i], $vit_a[$i], $vit_b6[$i],
                    $vit_b12[$i], $vit_c[$i], $vit_d[$i], $vit_e[$i], $zinc[$i] );
                }
            }
// Insert into meals table
            if (! isset($save_as_recipe)) { $save_as_recipe = ''; }
            $result = $this->meals_model->new_meal($user_key, $meal_name, $category,
            $timestamp, $slug, $comment, $save_as_recipe,
            $food_result[0], $food_result[1], $food_result[2], $food_result[3], $food_result[4], 
            $food_result[5], $food_result[6], $food_result[7], $food_result[8], $food_result[9], 
            $food_result[10], $food_result[11], $food_result[12], $food_result[13], $food_result[14], 
            $food_result[15], $food_result[16], $food_result[17], $food_result[18], $food_result[19], 
            $food_result[20], $food_result[21], $food_result[22], $food_result[23] );
// Redirect to dashboard
            redirect('dashboard', 'refresh');
// Testing
            // $data['test'] = $food_type_fruit;
            // $data['count'] = count($food_name);
            // include 'global.php';
            // $data['today'] = date("Y-m-d", time());
            // $data['current_time'] = date("H:i", time());
            // $data['title'] = 'New Meal';
            // $this->load->view('templates/header', $data);
            // $this->load->view('meals/meals_new', $data);
            // $this->load->view('templates/footer', $data);
        }
    }

    
}

?>