<h1>Progress Comparison for <?php echo $before; ?> and <?php echo $after; ?></h1>

<!-- Link to Progress Dashboard if logged in -->
<?php if (isset($log_check) && $profile['username'] === $self['username']) { ?>
<h3><a href="<?=base_url()?>dashboard/progress">Return to My Progress</a></h3>
<?php } ?>

<h3><a href="../">Return to Progress History</a></h3>

<hr/>
<h2><?php echo $before; ?></h2>

<!-- If exists, show -->
<?php if (isset($b_images[0]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[0]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[1]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[1]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[2]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[2]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[3]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[3]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[4]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[4]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[5]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $b_images[5]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if ($before_data->name != '') { ?>
<h4><?php echo $before_data->name; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($before_data->comment != '') { ?>
<h4><?php echo $before_data->comment; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($age != '') { ?>
<p>Age at this point: <?php echo $age; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($profile['gender'] != '') { ?>
<p>gender: <?php echo $profile['gender']; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_weight'] != '') { ?>
<p>weight measurement: <?php echo $measurement['b_weight']; ?> kg | <?php echo $measurement['b_i_weight']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_height'] != '') { ?>
<p>height measurement: <?php echo $measurement['b_height']; ?> cm | <?php echo $measurement['b_i_height']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_arm'] != '') { ?>
<p>arm measurement: <?php echo $measurement['b_arm']; ?> cm | <?php echo $measurement['b_i_arm']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_thigh'] != '') { ?>
<p>thigh measurement: <?php echo $measurement['b_thigh']; ?> cm | <?php echo $measurement['b_i_thigh']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_waist'] != '') { ?>
<p>waist measurement: <?php echo $measurement['b_waist']; ?> cm | <?php echo $measurement['b_i_waist']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_chest'] != '') { ?>
<p>chest measurement: <?php echo $measurement['b_chest']; ?> cm | <?php echo $measurement['b_i_chest']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_calves'] != '') { ?>
<p>calves measurement: <?php echo $measurement['b_calves']; ?> cm | <?php echo $measurement['b_i_calves']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_forearms'] != '') { ?>
<p>forearms measurement: <?php echo $measurement['b_forearms']; ?> cm | <?php echo $measurement['b_i_forearms']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_neck'] != '') { ?>
<p>neck measurement: <?php echo $measurement['b_neck']; ?> cm | <?php echo $measurement['b_i_neck']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_hips'] != '') { ?>
<p>hips measurement: <?php echo $measurement['b_hips']; ?> cm | <?php echo $measurement['b_i_hips']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_bodyfat'] != '') { ?>
<p>bodyfat measurement: <?php echo $measurement['b_bodyfat']; ?>%</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_squats'] != '') { ?>
<p>squats: <?php echo $measurement['b_squats']; ?> kg | <?php echo $measurement['b_i_squats']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_bench'] != '') { ?>
<p>bench: <?php echo $measurement['b_bench']; ?> kg | <?php echo $measurement['b_i_bench']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['b_deadlift'] != '') { ?>
<p>deadlift: <?php echo $measurement['b_deadlift']; ?> kg | <?php echo $measurement['b_i_deadlift']; ?> lbs</p>
<?php } ?>

<hr/>
<h2><?php echo $after; ?></h2>

<!-- If exists, show -->
<?php if (isset($a_images[0]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[0]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[1]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[1]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[2]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[2]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[3]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[3]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[4]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[4]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[5]->filename)) { ?>
<img width="200px" height="200px" src="../../../../uploads/<?php echo $a_images[5]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if ($after_data->name != '') { ?>
<h4><?php echo $after_data->name; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($after_data->comment != '') { ?>
<h4><?php echo $after_data->comment; ?></h4>
<?php } ?>

<!-- If exists, show -->
<?php if ($age != '') { ?>
<p>Age at this point: <?php echo $age; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($profile['gender'] != '') { ?>
<p>gender: <?php echo $profile['gender']; ?></p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_weight'] != '') { ?>
<p>weight measurement: <?php echo $measurement['a_weight']; ?> kg | <?php echo $measurement['a_i_weight']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_height'] != '') { ?>
<p>height measurement: <?php echo $measurement['a_height']; ?> cm | <?php echo $measurement['a_i_height']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_arm'] != '') { ?>
<p>arm measurement: <?php echo $measurement['a_arm']; ?> cm | <?php echo $measurement['a_i_arm']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_thigh'] != '') { ?>
<p>thigh measurement: <?php echo $measurement['a_thigh']; ?> cm | <?php echo $measurement['a_i_thigh']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_waist'] != '') { ?>
<p>waist measurement: <?php echo $measurement['a_waist']; ?> cm | <?php echo $measurement['a_i_waist']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_chest'] != '') { ?>
<p>chest measurement: <?php echo $measurement['a_chest']; ?> cm | <?php echo $measurement['a_i_chest']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_calves'] != '') { ?>
<p>calves measurement: <?php echo $measurement['a_calves']; ?> cm | <?php echo $measurement['a_i_calves']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_forearms'] != '') { ?>
<p>forearms measurement: <?php echo $measurement['a_forearms']; ?> cm | <?php echo $measurement['a_i_forearms']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_neck'] != '') { ?>
<p>neck measurement: <?php echo $measurement['a_neck']; ?> cm | <?php echo $measurement['a_i_neck']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_hips'] != '') { ?>
<p>hips measurement: <?php echo $measurement['a_hips']; ?> cm | <?php echo $measurement['a_i_hips']; ?> inches</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_bodyfat'] != '') { ?>
<p>bodyfat measurement: <?php echo $measurement['a_bodyfat']; ?>%</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_squats'] != '') { ?>
<p>squats: <?php echo $measurement['a_squats']; ?> kg | <?php echo $measurement['a_i_squats']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_bench'] != '') { ?>
<p>bench: <?php echo $measurement['a_bench']; ?> kg | <?php echo $measurement['a_i_bench']; ?> lbs</p>
<?php } ?>

<!-- If exists, show -->
<?php if ($measurement['a_deadlift'] != '') { ?>
<p>deadlift: <?php echo $measurement['a_deadlift']; ?> kg | <?php echo $measurement['a_i_deadlift']; ?> lbs</p>
<?php } ?>

<hr/>
<h2>Change</h2>

<?php if (isset($measurement['d_weight']) && $measurement['d_weight'] != 0) { ?>
<p>weight: <?php echo $measurement['pre_d_weight']; echo ' '; ?>
<?php echo abs($measurement['d_weight']); ?> kg | <?php echo abs($measurement['d_i_weight']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_height']) && $measurement['d_height'] != 0) { ?>
<p>height: <?php echo $measurement['pre_d_height']; echo ' '; ?>
<?php echo abs($measurement['d_height']); ?> kg | <?php echo abs($measurement['d_i_height']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_arm']) && $measurement['d_arm'] != 0) { ?>
<p>arm: <?php echo $measurement['pre_d_arm']; echo ' '; ?>
<?php echo abs($measurement['d_arm']); ?> kg | <?php echo abs($measurement['d_i_arm']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_thigh']) && $measurement['d_thigh'] != 0) { ?>
<p>thigh: <?php echo $measurement['pre_d_thigh']; echo ' '; ?>
<?php echo abs($measurement['d_thigh']); ?> kg | <?php echo abs($measurement['d_i_thigh']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_waist']) && $measurement['d_waist'] != 0) { ?>
<p>waist: <?php echo $measurement['pre_d_waist']; echo ' '; ?>
<?php echo abs($measurement['d_waist']); ?> kg | <?php echo abs($measurement['d_i_waist']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_chest']) && $measurement['d_chest'] != 0) { ?>
<p>chest: <?php echo $measurement['pre_d_chest']; echo ' '; ?>
<?php echo abs($measurement['d_chest']); ?> kg | <?php echo abs($measurement['d_i_chest']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_calves']) && $measurement['d_calves'] != 0) { ?>
<p>calves: <?php echo $measurement['pre_d_calves']; echo ' '; ?>
<?php echo abs($measurement['d_calves']); ?> kg | <?php echo abs($measurement['d_i_calves']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_forearms']) && $measurement['d_forearms'] != 0) { ?>
<p>forearms: <?php echo $measurement['pre_d_forearms']; echo ' '; ?>
<?php echo abs($measurement['d_forearms']); ?> kg | <?php echo abs($measurement['d_i_forearms']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_neck']) && $measurement['d_neck'] != 0) { ?>
<p>neck: <?php echo $measurement['pre_d_neck']; echo ' '; ?>
<?php echo abs($measurement['d_neck']); ?> kg | <?php echo abs($measurement['d_i_neck']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_hips']) && $measurement['d_hips'] != 0) { ?>
<p>hips: <?php echo $measurement['pre_d_hips']; echo ' '; ?>
<?php echo abs($measurement['d_hips']); ?> kg | <?php echo abs($measurement['d_i_hips']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_bodyfat']) && $measurement['d_bodyfat'] != 0) { ?>
<p>bodyfat: <?php echo $measurement['pre_d_bodyfat']; echo ' '; ?>
<?php echo abs($measurement['d_bodyfat']); ?>%</p>
<?php } ?>

<?php if (isset($measurement['d_squats']) && $measurement['d_squats'] != 0) { ?>
<p>squats: <?php echo $measurement['pre_d_squats']; echo ' '; ?>
<?php echo abs($measurement['d_squats']); ?> kg | <?php echo abs($measurement['d_i_squats']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_bench']) && $measurement['d_bench'] != 0) { ?>
<p>bench: <?php echo $measurement['pre_d_bench']; echo ' '; ?>
<?php echo abs($measurement['d_bench']); ?> kg | <?php echo abs($measurement['d_i_bench']); ?> lbs</p>
<?php } ?>