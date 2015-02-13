<!-- Load Graph Resources -->
<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/tools/vis.css">
<script type="text/javascript" src="<?=base_url()?>resources/tools/vis.js"></script>

<h1>Progress Comparison for <?php echo $before; ?> and <?php echo $after; ?></h1>

<!-- Link to Progress Dashboard if logged in -->
<?php if (isset($log_check) && $profile['username'] === $self['username']) { ?>
<h3><a href="<?=base_url()?>dashboard/progress">Return to My Progress</a></h3>
<?php } ?>

<h3><a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress">Return to Progress History</a></h3>

<hr/>

    <!-- Graph -->
	<div id="visualization"></div>

<script type="text/javascript">

var groups = new vis.DataSet();
    groups.add({
    id: 0,
    content: 'Weight',
    options: {
    }});

groups.add({
    id: 1,
    content: 'Waist',
    options: {
    }});

groups.add({
    id: 2,
    content: 'Bodyfat',
    options: {
    }});

groups.add({
    id: 3,
    content: 'Bench',
    options: {
    }});

    var container = document.getElementById('visualization');
    var items = [
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_i_weight']; ?>, group: 0},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_i_weight']; ?>, group: 0},
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_i_waist']; ?>, group: 1},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_i_waist']; ?>, group: 1},
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_bodyfat']; ?>, group: 2},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_bodyfat']; ?>, group: 2},
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_i_bench']; ?>, group: 3},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_i_bench']; ?>, group: 3}
    ];

    var dataset = new vis.DataSet(items);
    var options = {
		defaultGroup: 'ungrouped',
		legend: true,
        start: '<?php echo $before; ?>',
        end: '<?php echo $after; ?>',
        dataAxis: {
        customRange: {
            left: {
                min:0
            }
        }
        }
    };

    var graph2d = new vis.Graph2d(container, dataset, groups, options);
    updateStyle();

    function updateStyle() {
        groupData.style = "";
        groupData.style += document.getElementById("color").value;
        groupData.style += document.getElementById("line").value;
        groupData.style += document.getElementById("thickness").value;

        groupData.options.drawPoints = {};
        groupData.options.drawPoints.styles = "";
        groupData.options.drawPoints.style = document.getElementById("points").value;
        groupData.options.drawPoints.styles += document.getElementById("pointcolor").value;
        groupData.options.drawPoints.styles += document.getElementById("pointthickness").value;
        groupData.options.drawPoints.styles += document.getElementById("pointfill").value;
        groupData.options.drawPoints.size = Number(document.getElementById("pointsize").value);
        if (groupData.options.drawPoints.style == "") {
            groupData.options.drawPoints = false;
        }

        groupData.options.shaded = {};
        groupData.options.shaded.style = "";
        groupData.options.shaded.style += document.getElementById("fillcolor").value;
        groupData.options.shaded.style += document.getElementById("fillopacity").value;
        groupData.options.shaded.orientation = document.getElementById("fill").value;
        if (groupData.options.shaded.orientation == "") {
            groupData.options.shaded = false;
        }

        var groups = new vis.DataSet();
        groups.add(groupData);
        graph2d.setGroups(groups);
    }
</script>

<hr/>

<h1>These buttons do not work yet</h1>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/weight">
<button>weight</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/squats">
<button>squats</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/bench">
<button>bench</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/deadlift">
<button>deadlift</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/weight">
<button>weight</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/squats">
<button>squats</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/bench">
<button>bench</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/deadlift">
<button>deadlift</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/height">
<button>height</button></a>              

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/arm">
<button>arm</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/thigh">
<button>thigh</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/waist">
<button>waist</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/chest">
<button>chest</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/calves">
<button>calves</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/forearms">
<button>forearms</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/neck">
<button>neck</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/hips">
<button>hips</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/height">
<button>height</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/arm">
<button>arm</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/thigh">
<button>thigh</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/waist">
<button>waist</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/chest">
<button>chest</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/calves">
<button>calves</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/forearms">
<button>forearms</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/neck">
<button>neck</button></a>

<a href="<?=base_url()?>users/<?php echo $profile['username']; ?>/progress/<?php echo $before; ?>/<?php echo $after; ?>/hips">
<button>hips</button></a>

<br/>
<input type="checkbox" <?php if ($self['metric'] === 'on') { echo 'checked'; } ?> >Metric
<hr/>

<table>
<tr>
<td style="
    vertical-align: top; background: #ABCDEF;">

