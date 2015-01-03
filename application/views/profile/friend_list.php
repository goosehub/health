<h2>Friends</h2>
<h3><?php echo $profile['username']; ?> has <?php echo count($friends); ?> friends</h3>

<?php if (count($friends) > 0) {
foreach ($friends as $row) { if ($row->send_request === $profile['id']) {	
$friend = $this->health->get_profile($row->receive_request); } else {
$friend = $this->health->get_profile($row->send_request); } ?>

<!-- Start Friend Item -->

<hr/>
<h3>
<a href="../<?php echo $friend['username']; ?>">
<img width="100px" height="100px" src="../../uploads/<?php echo $friend['image']; ?>"/>
<?php echo $friend['username']; ?></a>
</h3>
<br/>
<!-- For viewing your own friend list only -->
<?php if ($self['id'] === $profile['id']) { ?>
<a href="../../dashboard/reject/<?php echo $friend['id']; ?>">Delete This Friend</a>
<?php } ?>

<!-- End -->
<?php } } else { ?>
<!-- Start No Friends -->

<!-- For viewing your own friend list only -->
<?php if ($self['id'] === $profile['id']) { ?>
<h3>You have no friends yet</h3>
<?php } else { ?>
<h3>This user has no friends yet</h3>
<?php } ?>

<?php } ?>