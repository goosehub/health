<h1>Dashboard - Private Area</h1>
<h2>Welcome <?php echo $name; ?>!</h2>

<h4><a href="users/<?php echo $profile['username']; ?>">View your profile</a></h4>
<h4><a href="users/<?php echo $profile['username']; ?>/friends">Friends</a></h4>
<h4><a href="dashboard/friend_requests">Friend Requests<?php echo $head_requests; ?></a></h4>
<h4><a href="browse">Browse Users</a></h4>
<h4><a href="dashboard/requirements">Nutritional Requirements</a></h4>
<h4><a href="dashboard/profile">Settings</a></h4>
<hr/>
<h4><a href="login/logout">Logout</a></h4>