<h2>Before: <?php echo $before; ?></h2>

<!-- If exists, show -->
<?php if (isset($b_images[0]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[0]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[1]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[1]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[2]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[2]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[3]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[3]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[4]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[4]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($b_images[5]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $b_images[5]->filename; ?>"/>
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

</td>
<td style="
    vertical-align: top; background: #EFCCA9;">

<h2>After: <?php echo $after; ?></h2>

<!-- If exists, show -->
<?php if (isset($a_images[0]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[0]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[1]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[1]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[2]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[2]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[3]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[3]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[4]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[4]->filename; ?>"/>
<?php } ?>

<!-- If exists, show -->
<?php if (isset($a_images[5]->filename)) { ?>
<img width="200px" height="200px" src="<?=base_url()?>uploads/<?php echo $a_images[5]->filename; ?>"/>
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

</td>
<td style="
    vertical-align: top; background: #CCEFA9;">

<h2>Change</h2>

<?php if (isset($measurement['d_weight']) && $measurement['d_weight'] != 0) { ?>
<p>weight: <?php echo $change['c_weight']; echo ' '; ?>
<?php echo abs($measurement['d_weight']); ?> kg | <?php echo abs($measurement['d_i_weight']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_height']) && $measurement['d_height'] != 0) { ?>
<p>height: <?php echo $change['c_height']; echo ' '; ?>
<?php echo abs($measurement['d_height']); ?> kg | <?php echo abs($measurement['d_i_height']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_arm']) && $measurement['d_arm'] != 0) { ?>
<p>arm: <?php echo $change['c_arm']; echo ' '; ?>
<?php echo abs($measurement['d_arm']); ?> kg | <?php echo abs($measurement['d_i_arm']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_thigh']) && $measurement['d_thigh'] != 0) { ?>
<p>thigh: <?php echo $change['c_thigh']; echo ' '; ?>
<?php echo abs($measurement['d_thigh']); ?> kg | <?php echo abs($measurement['d_i_thigh']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_waist']) && $measurement['d_waist'] != 0) { ?>
<p>waist: <?php echo $change['c_waist']; echo ' '; ?>
<?php echo abs($measurement['d_waist']); ?> kg | <?php echo abs($measurement['d_i_waist']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_chest']) && $measurement['d_chest'] != 0) { ?>
<p>chest: <?php echo $change['c_chest']; echo ' '; ?>
<?php echo abs($measurement['d_chest']); ?> kg | <?php echo abs($measurement['d_i_chest']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_calves']) && $measurement['d_calves'] != 0) { ?>
<p>calves: <?php echo $change['c_calves']; echo ' '; ?>
<?php echo abs($measurement['d_calves']); ?> kg | <?php echo abs($measurement['d_i_calves']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_forearms']) && $measurement['d_forearms'] != 0) { ?>
<p>forearms: <?php echo $change['c_forearms']; echo ' '; ?>
<?php echo abs($measurement['d_forearms']); ?> kg | <?php echo abs($measurement['d_i_forearms']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_neck']) && $measurement['d_neck'] != 0) { ?>
<p>neck: <?php echo $change['c_neck']; echo ' '; ?>
<?php echo abs($measurement['d_neck']); ?> kg | <?php echo abs($measurement['d_i_neck']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_hips']) && $measurement['d_hips'] != 0) { ?>
<p>hips: <?php echo $change['c_hips']; echo ' '; ?>
<?php echo abs($measurement['d_hips']); ?> kg | <?php echo abs($measurement['d_i_hips']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_bodyfat']) && $measurement['d_bodyfat'] != 0) { ?>
<p>bodyfat: <?php echo $change['c_bodyfat']; echo ' '; ?>
<?php echo abs($measurement['d_bodyfat']); ?>%</p>
<?php } ?>

<?php if (isset($measurement['d_squats']) && $measurement['d_squats'] != 0) { ?>
<p>squats: <?php echo $change['c_squats']; echo ' '; ?>
<?php echo abs($measurement['d_squats']); ?> kg | <?php echo abs($measurement['d_i_squats']); ?> lbs</p>
<?php } ?>

<?php if (isset($measurement['d_bench']) && $measurement['d_bench'] != 0) { ?>
<p>bench: <?php echo $change['c_bench']; echo ' '; ?>
<?php echo abs($measurement['d_bench']); ?> kg | <?php echo abs($measurement['d_i_bench']); ?> lbs</p>
<?php } ?>

</td>
</tr>
</table>