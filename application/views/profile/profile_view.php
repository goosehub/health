<h1><?php echo $profile['username']; ?>!</h1>

<img width="150px" height="150px" src="../uploads/<?php echo $profile['image']; ?>"/>

<!-- Start for logged in users only -->
<?php if (isset($log_check)) { ?>

<a href="../dashboard/conversations/<?php echo $profile['username']; ?>">Send this user a message</a> | 

<!-- Not Friends, Not Requested -->
<?php if (empty($friend_status)) { ?>
<a href="../dashboard/friend/<?php echo $profile['username']; ?>">Send Friend Request</a>

<!-- Friend Request Sent -->
<?php } else if ($friend_status[0]->status === 'requested') { ?>
<a href="../dashboard/friend/<?php echo $profile['username']; ?>">Request Sent</a>
<!-- Friends -->
<?php } else { ?>
<a href="../dashboard/friend/<?php echo $profile['username']; ?>">You are friends</a>
<?php } } ?>
<!-- End for logged in users only -->

<br/>
<h4><a href="<?php echo $profile['username']; ?>/friends">View This Users Friends</a></h4>
<hr/>
<p>Username: <?php echo $profile['username']; ?></p>
<p>Joined: <?php echo $joined; ?></p>
<p>Last online: <?php echo $last_online; ?> ago</p>
<p>Email: <?php echo $profile['email']; ?></p>
<p>Name: <?php echo $profile['first_name'].' '.$profile['last_name']; ?></p>
<p>Age: <?php echo $age; ?></p>
<p>gender: <?php echo $profile['gender']; ?></p>
<p>location: <?php echo $profile['location']; ?></p>
<p><?php echo $gym_partner; ?></p>
<p>goal: <?php echo $profile['goal']; ?></p>
<p>about: <?php echo $profile['about']; ?></p>
<hr/>
<h2>Latest progress point</h2>
<a class="dashboard-link" href="<?php echo $profile['username']; ?>/progress">See More Progress Points[Not fully functional]</a><br/>
<p>weight measurement: <?php echo $measurement['weight']; ?> kg | <?php echo $measurement['i_weight']; ?> lbs</p>
<p>height measurement: <?php echo $measurement['height']; ?> cm | <?php echo $measurement['i_height']; ?> inches</p>
<p>arm measurement: <?php echo $measurement['arm']; ?> cm | <?php echo $measurement['i_arm']; ?> inches</p>
<p>thigh measurement: <?php echo $measurement['thigh']; ?> cm | <?php echo $measurement['i_thigh']; ?> inches</p>
<p>waist measurement: <?php echo $measurement['waist']; ?> cm | <?php echo $measurement['i_waist']; ?> inches</p>
<p>chest measurement: <?php echo $measurement['chest']; ?> cm | <?php echo $measurement['i_chest']; ?> inches</p>
<p>calves measurement: <?php echo $measurement['calves']; ?> cm | <?php echo $measurement['i_calves']; ?> inches</p>
<p>forearms measurement: <?php echo $measurement['forearms']; ?> cm | <?php echo $measurement['i_forearms']; ?> inches</p>
<p>neck measurement: <?php echo $measurement['neck']; ?> cm | <?php echo $measurement['i_neck']; ?> inches</p>
<p>hips measurement: <?php echo $measurement['hips']; ?> cm | <?php echo $measurement['i_hips']; ?> inches</p>
<p>bodyfat measurement: <?php echo $measurement['bodyfat']; ?>%</p>
<p>squats: <?php echo $measurement['squats']; ?> kg | <?php echo $measurement['i_squats']; ?> lbs</p>
<p>bench: <?php echo $measurement['bench']; ?> kg | <?php echo $measurement['i_bench']; ?> lbs</p>
<p>deadlift: <?php echo $measurement['deadlift']; ?> kg | <?php echo $measurement['i_deadlift']; ?> lbs</p>
<hr/>
<h2>Wall Comments</h2>
<!-- If user logged in, allow user to leave a comment. -->
<?php if (isset($log_check)) { ?>
<h3>Leave a Comment</h3>
    <?php echo validation_errors();
   	$slug = $this->uri->uri_string();
	echo form_open($slug);
    // echo form_open('profile/view'); 
    ?>
<textarea class="input-textarea" rows="4" cols="50" name="message">
</textarea>
<br/>
<input type="submit" value="Submit"/>
</form>
<?php } ?>
<hr/>
<?php
foreach (array_reverse($wall) as $row) {
$row->timestamp = date("M j Y, g:i A T", $row->timestamp);
?>

<a href="<?php echo $row->friend_username; ?>"><?php echo $row->friend_username; ?></a>
<p><?php echo $row->message; ?></p>
<p><?php echo $row->timestamp; ?></p>
<hr/>

<?php } ?>