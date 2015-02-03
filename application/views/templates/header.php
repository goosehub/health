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
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/reset.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/style.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/newstyle.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/framework.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/icons.css">
	<link rel="stylesheet" href="http://i.icomoon.io/public/temp/cc430a925c/ProgressPals/style.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Montserrat:400,700' />
	<script type="text/javascript" src="<?=base_url()?>resources/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/tipped.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/tooltips.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/tipped.css" />
	 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://dl.dropbox.com/u/40036711/Scripts/ddslick.js"></script>
	 <script type="text/javascript" src="<?=base_url()?>resources/dd.js"></script>
	
</head>
<body>

<!-- Facebook App Init -->

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '691232867658713',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

</script>

<!-- End Facebook Code -->

<header>
	
	<div class="wrapper">
		
		<!-- <h1>Health Web App</h1> -->
	
	<!-- show profile picture if user is logged in -->
			<?php if ( isset($log_check) ) { ?>
	<!-- Search -->
			<div class="fl">
				
			    <?php echo validation_errors(); ?>
			    <?php $attributes = array('name' => 'search_form');
			    echo form_open('pages/do_search', $attributes); ?>
				<input id="keyword" name="search" class="search" />
	            <i class="icon-search2"></i>
			    <input name="search-submit" type="submit" value="foo" style="position: absolute; left: -9999px">
				</form>
				
			</div><!--fl-->
			
			<div class="fr">
				
	<!-- Dropdown -->
	<!--
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
	<!-- Profile Image --><!--
			<div class="profile-img-cnt">
				<a href="<?=base_url()?>users/<?php echo $self['username']; ?>">
				<img class="nav-img" src="<?=base_url()?>uploads/<?php echo $self['image']; ?>"/>
	
				</a>
			</div>
			<?php } ?></div><!-->
		
	</div><!--wrapper-->
	
</header>

<!-- User is logged in -->
		<?php if ( isset($log_check) ) { ?>
		<aside>
<!-- Sidebar -->
		<ul>

			<li><a href="<?=base_url()?>dashboard" id="dashboard"><span class="icon-gauge"></span></a></li>
			<li><a href="<?=base_url()?>dashboard/meals" id="nutrition"><span class="icon-bowl"></span></a></li>
			<li><a href="<?base_url()?>dashboard/routines" id="routines"><span class="icon-blackboard"></span></a></li>
			<li><a href="<?=base_url()?>dashboard/progress" id="progress"><span class="icon-area-graph"></span></a></li>
			<li class="active" id="conversations"><a href="<?=base_url()?>dashboard/conversations"><span class="icon-chat"></span></a></li>
			<li><a href="<?=base_url()?>help" id="help"><span class="icon-lifebuoy"></span></a></li>

		</ul>
		
		</aside>
				
<!-- Facebook Like Button
<?php $hide_like = $this->uri->segment(1, 0);
	if ($hide_like != 'dashboard')
		{ ?>
			<div
			  class="fb-like"
			  data-layout="box_count"
			  data-send="true"
			  data-width="450"
			  data-show-faces="true">
			</div>
		<?php } ?>-->

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

<div class="wrapper">