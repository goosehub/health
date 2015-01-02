<h1><?php echo $slug; ?> has their account set to private.</h1>

<!-- Start for logged in users only -->
<?php if (isset($log_check)) { ?>

<a href="../dashboard/conversations/<?php echo $profile['username']; ?>">Send this user a message</a> | 

<!-- Not Friends, Not Requested -->
<?php if (empty($friend_status)) { ?>
<a href="../dashboard/friend/<?php echo $profile['username']; ?>">Send Friend Request</a>

<!-- Friend Request Sent -->
<?php } else if ($friend_status[0]->status === 'requested') { ?>
<a href="../dashboard/friend/<?php echo $profile['username']; ?>">Request Sent</a>

<?php } } ?>
<!-- End for logged in users only -->