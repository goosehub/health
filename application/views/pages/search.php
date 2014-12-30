<h1>Search Members</h1>
<h2>Search by username</h2>
   <?php echo validation_errors(); ?>
   <?php echo form_open('pages/do_search'); ?>
	<input type="search" id="search_input" name="search"></inupt>
	</fonm>
<h2>Recent Users</h2>

<!-- Start Logic for Each User Item -->
<?php $i = 0;
foreach ( array_reverse($users) as $user): ?>

<!-- Start User Item -->

<hr/>
<h4>Username: <?php echo $user->username; ?></h4>
<p>Age: <?php echo $age; ?></p>
<p>Joined on: <?php echo $joined; ?></p>
<p>Last Online: <?php echo $last_online; ?></p>
<p><?php echo $gym_partner; ?></p>
<a href="users/<?php echo $user->username; ?>"> View profile </a>

<!-- End User Item -->

<?php $i = $i + 1;
if ($i == 10) break;
endforeach ?>
<!-- End Logic for Each User Item -->