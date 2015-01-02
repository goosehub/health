<h2>Change your profile picture</h2> 
<h3>This is your current picture</h3>
<img width="150px" height="150px" src="../uploads/<?php echo $self['image']; ?>"/>
<h3>Upload a new Picture</h3>
   <?php echo $error; ?>
   <?php echo form_open_multipart('dashboard/do_upload'); ?>
	<label for="userfile">Upload Picture:</label>
	<input class="input-textarea"
	type="file" size="20" id="userfile" name="userfile"/>
	<br/>
	<br/>
	<input class="input-textarea"
	type="submit" value="Submit Changes"/>

</form>