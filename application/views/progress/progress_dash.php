<h1>My Progress</h1>
<hr/>
<h2><a href="progress/new">Create New Progress Point</a></h2>
<h2><a href="../users/<?php echo $self['username']; ?>/progress">See your Progress History</a></h2>
<h2>Compare Two Points In Time</h2>
   <?php echo validation_errors(); ?>
   <?php echo form_open('progress/find_compare'); ?>
   		<h3>Before</h3>
		<input class="input-textarea"
		type="date" size="20" name="before"/>
   		<h3>After</h3>
		<input class="input-textarea"
		type="date" size="20" name="after"/>

		<input class="input-textarea"
		type="submit" value="Submit Changes"/>

		<p>NOTE: If you select a day without a progress point entered, it will find the next existing point</p>

   </form>