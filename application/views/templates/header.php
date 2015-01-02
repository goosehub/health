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
    <link rel="shortcut icon" href="favicon.ico">
<!-- CSS -->
	<link type="text/css" rel="stylesheet" href="resources/style.css">
</head>
<body>
<?php if(isset($unread)){if($unread != false){
$unread = '('.$unread.') unread'; }else{
$unread='';}}else{$unread = '';} ?>
<header>
	<h1>Health Web App</h1>
	<div id="nav-bar">
		<img width="50px" height="50px" src="/health/uploads/<?php echo $self['image']; ?>"/>
		<a id="home" class="nav-item" type="button" href="/health/">Home</a> |
		<a id="about" class="nav-item" type="button" href="/health/about">About</a> |
		<a id="search" class="nav-item" type="button" href="/health/search">Search</a> |

<!-- User is logged in -->
		<?php if ( isset($log_check) ) { ?>
		<a id="dashboard" class="nav-item" type="button" href="/health/dashboard">Dashboard</a> | 
		<a class="dashboard-link" href="/health/dashboard/progress/new">Progress</a> | 
		<a class="dashboard-link" href="/health/dashboard/conversations">
		Conversations <?php echo $unread; ?></a> |
		<a id="logout" class="nav-item" type="button" href="/health/login/logout">Logout</a> |
<!-- User is NOT logged in -->
		<?php } else { ?>
		<a id="login" class="nav-item" type="button" href="/health/dashboard">Login</a> |
		<a id="join" class="nav-item" type="button" href="/health/join">Join</a> |
		<?php } ?>

	</div>
</header>
