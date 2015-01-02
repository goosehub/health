<h1>Search Members</h1>
<h2>Search by username</h2>
   <?php echo validation_errors(); ?>
   <?php echo form_open('pages/do_search'); ?>
	<input type="search" id="search_input" name="search"></inupt>
	</fonm>
<h2>Recent Users</h2>

<!-- Start Logic for Each User Item -->
<?php $this->load->helper('date');
$now = time();
$i = 0;
foreach ( array_reverse($users) as $user): 
// Calculate age
	$birthdate = $user->birthdate;
	$birthdate = date('Ymd', strtotime($birthdate));
	$diff = date('Ymd') - $birthdate;
	$age = substr($diff, 0, -4);
// Calculate last online
	$last_online = $user->last_online;
	$last_online = timespan($last_online, $now);
// Format joined
	$joined = $user->joined;
	$joined = date("M j, g:i A T", $joined);
// Translate gym_partner to phrase
	if ($user->gym_partner === 'on') {
		$gym_partner = 'Currently looking for a gym partner';
	} else {
		$gym_partner = 'Not looking for a gym partner';
	}
?>

<!-- Start User Item -->

<hr/>
<h4>Username: <?php echo $user->username; ?></h4>
<img width="150px" height="150px" src="uploads/<?php echo $user->image; ?>"/>
<p>Age: <?php echo $age; ?></p>
<p>Joined on: <?php echo $joined; ?></p>
<p>Last Online: <?php echo $last_online; ?> ago</p>
<p><?php echo $gym_partner; ?></p>
<a href="users/<?php echo $user->username; ?>"> View profile </a>

<!-- End User Item -->

<?php $i = $i + 1;
// Set the number below to desired number of profiles to show
if ($i == 10) break;
endforeach ?>
<!-- End Logic for Each User Item -->