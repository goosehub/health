<h1>Dashboard - Private Area</h1>
<h2>Welcome <?php echo $profile['username']; ?>!</h2>

<a class="dashboard-link" href="users/<?php echo $profile['username']; ?>">View your profile</a><br/>
<a class="dashboard-link" href="dashboard/progress/new">Set New Progress Point</a><br/>
<a class="dashboard-link" href="users/<?php echo $profile['username']; ?>/progress">See Your Progress Points</a><br/>
<a class="dashboard-link" href="dashboard/requirements">Nutritional Requirements</a><br/>
<a class="dashboard-link" href="dashboard/profile">Change/Add Basic Information</a><br/>
<!-- <a class="dashboard-link" href="#">Change Profile Picture</a><br/> -->
<a class="dashboard-link" href="dashboard/password">Change Password</a><br/>
