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

<h2>Sum Nutrition Facts</h2>

<h4>Sum Calories: <?php echo $sum_calories; ?></h4>
<table>
<tr>
<td style="padding-left: 2em">
	<p>sum_calories_fat: <?php echo $sum_calories_fat; ?></p>
	<p>sum_total_fat: <?php echo $sum_total_fat; ?></p>
	<p>sum_saturated_fat: <?php echo $sum_saturated_fat; ?></p>
	<p>sum_trans_fat: <?php echo $sum_trans_fat; ?></p>
	<p>sum_cholesterol: <?php echo $sum_cholesterol; ?></p>
	<p>sum_sodium: <?php echo $sum_sodium; ?></p>
</td><td style="padding-left: 2em">
	<p>sum_total_carb: <?php echo $sum_total_carb; ?></p>
	<p>sum_dietary_fiber: <?php echo $sum_dietary_fiber; ?></p>
	<p>sum_sugars: <?php echo $sum_sugars; ?></p>
	<p>sum_protein: <?php echo $sum_protein; ?></p>
	<p>sum_calcium: <?php echo $sum_calcium; ?></p>
	<p>sum_folic_acid: <?php echo $sum_folic_acid; ?></p>
</td><td style="padding-left: 2em">
	<p>sum_iron: <?php echo $sum_iron; ?></p>
	<p>sum_magnesium: <?php echo $sum_magnesium; ?></p>
	<p>sum_niacin: <?php echo $sum_niacin; ?></p>
	<p>sum_potassium: <?php echo $sum_potassium; ?></p>
	<p>sum_riboflavin: <?php echo $sum_riboflavin; ?></p>
	<p>sum_vit_a: <?php echo $sum_vit_a; ?></p>
</td><td style="padding-left: 2em">
	<p>sum_vit_b6: <?php echo $sum_vit_b6; ?></p>
	<p>sum_vit_b12: <?php echo $sum_vit_b12; ?></p>
	<p>sum_vit_c: <?php echo $sum_vit_c; ?></p>
	<p>sum_vit_d: <?php echo $sum_vit_d; ?></p>
	<p>sum_vit_e: <?php echo $sum_vit_e; ?></p>
	<p>sum_zinc: <?php echo $sum_zinc; ?></p>
</td>
</tr>
</table>


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

	<h4>Type:
	<?php if ($row->type_vegetable === 'on') { ?>
		vegetable |
	<?php } ?>
	<?php if ($row->type_fruit === 'on') { ?>
		fruit |
	<?php } ?>
	<?php if ($row->type_protein === 'on') { ?>
		protein |
	<?php } ?>
	<?php if ($row->type_dairy === 'on') { ?>
		dairy |
	<?php } ?>
	<?php if ($row->type_fats === 'on') { ?>
		fats |
	<?php } ?>
	<?php if ($row->type_grain === 'on') { ?>
		grain |
	<?php } ?>
	<?php if ($row->type_other === 'on') { ?>
		other
	<?php } ?>
	</h4>

	<?php if (isset($row->serving_size)) { ?>
		<h4>Serving Size: <?php echo $row->serving_size; ?></h4>
	<?php } ?>

	<?php if (isset($row->calories)) { ?>
		<h4>calories: <?php echo $row->calories; ?></h4>
	<?php } ?>

	<table>
	<tr>
	<td style="padding-left: 2em">

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

	</td><td style="padding-left: 2em">

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

	</td><td style="padding-left: 2em">

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

	</td><td style="padding-left: 2em">

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
	</td>
	</tr>
	</table>

<?php } ?>
<?php } ?>