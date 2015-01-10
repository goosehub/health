<h1>Conversation with <?php echo $friend['username']; ?></h1>

<?php echo validation_errors(); ?>
<?php $slug = $this->uri->uri_string();
	echo form_open($slug); ?>
	<textarea class="input-textarea" rows="4" cols="50" name="message"></textarea>
	<br/>
	<input type="submit" value="Talk"/>
</form>

<?php foreach (array_reverse($messages) as $row) {
$timestamp = timespan($row->timestamp, $now); 
$friend_name = set_name($friend['username'], $friend['first_name'], $friend['last_name']);
// If not a conversation with self unless keys match
if ($row->sender != $row->receiver || $user_key === $friend['id']) { ?>
<hr/>
<h4>

<!-- Message sent by friend -->
<?php if ($row->sender != $user_key) { ?>
<img width="50px" height="50px" src="../../uploads/<?php echo $friend['image']; ?>"/>
<a href="../../users/<?php echo $friend['username']; ?>"><?php echo $friend_name; ?></a>

<!-- Message sent by user -->
<?php } else { ?>

<img width="50px" height="50px" src="../../uploads/<?php echo $self['image']; ?>"/>
You

<!-- End if -->
<?php } ?>

<!-- Time -->
said <?php echo $timestamp; ?> ago...
</h4>

<!-- Message -->
<p><?php echo nl2br($row->message); ?></p>

<!-- End for each -->
<?php } } ?>
