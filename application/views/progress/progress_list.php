<h1>Progress Points</h1>
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