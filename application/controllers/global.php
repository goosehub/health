<?php

// Logic to decide to use username or real name
// function_exists to prevent redeclare error
if (! function_exists('set_name')) { 
    function set_name($username, $first, $last) {
    // If first name exists, use full name
        if ($first != '') {
            $name = $first . ' ' . $last;
    // Else, use username
        } else {
            $name = $username;
        }
        return $name;
    }
}

// If user logged in
if ($this->session->userdata('logged_in')) {
// Get data to be used across the project
    $data['log_check']     = TRUE;
    $session_data          = $this->session->userdata('logged_in');
    $data['user_key']      = $user_key = $users_id = $data['id'] = $session_data['id'];
    $data['username']      = $session_data['username'];
    $data['self']          = $this->health->get_profile($users_id);
    $data['unread']        = $unread = $this->conversation_model->check_unread($user_key);
    $data['head_requests'] = $head_requests = $this->health->find_requests($user_key);
    $data['now']           = time();
    $data['name']          = set_name($data['username'], $data['self']['first_name'], $data['self']['last_name']);
// Format unread notice if unread exists
    if ($unread != false) {
        $data['unread'] = ' (' . $unread . ')';
    } else {
        $data['unread'] = '';
    }
// Format friend requests notice if friend requests exists
    if (count($head_requests) === 0) {
        $data['head_requests'] = '';
    } else {
        $data['head_requests'] = ' (' . count($head_requests) . ')';
    }
// If not logged in, default unread and requests to prevent PHP errors
} else {
    $data['unread']        = '';
    $data['head_requests'] = '';
}

?>