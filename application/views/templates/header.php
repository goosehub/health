<!DOCTYPE html>
<html lang="en">
<head>
<!-- For character display -->
	<meta charset="utf-8">
<!-- Title -->
	<title><?php echo $title ?></title>
<!-- For mobile views -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- For Crawlers -->
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="robots" CONTENT="all">
<!-- Fallback for Internet Explorer 9 -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- Favicon Icon -->
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/style.css">
</head>
<body>

<!-- Facebook Like Button Logic -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<header>
	<!-- <h1>Health Web App</h1> -->
	<div class="top-header">

<!-- show profile picture if user is logged in -->
		<?php if ( isset($log_check) ) { ?>
<!-- Search -->
		<div class="search-bar">
		    <?php echo validation_errors(); ?>
		    <?php $attributes = array('name' => 'search_form');
		    echo form_open('pages/do_search', $attributes); ?>
			<input class="search-input" type="search" name="search" placeholder="search"></input>
		    <input name="search-submit" type="submit" value="foo" style="position: absolute; left: -9999px">
			</form>
		</div>
<!-- Dropdown -->
		<div class="select-cnt">
			<select class="nav-select" onChange="window.location.href=this.value">
			  <option><?php echo $name; ?></option>
			  <option value="<?=base_url()?>users/<?php echo $self['username']; ?>">Your Profile</option>
			  <option value="<?=base_url()?>users/<?php echo $self['username']; ?>/friends">Your Friends</a></option>
			  <option value="<?=base_url()?>dashboard/friend_requests">
			Friend Requests<?php echo $head_requests; ?></a></option>
			  <option value="<?=base_url()?>login/logout">Logout</a></option>
			</select>
		</div>
<!-- Profile Image -->
		<div class="profile-img-cnt">
			<a href="<?=base_url()?>users/<?php echo $self['username']; ?>">
			<img class="nav-img" src="<?=base_url()?>uploads/<?php echo $self['image']; ?>"/>

			</a>
		</div>
		<?php } ?>
	</div>

<!-- User is logged in -->
		<?php if ( isset($log_check) ) { ?>
		<div class="sidebar">
<!-- Sidebar -->
		<a class="sidebar-item" href="<?=base_url()?>dashboard">Dashboard</a> 
		<hr/>
		<a class="sidebar-item" href="<?=base_url()?>dashboard/meals">Meal Tracking</a> 
		<hr/>
		<a class="sidebar-item" href="<?=base_url()?>dashboard/routines">My Routines</a> 
		<hr/>
		<a class="sidebar-item" href="<?=base_url()?>dashboard/progress">My Progress</a> 
		<hr/>
		<a class="sidebar-item" href="<?=base_url()?>dashboard/conversations">
		Conversations<?php echo $unread; ?></a>
		<hr/>
		<a class="sidebar-item" href="<?=base_url()?>help">FAQ/Help</a>
		<hr/>
<!-- Facebook Like Button -->
<?php $hide_like = $this->uri->segment(1, 0);
	if ($hide_like != 'dashboard')
		{ ?>
		<div class="fb-like" data-layout="box_count" data-action="like" data-show-faces="true" data-share="true"></div>
		<?php } ?>

<!-- User is NOT logged in -->
		<?php } else { ?>
<!-- Unlogged in navbar -->
		<a href="<?=base_url()?>">Home</a> |
		<a href="<?=base_url()?>about">About</a> |
		<a href="<?=base_url()?>dashboard">Login</a> |
		<a href="<?=base_url()?>join">Join</a> |
		<?php } ?>

		</div>
	</div>
</header>

<div class="page-wrap">