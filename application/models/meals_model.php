<?php

Class meals_model extends CI_Model {
  
    function new_meal($user_key, $meal_name, $category, $timestamp, $comment, $save_as_recipe,
            $food_result_0, $food_result_1, $food_result_2, $food_result_3, $food_result_4, 
            $food_result_5, $food_result_6, $food_result_7, $food_result_8, $food_result_9, 
            $food_result_10, $food_result_11, $food_result_12, $food_result_13, $food_result_14, 
            $food_result_15, $food_result_16, $food_result_17, $food_result_18, $food_result_19, 
            $food_result_20, $food_result_21, $food_result_22, $food_result_23) {
        $data = array(
            'user_key' => $user_key,
            'name' => $meal_name,
            'saved' => $save_as_recipe,
            'category' => $category,
            'timestamp' => $timestamp,
            'user_comment' => $comment,
            'food_key_01' => $food_result_0,
            'food_key_02' => $food_result_1,
            'food_key_03' => $food_result_2,
            'food_key_04' => $food_result_3,
            'food_key_05' => $food_result_4,
            'food_key_06' => $food_result_5,
            'food_key_07' => $food_result_6,
            'food_key_08' => $food_result_7,
            'food_key_09' => $food_result_8,
            'food_key_10' => $food_result_9,
            'food_key_11' => $food_result_10,
            'food_key_12' => $food_result_11,
            'food_key_13' => $food_result_12,
            'food_key_14' => $food_result_13,
            'food_key_15' => $food_result_14,
            'food_key_16' => $food_result_15,
            'food_key_17' => $food_result_16,
            'food_key_18' => $food_result_17,
            'food_key_19' => $food_result_18,
            'food_key_20' => $food_result_19,
            'food_key_21' => $food_result_20,
            'food_key_22' => $food_result_21,
            'food_key_23' => $food_result_22,
            'food_key_24' => $food_result_23
        );
        $this->db->insert('meals', $data);
        return FALSE;
    }
    function new_food($user_key, $timestamp, $food_name, $save_as_food,
             $food_type_vegetable, $food_type_fruit, $food_type_protein, $food_type_dairy, 
             $food_type_fats, $food_type_grain, $food_type_other, $calories, $calories_fat, 
             $total_fat, $saturated_fat, $trans_fat, $cholesterol, $sodium, $total_carb, 
             $dietary_fiber, $sugars, $protein, $calcium, $folic_acid, $iron, $magnesium, 
             $niacin, $potassium, $riboflavin, $vit_a, $vit_b6, $vit_b12, $vit_c, $vit_d, 
             $vit_e, $zinc) {
        $data = array(
            'user_key' => $user_key,
            'timestamp' => $timestamp,
            'name' => $food_name,
            'saved' =>  $save_as_food,
            'type_vegetable' => $food_type_vegetable,
            'type_fruit' => $food_type_fruit,
            'type_protein' => $food_type_protein,
            'type_dairy' => $food_type_dairy,
            'type_fats' => $food_type_fats,
            'type_grain' => $food_type_grain,
            'type_other' => $food_type_other,
            'calories' => $calories,
            'calories_fat' => $calories_fat,
            'total_fat' => $total_fat,
            'saturated_fat' => $saturated_fat,
            'trans_fat' => $trans_fat,
            'cholesterol' => $cholesterol,
            'sodium' => $sodium,
            'total_carb' => $total_carb,
            'dietary_fiber' => $dietary_fiber,
            'sugars' => $sugars,
            'protein' => $protein,
            'calcium' => $calcium,
            'folic_acid' => $folic_acid,
            'iron' => $iron,
            'magnesium' => $magnesium,
            'niacin' => $niacin,
            'potassium' => $potassium,
            'riboflavin' => $riboflavin,
            'vit_a' => $vit_a,
            'vit_b6' => $vit_b6,
            'vit_b12' => $vit_b12,
            'vit_c' => $vit_c,
            'vit_d' => $vit_d,
            'vit_e' => $vit_e,
            'zinc' => $zinc
        );
        $this->db->insert('foods', $data);
        return $this->db->insert_id();
    }
    
}

?>