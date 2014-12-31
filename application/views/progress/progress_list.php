<h1>Progress Points</h1>
<?php
$this->load->helper('date');
$now = time();
$i = 0;
foreach ( array_reverse($progress) as $point): 
// Date timestamp
	$point_date = $point->timestamp;
?>

<p>Date:<?php echo date('m/d/Y_h:mA', $point_date); ?></p>
<p>Name: <?php echo $point->name; ?></p>
<a href="../<?php echo $profile['username']; ?>">[This link does not work yet]</a>
<hr/>

<?php $i = $i + 1;
if ($i == 50) break;
endforeach ?>