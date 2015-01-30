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

<table>
    <colgroup><col width="600">
    <col width="220">
    </colgroup><tbody><tr>
        <td style="padding-right: 20px; border-right: 1px solid;">
        	<div id="visualization"></div>
            <!-- <div id="visualization"><div class="vis timeline root bottom" style="-webkit-user-select: none; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); height: 451px;"><div class="vispanel background" style="height: 449px; width: 576px; left: 0px; top: 0px;"></div><div class="vispanel background vertical" style="height: 449px; width: 514px; left: 64px; top: 0px;"><div class="timeaxis background"><div class="grid vertical minor day10 june odd" style="top: -1px; height: 428px; left: -0.5px; width: 64.25px;"></div><div class="grid vertical minor day11 june even" style="top: -1px; height: 428px; left: 63.75px; width: 64.25px;"></div><div class="grid vertical minor day12 june odd" style="top: -1px; height: 428px; left: 128px; width: 64.25px;"></div><div class="grid vertical minor day13 june even" style="top: -1px; height: 428px; left: 192.25px; width: 64.25px;"></div><div class="grid vertical minor day14 june odd" style="top: -1px; height: 428px; left: 256.5px; width: 64.25px;"></div><div class="grid vertical minor day15 june even" style="top: -1px; height: 428px; left: 320.75px; width: 64.25px;"></div><div class="grid vertical minor day16 june odd" style="top: -1px; left: 385px; height: 428px; width: 64.25px;"></div><div class="grid vertical minor day17 june even" style="top: -1px; height: 428px; left: 449.25px; width: 64.25px;"></div><div class="grid vertical minor day18 june odd" style="top: -1px; height: 428px; left: 513.5px;"></div></div><div class="currenttime" title="Current time: Thursday, January 29th 2015, 22:28:26" style="position: absolute; top: 0px; height: 100%; left: 15033.0921568258px;"></div></div><div class="vispanel background horizontal" style="height: 402px; width: 576px; left: 0px; top: -1px;"><div style="width: 100%; height: 400px; position: relative; top: 0px;"><div class="grid horizontal major" style="left: 56px; width: 527px; top: 22px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 44px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 67px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 89px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 111px;"></div><div class="grid horizontal major" style="left: 56px; width: 527px; top: 133px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 156px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 178px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 200px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 222px;"></div><div class="grid horizontal major" style="left: 56px; width: 527px; top: 244px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 267px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 289px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 311px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 333px;"></div><div class="grid horizontal major" style="left: 56px; width: 527px; top: 356px;"></div><div class="grid horizontal minor" style="left: 59px; width: 521px; top: 378px;"></div></div></div><div class="vispanel center" style="height: 402px; width: 514px; left: 63px; top: -1px;"><div class="content" style="left: 0px; top: 0px;"><div class="LineGraph"><svg style="position: relative; height: 400px; display: block; width: 1536px; left: -512px;"><path class="graphGroup1" style="stroke:blue;stroke-dasharray:1 0;stroke-width:2;" d="M576,244 C576.25,244 613.4485862090772,116.57350877699629 640.5,78 C659.2186552315552,51.30844822202027 686.5112021039164,16.634876512436524 704.75,22 C734.7838602087122,30.834758175732635 738.8688565818866,234.99052741099698 769,244 C787.2275702378141,249.45020121350558 814.5599425151592,215.45625022572858 833.25,189 C860.4352294654951,150.51861845441962 897.5,22 897.5,22 "></path><path class="graphGroup1 fill" style="fill:blue;opacity:0.6;" d="M576.25,400 576,244 C576.25,244 613.4485862090772,116.57350877699629 640.5,78 C659.2186552315552,51.30844822202027 686.5112021039164,16.634876512436524 704.75,22 C734.7838602087122,30.834758175732635 738.8688565818866,234.99052741099698 769,244 C787.2275702378141,249.45020121350558 814.5599425151592,215.45625022572858 833.25,189 C860.4352294654951,150.51861845441962 897.5,22 897.5,22 L897.5,400"></path><rect x="573.25" y="241" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect><rect x="637.5" y="75" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect><rect x="701.75" y="19" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect><rect x="766" y="241" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect><rect x="830.25" y="186" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect><rect x="894.5" y="19" width="6" height="6" style="stroke:blue;stroke-width:2;fill:blue;" class="graphGroup1 point"></rect></svg></div></div><div class="shadow top" style="visibility: hidden;"></div><div class="shadow bottom" style="visibility: hidden;"></div></div><div class="vispanel left" style="height: 402px; left: 0px; top: -1px;"><div class="content" style="left: 0px; top: 0px;"><div class="dataaxis" style="width: 63px; height: 400px; top: 0px; left: 0px;"><svg style="position: absolute; top: 0px; height: 100%; width: 100%; display: block;"><rect x="4" y="4" width="20" height="15" class="outline"></rect><path class="graphGroup1" d="M4,11.5 L24,11.5" style="stroke:blue;stroke-dasharray:1 0;stroke-width:2;"></path><path d="M4,11.5 L4,19 L24,19L24,11.5" class="graphGroup1 iconFill"></path><rect x="11" y="8.5" width="6" height="6" class="graphGroup1 point" style="stroke:blue;stroke-width:2;fill:blue;"></rect></svg><div class="yAxis major" style="left: -10px; text-align: right; top: 13px;">30</div><div class="yAxis major" style="left: -10px; text-align: right; top: 124px;">20</div><div class="yAxis major" style="left: -10px; text-align: right; top: 235px;">10</div><div class="yAxis major" style="left: -10px; text-align: right; top: 347px;">0</div></div></div><div class="shadow top" style="visibility: hidden;"></div><div class="shadow bottom" style="visibility: hidden;"></div></div><div class="vispanel right" style="height: 402px; left: 577px; top: -1px;"><div class="content" style="left: 0px; top: 0px;"></div><div class="shadow top" style="visibility: hidden;"></div><div class="shadow bottom" style="visibility: hidden;"></div></div><div class="vispanel top" style="width: 514px; left: 63px; top: 0px;"></div><div class="vispanel bottom" style="width: 514px; left: 63px; top: 401px;"><div class="timeaxis foreground" style="height: 48px;"><div class="text minor measure" style="position: absolute;">0</div><div class="text major measure" style="position: absolute;">0</div><div class="text minor day10 june odd" style="top: 0px; left: 0px;">10</div><div class="text minor day11 june even" style="top: 0px; left: 64.25px;">11</div><div class="text minor day12 june odd" style="top: 0px; left: 128.5px;">12</div><div class="text minor day13 june even" style="top: 0px; left: 192.75px;">13</div><div class="text minor day14 june odd" style="top: 0px; left: 257px;">14</div><div class="text minor day15 june even" style="top: 0px; left: 321.25px;">15</div><div class="text minor day16 june odd" style="top: 0px; left: 385.5px;">16</div><div class="text major day18 june odd" style="top: 24px; left: 0px;">June 2014</div><div class="text minor day17 june even" style="top: 0px; left: 449.75px;">17</div><div class="text minor day18 june odd" style="top: 0px; left: 514px;">18</div></div></div></div></div> -->
        </td>
        <td style="padding-left: 5px;">
            <table style="font-size: 12px;">
                <colgroup><col width="150">
                <col width="50">
                </colgroup><tbody><tr>
                    <td>Line Color</td>
                    <td>
                        <select id="color" onchange="updateStyle()">
                            <option value="stroke:green;">green</option>
                            <option value="stroke:red;">red</option>
                            <option value="stroke:blue;" selected="selected">blue</option>
                            <option value="stroke:black;">black</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Line Style</td>
                    <td>
                        <select id="line" onchange="updateStyle()">
                            <option value="stroke-dasharray:1 0;" selected="selected">line</option>
                            <option value="stroke-dasharray:10 10;">dash</option>
                            <option value="stroke-dasharray:2 2;">dot</option>
                            <option value="stroke-dasharray:10 5 2 5;">dash-dot</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Line thickness</td>
                    <td>
                        <select id="thickness" onchange="updateStyle()">
                            <option value="stroke-width:0;">0</option>
                            <option value="stroke-width:1;">1</option>
                            <option value="stroke-width:2;" selected="selected">2</option>
                            <option value="stroke-width:3;">3</option>
                            <option value="stroke-width:4;">4</option>
                            <option value="stroke-width:5;">5</option>
                            <option value="stroke-width:6;">6</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fill Position</td>
                    <td>
                        <select id="fill" onchange="updateStyle()">
                            <option value="">none</option>
                            <option value="top">top</option>
                            <option value="bottom" selected="selected">bottom</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fill Color</td>
                    <td>
                        <select id="fillcolor" onchange="updateStyle()">
                            <option value="fill:green;">green</option>
                            <option value="fill:red;">red</option>
                            <option value="fill:blue;" selected="selected">blue</option>
                            <option value="fill:black;">black</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Fill Opacity</td>
                    <td>
                        <select id="fillopacity" onchange="updateStyle()">
                            <option value="opacity:0.1;">0.1</option>
                            <option value="opacity:0.2;">0.2</option>
                            <option value="opacity:0.3;">0.3</option>
                            <option value="opacity:0.4;">0.4</option>
                            <option value="opacity:0.5;">0.5</option>
                            <option value="opacity:0.6;" selected="selected">0.6</option>
                            <option value="opacity:0.7;">0.7</option>
                            <option value="opacity:0.8;">0.8</option>
                            <option value="opacity:0.9;">0.9</option>
                            <option value="opacity:1;">1</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Points Shape</td>
                    <td>
                        <select id="points" onchange="updateStyle()">
                            <option value="">none</option>
                            <option value="circle">circle</option>
                            <option value="square" selected="selected">square</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Points Size</td>
                    <td>
                        <select id="pointsize" onchange="updateStyle()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6" selected="selected">6</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Points Color</td>
                    <td>
                        <select id="pointcolor" onchange="updateStyle()">
                            <option value="stroke:green;">green</option>
                            <option value="stroke:red;">red</option>
                            <option value="stroke:blue;" selected="selected">blue</option>
                            <option value="stroke:black;">black</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Point Line Thickness</td>
                    <td>
                        <select id="pointthickness" onchange="updateStyle()">
                            <option value="stroke-width:0;">0</option>
                            <option value="stroke-width:1;">1</option>
                            <option value="stroke-width:2;" selected="selected">2</option>
                            <option value="stroke-width:3;">3</option>
                            <option value="stroke-width:4;">4</option>
                            <option value="stroke-width:5;">5</option>
                            <option value="stroke-width:6;">6</option>
                        </select>
                    </td>
                </tr><tr>
                </tr>
                  <tr><td>Points Fill Color</td>
                    <td>
                        <select id="pointfill" onchange="updateStyle()">
                            <option value="fill:green;">green</option>
                            <option value="fill:red;">red</option>
                            <option value="fill:blue;" selected="selected">blue</option>
                            <option value="fill:black;">black</option>
                        </select>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>


