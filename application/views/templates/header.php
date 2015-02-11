<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="robots" CONTENT="all">
    <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/reset.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/style.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/newstyle.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/framework.css">
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/icons.css">
	<link rel="stylesheet" href="http://i.icomoon.io/public/temp/cc430a925c/ProgressPals/style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="<?=base_url()?>resources/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/tipped.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/tooltips.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resources/tipped.css" />
	<link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/55864/ProgressPals/style.css">
	<!-- Fallback for Internet Explorer 9 -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>resources/jquery.dropdown.css" />
	<script type="text/javascript" src="<?=base_url()?>resources/jquery.dropdown.js"></script>
	
</head>

<body>

	<header>
		
		<div class="wrapper">
		
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
					
					<div class="active-user" data-dropdown="#dropdown-1">
				
						<a href="#"><img src="<?=base_url()?>resources/images/avatar.jpg" alt="" />
						<?php echo $name; ?><span class="icon-chevron-down2"></span></a>
						
						<div class="mt-med"><div class="nest"><div id="dropdown-1" class="dropdown dropdown-tip">
    <ul class="dropdown-menu">
        <li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>">My Profile</a></li>
        <li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>/friends">Friends List</a></li>
        <li><a href="<?=base_url()?>dashboard/friend_requests">Friend Requests</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="<?=base_url()?>login/logout">Sign Out</a></li>
    </ul>
</div></div></div>
				<!-- Dropdown -->
				<div class="fr">
					
					<div class="nest">
						
						<div class="active-user" data-dropdown="#dropdown-1">
					
							<a href="#"><img src="<?=base_url()?>uploads/<?php echo $self['image']; ?>"/><?php echo $name; ?>
							<span class="icon-chevron-down2"></span></a>
							
							<div class="mt-med">
								
								<div class="nest">
									
									<div id="dropdown-1" class="dropdown dropdown-tip">
	    
										<ul class="dropdown-menu">
	        
											<li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>">My Profile</a></li>
											<li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>">Account Settings</a></li>
	        								<li class="dropdown-divider"></li>
											<li><a href="http://google.com">Sign Out</a></li>
	    								
	    								</ul>
									
									</div><!--dropdown-->
	
								</div><!--nest-->
	
							</div><!--mt-med-->
							
						</div><!--active-user-->
						
					</div><!--nest-->
					
				</div><!--fr-->
				
			</div><!--fr-->

			<?php } ?></div>
			<!-- User is NOT logged in -->
				
				<!-- User is NOT logged in -->
				<div class="wrapper">
			
					<?php if ( ! isset($log_check) ) { ?>
				
					<div class="fr">
						
						<div class="login">
							
							<?php echo validation_errors(); ?>
							<?php echo form_open('login/verifylogin'); ?>
			   
								<label for="username">Email Address:</label><input type="text" class="login-input" name="username"/>
								<label for="password">Password:</label><input type="password" class="login-input" name="password"/>
								<input type="submit" value="Login"/>
							
							</form>
							
						</div><!--sign-in-->
						
			  		</div><!--fr-->
			  		
			  </div><!--wrapper-->
			  
			<?php } ?>
	
	</header>

	<!-- User is logged in -->
	<?php if ( isset($log_check) ) { ?>
	
	<!-- Use URL to determine which button to apply active to -->
  	<?php $second_seg = $this->uri->segment(2); ?>
  	<?php $first_seg = $this->uri->segment(1); ?>
	
	<aside>

		<ul>
			
			<li <?php if ($second_seg != 'meals' && $second_seg != 'routines' && $second_seg != 'progress' 
			&& $second_seg != 'conversations' &&  $first_seg === 'dashboard') echo 'class="active"'; ?> >
			<a href="<?=base_url()?>dashboard" id="dashboard"><span class="icon-gauge"></span></a></li>
	
			<li <?php if ($second_seg === 'meals') echo 'class="active"'; ?> >
			<a href="<?=base_url()?>dashboard/meals" id="nutrition"><span class="icon-bowl"></span></a></li>
			
			<li <?php if ($second_seg === 'routines') echo 'class="active"'; ?> >
			<a href="<?=base_url()?>dashboard/routines" id="routines"><span class="icon-blackboard"></span></a></li>
			
			<li <?php if ($second_seg === 'progress') echo 'class="active"'; ?> >
			<a href="<?=base_url()?>dashboard/progress" id="progress"><span class="icon-area-graph"></span></a></li>
			
			<li <?php if ($second_seg === 'conversations') echo 'class="active"'; ?> id="conversations">
			<a href="<?=base_url()?>dashboard/conversations"><span class="icon-chat"></span></a></li>
			
			<li <?php if ($first_seg === 'help') echo 'class="active"'; ?> >
			<a href="<?=base_url()?>help" id="help"><span class="icon-lifebuoy"></span></a></li>

		</ul>
	
	</aside>
	
	<?php } ?>

	<div class="wrapper">