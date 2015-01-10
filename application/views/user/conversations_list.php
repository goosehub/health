<h1>Your Conversations</h1>

<?php foreach ($convos as $row) { 
$friend = $this->health->get_profile($row->sender);
$friend_name = set_name($friend['username'], $friend['first_name'], $friend['last_name']);
$info = $this->conversation_model->convo_info($user_key, $friend['id']);
$timestamp = get_day_name($info[0]->timestamp); 
if ($info[0]->status != 'on' && $info[0]->sender != $user_key) {
$unread = 'Unread';} else { $unread = '';}
if ($info[0]->sender === $user_key){$sender='You';}else{$sender=$friend['username'];} ?>

<!-- Start -->

<hr/>
<a href="conversations/<?php echo $friend['username']; ?>">
<img width="100px" height="100px" src="../uploads/<?php echo $friend['image']; ?>"/>
<h4>
Conversation with <?php echo $friend_name; ?>
</h4></a>
<h4><?php echo $unread; ?></h4>
<h4>Last Message</h4>
<p class="message-preview"><?php echo $info[0]->message; ?></p>
<h4>Messaged on</h4>
<h5><?php echo $timestamp; ?></h5>

<!-- End -->
<?php } ?>