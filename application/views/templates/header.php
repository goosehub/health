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
<header>
	<!-- <h1>Health Web App</h1> -->
	<div class="top-header">
<!-- show profile picture if user is logged in -->
		<?php if ( isset($log_check) ) { ?>
<!-- Search -->
		<div class="search-bar">
		    <?php echo validation_errors(); ?>
		    <?php echo form_open('pages/do_search'); ?>
			<input class="search-input" type="search" name="search" placeholder="search"></input>
			</fonm>
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
		<a class="sidebar-item" href="<?=base_url()?>dashboard/meals">Meal Tracking</a> 
		<a class="sidebar-item" href="<?=base_url()?>dashboard/routines">My Routines</a> 
		<a class="sidebar-item" href="<?=base_url()?>dashboard/progress">My Progress</a> 
		<a class="sidebar-item" href="<?=base_url()?>dashboard/conversations">
		Conversations<?php echo $unread; ?></a>
		<a class="sidebar-item" href="<?=base_url()?>help">FAQ/Help</a>
		
<!-- User is NOT logged in -->
		<?php } else { ?>
<!-- Unlogged in navbar -->
		<a href="<?=base_url()?>">Home</a> |
		<a href="<?=base_url()?>about">About</a> |
		<a href="<?=base_url()?>search">Search</a> |
		<a href="<?=base_url()?>dashboard">Login</a> |
		<a href="<?=base_url()?>join">Join</a> |
		</div>
		<?php } ?>

	</div>
</header>

<div class="page-wrap">