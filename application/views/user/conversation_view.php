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
if ($row->sender != $row->receiver) { ?>
<hr/>
<h4>

<!-- Message sent by friend -->
<?php if ($row->sender != $user_key) { ?>
<a href="../../users/<?php echo $friend['username']; ?>"><?php echo $friend['username']; ?></a>

<!-- Message sent by user -->
<?php } else { ?>

You

<!-- end if statement -->
<?php } ?>

<!-- Time -->
said <?php echo $timestamp; ?> ago...
</h4>

<!-- Message -->
<p><?php echo nl2br($row->message); ?></p>

<!-- End for each -->
<?php } } ?>
