<?php
if($this->session->userdata('logged_in'))
    {
        $data['log_check'] = TRUE;
        $session_data = $this->session->userdata('logged_in');
        $data['user_key'] = $user_key = $users_id = $data['id'] = $session_data['id'];
	    $data['username'] = $session_data['username'];
     	$data['self'] = $this->health->get_profile($users_id);
        $data['unread'] = $this->conversation_model->check_unread($user_key);
    }
?>