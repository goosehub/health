<?php
// var_dump($food);
?>
<h1><?php echo $meal->slug; ?></h1>
<h2><?php echo $meal->name; ?></h2>
<hr/>
<?php if ($meal->saved === 'on') { ?>
	<h3>Saved as a recipe</h3>
<?php } ?>
<h3>Category: <?php echo $meal->category; ?></h3>
<p><?php echo $meal->user_comment; ?></p>
<hr/>
<h2>Foods</h2>
<!-- Foods Loop -->
<?php foreach ($food as $row) { ?>
<?php if (isset($row->name)) { ?>
	<hr/>
	<?php if (isset($row->name)) { ?>
	<h3>Food Name: <?php echo $row->name; ?></h3>
	<?php } ?>

	<?php if (isset($row->saved)) { ?>
	<p>This is a Saved food</p>
	<?php } ?>

	<?php if (isset($row->serving_size)) { ?>
	<p>Serving Size: <?php echo $row->serving_size; ?></p>
	<?php } ?>

	<?php if (isset($row->calories)) { ?>
	<p>calories: <?php echo $row->calories; ?></p>
	<?php } ?>

	<?php if (isset($row->calories_fat)) { ?>
	<p>calories_fat: <?php echo $row->calories_fat; ?></p>
	<?php } ?>

	<?php if (isset($row->total_fat)) { ?>
	<p>total_fat: <?php echo $row->total_fat; ?></p>
	<?php } ?>

	<?php if (isset($row->saturated_fat)) { ?>
	<p>saturated_fat: <?php echo $row->saturated_fat; ?></p>
	<?php } ?>

	<?php if (isset($row->trans_fat)) { ?>
	<p>trans_fat: <?php echo $row->trans_fat; ?></p>
	<?php } ?>

	<?php if (isset($row->cholesterol)) { ?>
	<p>cholesterol: <?php echo $row->cholesterol; ?></p>
	<?php } ?>

	<?php if (isset($row->sodium)) { ?>
	<p>sodium: <?php echo $row->sodium; ?></p>
	<?php } ?>

	<?php if (isset($row->total_carb)) { ?>
	<p>total_carb: <?php echo $row->total_carb; ?></p>
	<?php } ?>

	<?php if (isset($row->dietary_fiber)) { ?>
	<p>dietary_fiber: <?php echo $row->dietary_fiber; ?></p>
	<?php } ?>

	<?php if (isset($row->sugars)) { ?>
	<p>sugars: <?php echo $row->sugars; ?></p>
	<?php } ?>

	<?php if (isset($row->protein)) { ?>
	<p>protein: <?php echo $row->protein; ?></p>
	<?php } ?>

	<?php if (isset($row->calcium)) { ?>
	<p>calcium: <?php echo $row->calcium; ?></p>
	<?php } ?>

	<?php if (isset($row->folic_acid)) { ?>
	<p>folic_acid: <?php echo $row->folic_acid; ?></p>
	<?php } ?>

	<?php if (isset($row->iron)) { ?>
	<p>iron: <?php echo $row->iron; ?></p>
	<?php } ?>

	<?php if (isset($row->magnesium)) { ?>
	<p>magnesium: <?php echo $row->magnesium; ?></p>
	<?php } ?>

	<?php if (isset($row->niacin)) { ?>
	<p>niacin: <?php echo $row->niacin; ?></p>
	<?php } ?>

	<?php if (isset($row->potassium)) { ?>
	<p>potassium: <?php echo $row->potassium; ?></p>
	<?php } ?>

	<?php if (isset($row->riboflavin)) { ?>
	<p>riboflavin: <?php echo $row->riboflavin; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_a)) { ?>
	<p>vit_a: <?php echo $row->vit_a; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_b6)) { ?>
	<p>vit_b6: <?php echo $row->vit_b6; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_b12)) { ?>
	<p>vit_b12: <?php echo $row->vit_b12; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_c)) { ?>
	<p>vit_c: <?php echo $row->vit_c; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_d)) { ?>
	<p>vit_d: <?php echo $row->vit_d; ?></p>
	<?php } ?>

	<?php if (isset($row->vit_e)) { ?>
	<p>vit_e: <?php echo $row->vit_e; ?></p>
	<?php } ?>

<?php } ?>
<?php } ?>