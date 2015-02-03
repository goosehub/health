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
    public function meals_list() {
        include 'global.php';
        $data['title'] = 'Meal History';
        $this->load->view('templates/header', $data);
        $this->load->view('meals/meals_list', $data);
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
        // Store Inputs
        $name       = $this->input->post('meal_name');
        $name       = $this->input->post('save_as_recipe');
        $name       = $this->input->post('category');
        $name       = $this->input->post('date');
        $name       = $this->input->post('time');
        $comment    = $this->input->post('comment');
        $food_name[]     = $this->input->post('food_name[]');
        $save_as_food[]     = $this->input->post('save_as_food[]');
        $food_type_vegetable[]     = $this->input->post('food_type_vegetable[]');
        $food_type_fruit[]     = $this->input->post('food_type_fruit[]');
        $food_type_protein[]     = $this->input->post('food_type_protein[]');
        $food_type_dairy[]     = $this->input->post('food_type_dairy[]');
        $food_type_fats[]     = $this->input->post('food_type_fats[]');
        $food_type_grain[]     = $this->input->post('food_type_grain[]');
        $food_type_other[]     = $this->input->post('food_type_other[]');
        $calories[]     = $this->input->post('calories[]');
        $calories_fat[]     = $this->input->post('calories_fat[]');
        $total_fat[]     = $this->input->post('total_fat[]');
        $saturated_fat[]     = $this->input->post('saturated_fat[]');
        $trans_fat[]     = $this->input->post('trans_fat[]');
        $cholesterol[]     = $this->input->post('cholesterol[]');
        $sodium[]     = $this->input->post('sodium[]');
        $total_carb[]     = $this->input->post('total_carb[]');
        $dietary_fiber[]     = $this->input->post('dietary_fiber[]');
        $sugars[]     = $this->input->post('sugars[]');
        $protein[]     = $this->input->post('protein[]');
        $calcium[]     = $this->input->post('calcium[]');
        $folic_acid[]     = $this->input->post('folic_acid[]');
        $iron[]     = $this->input->post('iron[]');
        $magnesium[]     = $this->input->post('magnesium[]');
        $niacin[]     = $this->input->post('niacin[]');
        $potassium[]     = $this->input->post('potassium[]');
        $riboflavin[]     = $this->input->post('riboflavin[]');
        $vit_a[]     = $this->input->post('vit_a[]');
        $vit_b6[]     = $this->input->post('vit_b6[]');
        $vit_b12[]     = $this->input->post('vit_b12[]');
        $vit_c[]     = $this->input->post('vit_c[]');
        $vit_d[]     = $this->input->post('vit_d[]');
        $vit_e[]     = $this->input->post('vit_e[]');
        $zinc[]     = $this->input->post('zinc[]');
// If validation fails, reload meals form and display errors
        if ($this->form_validation->run() == FALSE) {
            $this->meals_new();
        }
        else
        {
// Insert into database
            $result = $this->meals_model->new_meal($user_key);
// Redirect to dashboard
            redirect('dashboard', 'refresh');
        }
    }

    
}

?>