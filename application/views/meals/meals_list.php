<h1>Meal History</h1>
<?php
// var_dump($meals);
foreach ($meals as $row) { ?>
<hr/>
<a href="meals/<?php echo $row->slug; ?>"><h3><?php echo $row->slug; ?></h3></a>
<h3><?php echo $row->name; ?></h3>
<h3>Category: <?php echo $row->category; ?></h3>
<?php } ?>