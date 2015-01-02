<h2>Friend Requests</h2>
<?php if (! empty($requests)) {
foreach ($requests as $row) { 
$friend = $this->health->get_profile($row->send_request);
$timestamp = timespan($row->timestamp, $now); ?>

<!-- Start Friend Requests -->

<hr/>
<h3>
<a href="conversations/<?php echo $friend['username']; ?>">
<img width="100px" height="100px" src="../uploads/<?php echo $friend['image']; ?>"/>
<?php echo $friend['username']; ?></a>
</h3>
<?php echo $timestamp; ?> ago
<br/>
<a href="accept/<?php echo $friend['id']; ?>">Accept</a>
<a href="reject/<?php echo $friend['id']; ?>">Reject</a>

<!-- End -->
<?php } } else { ?>
<!-- Start no friend requests -->

<h3>You have no friend requests at this time</h3>

<?php } ?>