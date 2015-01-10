<h1>Progress Points</h1>

<h2>Search for a point</h2>
   <?php echo validation_errors(); ?>

      	<?php $slug = $this->uri->segment(2);
   		echo form_open('progress/find_point/'.$slug.'', '', $slug); ?>
		<input class="input-textarea"
		type="date" size="20" name="date"/>

		<input class="input-textarea"
		type="submit" value="Submit Changes"/>

		<p>NOTE: If you select a day without a progress point entered, it will find the next existing point</p>
	</form>

<?php
$this->load->helper('date');
$now = time();
$i = 0;
foreach ($progress as $point): 
$profile_id = $profile['id'];
$progress_key = $point->date;
$images = $this->progress_model->get_images($profile_id, $progress_key);
?>

<!-- If exists, show -->
<?php if (isset($images[0]->filename)) { ?>
<img width="100px" height="100px" src="../../uploads/<?php echo $images[0]->filename; ?>"/>
<?php } ?>
<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $point->date; ?>">
<p>Date:<?php echo $point->date; ?>
</a> | 
<!-- If name exists -->
<?php if ($point->name != '') { ?>
Name: <?php echo $point->name; ?>
</p>
<?php } ?>
<hr/>

<?php $i = $i + 1;
if ($i == 1000) break;
endforeach ?>