<script type="text/javascript">

var names = ['SquareShaded', 'Bargraph', 'Blank', 'CircleShaded'];
var groups = new vis.DataSet();
    groups.add({
    id: 0,
    content: names[0],
    options: {
        drawPoints: {
            style: 'square' // square, circle
        },
        shaded: {
            orientation: 'bottom' // top, bottom
        }
    }});

groups.add({
    id: 1,
    content: names[1],
    options: {
        style:'bar'
    }});

groups.add({
    id: 2,
    content: names[2],
    options: {
        style:'bar'
    }});

    var container = document.getElementById('visualization');
    var items = [
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_i_weight']; ?>, group: 0},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_i_weight']; ?>, group: 0},
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_bodyfat']; ?>, group: 1},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_bodyfat']; ?>, group: 1},
        {x: '<?php echo $before; ?>', y: <?php echo $measurement['b_waist']; ?>, group: 2},
        {x: '<?php echo $after; ?>', y: <?php echo $measurement['a_waist']; ?>, group: 2}
        // {x: '2014-06-12', y: 25, group: 0},
        // {x: '2014-06-13', y: 30, group: 0},
        // {x: '2014-06-14', y: 10, group: 0},
        // {x: '2014-06-15', y: 15, group: 0},
    ];

    var dataset = new vis.DataSet(items);
    var options = {
        start: '<?php echo $before; ?>',
        end: '<?php echo $after; ?>',
        dataAxis: {
            showMinorLabels: false,
            icons: true
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