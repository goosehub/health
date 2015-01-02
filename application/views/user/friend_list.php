<h2>Friends</h2>

<?php if (! empty($friends)) {
foreach ($friends as $row) { 
if ($row->send_request === $user_key) {	
$friend = $this->health->get_profile($row->receive_request); } else {
$friend = $this->health->get_profile($row->send_request); } ?>

<!-- Start Friend Item -->

<hr/>
<h3>
<a href="../users/<?php echo $friend['username']; ?>">
<img width="100px" height="100px" src="../uploads/<?php echo $friend['image']; ?>"/>
<?php echo $friend['username']; ?></a>
</h3>
<br/>
<a href="reject/<?php echo $friend['id']; ?>">Delete This Friend</a>

<!-- End -->
<?php } } else { ?>
<!-- Start No Friends -->

<h3>You have no friends yet</h3>

<?php } ?>