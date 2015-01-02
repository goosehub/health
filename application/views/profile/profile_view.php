<h1><?php echo $profile['username']; ?>!</h1>
<img width="150px" height="150px" src="../uploads/<?php echo $profile['image']; ?>"/>
<a href="../dashboard/conversations/<?php echo $profile['username']; ?>">Send this user a message</a>
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
<p>weight measurement: <?php echo $progress->weight; ?>kg</p>
<p>height measurement: <?php echo $progress->height; ?>cm</p>
<p>arm measurement: <?php echo $progress->arm; ?>cm</p>
<p>thigh measurement: <?php echo $progress->thigh; ?>cm</p>
<p>waist measurement: <?php echo $progress->waist; ?>cm</p>
<p>chest measurement: <?php echo $progress->chest; ?>cm</p>
<p>calves measurement: <?php echo $progress->calves; ?>cm</p>
<p>forearms measurement: <?php echo $progress->forearms; ?>cm</p>
<p>neck measurement: <?php echo $progress->neck; ?>cm</p>
<p>hips measurement: <?php echo $progress->hips; ?>cm</p>
<p>bodyfat measurement: <?php echo $progress->bodyfat; ?>%</p>
<p>squats: <?php echo $progress->squats; ?>kg</p>
<p>bench: <?php echo $progress->bench; ?>kg</p>
<p>deadlift: <?php echo $progress->deadlift; ?>kg</p>
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