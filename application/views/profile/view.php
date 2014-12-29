<h1><?php echo $profile['username']; ?>!</h1>
<hr/>
<p>Username: <?php echo $profile['username']; ?></p>
<p>Joined: <?php echo $joined; ?></p>
<p>Last online: <?php echo $last_online; ?></p>
<p>Email: <?php echo $profile['email']; ?></p>
<p>Name: <?php echo $profile['first_name'].' '.$profile['last_name']; ?></p>
<p>Age: <?php echo $age; ?></p>
<p>gender: <?php echo $profile['gender']; ?></p>
<p>location: <?php echo $profile['location']; ?></p>
<p><?php echo $gym_partner; ?></p>
<p>goal: <?php echo $profile['goal']; ?></p>
<p>about: <?php echo $profile['about']; ?></p>
<hr/>
<p>weight measurement: <?php echo $progress->weight; ?>kg</p>
<p>height measurement: <?php echo $progress->height; ?>cm</p>
<p>arm measurement: <?php echo $progress->arm; ?>cm</p>
<p>thigh measurement: <?php echo $progress->thigh; ?>cm</p>
<p>waist measurement: <?php echo $progress->waist; ?>cm</p>
<p>chest measurement: <?php echo $progress->chest; ?>cm</p>
<p>calves measurement: <?php echo $progress->calves; ?>cm</p>
<p>forearms measurement: <?php echo $progress->forearms; ?>cm</p>
<p>neck measurement: <?php echo $progress->neck; ?>cm</p>
<p>hips measurement: <?php echo $progress->hips; ?>cm</p>
<p>bodyfat measurement: <?php echo $progress->bodyfat; ?>%</p>
<p>squats: <?php echo $progress->squats; ?>kg</p>
<p>bench: <?php echo $progress->bench; ?>kg</p>
<p>deadlift: <?php echo $progress->deadlift; ?>kg</p>