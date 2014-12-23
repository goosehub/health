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

<header>
	<h1>Health Web App</h1>
	<div id="nav-bar">
		<a id="home" class="nav-item" type="button" href="/health/">Home</a>
		<a id="about" class="nav-item" type="button" href="/health/about">About</a>

<!-- log_check is TRUE when user is logged in -->
		<?php
		if ( $log_check === TRUE) {
			echo '<a id="login" class="nav-item" type="button" href="/health/dashboard">Dashboard</a>';
		} else {
			echo '<a id="login" class="nav-item" type="button" href="/health/dashboard">Login</a>';
		}
		?>

	</div>
</header>
