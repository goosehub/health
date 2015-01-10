<h2>Progress Point for <?php echo $point; ?></h2>
<h3><a href=".">Return to progress point index</a></h3>

<!-- If exists, show -->
<?php if (isset($images[0]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[0]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($images[1]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[1]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($images[2]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[2]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($images[3]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[3]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($images[4]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[4]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($images[5]->filename)) { ?>
<img width="200px" height="200px" src="../../../uploads/<?php echo $images[5]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if ($progress->name != '') { ?>
<h4><?php echo $progress->name; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($progress->comment != '') { ?>
<h4><?php echo $progress->comment; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($age != '') { ?>
<p>Age at this point: <?php echo $age; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($profile['gender'] != '') { ?>
<p>gender: <?php echo $profile['gender']; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['weight'] != '') { ?>
<p>weight measurement: <?php echo $measurement['weight']; ?> kg | <?php echo $measurement['i_weight']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['height'] != '') { ?>
<p>height measurement: <?php echo $measurement['height']; ?> cm | <?php echo $measurement['i_height']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['arm'] != '') { ?>
<p>arm measurement: <?php echo $measurement['arm']; ?> cm | <?php echo $measurement['i_arm']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['thigh'] != '') { ?>
<p>thigh measurement: <?php echo $measurement['thigh']; ?> cm | <?php echo $measurement['i_thigh']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['waist'] != '') { ?>
<p>waist measurement: <?php echo $measurement['waist']; ?> cm | <?php echo $measurement['i_waist']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['chest'] != '') { ?>
<p>chest measurement: <?php echo $measurement['chest']; ?> cm | <?php echo $measurement['i_chest']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['calves'] != '') { ?>
<p>calves measurement: <?php echo $measurement['calves']; ?> cm | <?php echo $measurement['i_calves']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['forearms'] != '') { ?>
<p>forearms measurement: <?php echo $measurement['forearms']; ?> cm | <?php echo $measurement['i_forearms']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['neck'] != '') { ?>
<p>neck measurement: <?php echo $measurement['neck']; ?> cm | <?php echo $measurement['i_neck']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['hips'] != '') { ?>
<p>hips measurement: <?php echo $measurement['hips']; ?> cm | <?php echo $measurement['i_hips']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['bodyfat'] != '') { ?>
<p>bodyfat measurement: <?php echo $measurement['bodyfat']; ?>%</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['squats'] != '') { ?>
<p>squats: <?php echo $measurement['squats']; ?> kg | <?php echo $measurement['i_squats']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['bench'] != '') { ?>
<p>bench: <?php echo $measurement['bench']; ?> kg | <?php echo $measurement['i_bench']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['deadlift'] != '') { ?>
<p>deadlift: <?php echo $measurement['deadlift']; ?> kg | <?php echo $measurement['i_deadlift']; ?> lbs</p>
<?php } ?>

<hr/>
<h2>Progress Point Comments</h2>

<!-- Comment Form -->
<?php if (isset($log_check)) { ?>

<h3>Leave a Comment</h3>
    <?php echo validation_errors(); ?>
   	<?php $slug = $this->uri->segment(2);
   	$point = $this->uri->segment(4);
	echo form_open('users/'.$slug.'/progress/'.$point.'', '', $point);
    ?>
<textarea class="input-textarea" rows="4" cols="50" name="message">
</textarea>
<br/>
<input type="submit" value="Submit"/>
</form>

<!-- End comment form -->
<?php } ?>

<hr/>

<!-- Start Progress Comments -->
<?php foreach (array_reverse($progress_comments) as $row) { 
$timestamp = date("M j Y, g:i A T", $row->timestamp); 
$comment_profile = $this->health->get_profile($row->friend_key); ?>

<img src="../../../uploads/<?php echo $comment_profile['image']; ?>" width="50px" height="50px" />
<a href="../../<?php echo $comment_profile['username']; ?>"><?php echo $comment_profile['username']; ?></a>
<p><?php echo $row->message; ?></p>
<p><?php echo $timestamp; ?></p>
<hr/>

<!-- End Progress Comments -->
<?php } ?>