<h1>Your conversations</h1>

<?php foreach ($convos as $row) { 
$friend = $this->health->get_profile($row->sender);
// $timestamp = timespan($row->timestamp, $now); 
?>

<hr/>
<h4>
<a href="conversations/<?php echo $friend['username']; ?>"><?php echo $friend['username']; ?></a>
</h4>
<?php echo ''; ?> <!-- ago... -->

<!-- End for each -->
<?php } ?>