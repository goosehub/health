<h2>Nutritional Requirements</h2>
<?php
if ($weight === 0
	|| $height === 0
	|| ($gender != 'Male' && $gender != 'Female')
	|| $years === 44
	)
{
?>
<h3>Daily Calorie Requirement</h3>
<h4>To see you're daily calorie requirement, set your gender, weight, height, and birthdate</h4> 
<?php
} else {
?>
<h3>You're Daily Calorie Requirement:
<?php echo $cal_req; ?>
</h3>
<h4>The Mifflin - St Jeor Formula for <?php echo $gender; ?>s</h4>
	<p>10 x <?php echo $weight; ?>kg + 6.25 x <?php echo $height; ?>cm - 5 x <?php echo $years; ?> years + 5</p>
<br/>
<?php
}
?>