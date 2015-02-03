<?php

Class meals_model extends CI_Model {
  
    function new_meal($user_key) {
        $now  = time();
        $data = array(
            'timestamp' => $now,
            'user_key' => $user_key
        );
        $this->db->insert('meals', $data);
        return FALSE;
    }
    
}

?>