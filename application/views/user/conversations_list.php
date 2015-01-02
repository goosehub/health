<h1>Your conversations</h1>

<?php foreach ($convos as $row) { 
$friend = $this->health->get_profile($row->sender);
$info = $this->conversation_model->convo_info($user_key, $friend['id']);
$timestamp = timespan($info[0]->timestamp, $now); 
if ($info[0]->status != 'on' && $info[0]->sender != $user_key) {
$unread = 'Unread';} else { $unread = 'Read';}
if ($info[0]->sender === $user_key){$sender='You';}else{$sender=$friend['username'];} ?>

<!-- Start -->

<hr/>
<h4>
<a href="conversations/<?php echo $friend['username']; ?>">
<img width="100px" height="100px" src="../uploads/<?php echo $friend['image']; ?>"/>
<?php echo $friend['username']; ?></a>
</h4>
<h4><?php echo $unread; ?></h4>
<?php echo $sender; ?> sent a message
<?php echo $timestamp; ?> ago...

<!-- End -->
<?php } ?>