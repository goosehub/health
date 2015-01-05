<h1>Progress Points</h1>
<?php
$this->load->helper('date');
$now = time();
$i = 0;
foreach ($progress as $point): 
?>

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