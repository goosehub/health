<?php
    if($this->session->userdata('logged_in'))
    {
        $data['log_check'] = TRUE;
        $session_data = $this->session->userdata('logged_in');
        $data['user_key'] = $user_key = $users_id = $data['id'] = $session_data['id'];
	    $data['username'] = $session_data['username'];
     	$data['self'] = $this->health->get_profile($users_id);
        $data['unread'] = $unread = $this->conversation_model->check_unread($user_key);
        $data['head_requests'] = $head_requests = $this->health->find_requests($user_key);
        $data['now'] = time();
        if($unread != false)
        {
            $data['unread'] = '('.$unread.') unread'; 
        } else {
            $data['unread'] ='';
        }
        if (count($head_requests) === 0) 
        {
            $data['head_requests'] = '';
        } else {
        $data['head_requests'] = '('.count($head_requests).')';
        }
    } else {
    $data['unread'] = ''; $data['head_requests'] = '';
    }
?>