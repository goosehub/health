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
<!-- Facebook App Init -->
<!--
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
	
			<div class="fr">
				
				<div class="nest">
					
					<div class="active-user" data-dropdown="#dropdown-1">
				
						<a href="#"><img src="<?=base_url()?>resources/images/avatar.jpg" alt="" /><?php echo $name; ?><span class="icon-chevron-down2"></span></a>
						
						<div class="mt-med"><div class="nest"><div id="dropdown-1" class="dropdown dropdown-tip">
    <ul class="dropdown-menu">
        <li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>">My Profile</a></li>
        <li><a href="<?=base_url()?>users/<?php echo $self['username']; ?>>/friends">Friends List</a></li>
        <li><a href="<?=base_url()?>dashboard/friend_requests">Friend Requests</a></li>
        <li class="dropdown-divider"></li>
        <li><a href="<?=base_url()?>login/logout">Sign Out</a></li>
    </ul>
</div></div></div>
						
					</div><!--active-user-->
					
				</div><!--nest-->
				
			</div><!--fr-->
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
			</div></div>
	<!-- Profile Image -->
		
<!-- 			<div class="profile-img-cnt">
				<a href="<?=base_url()?>users/<?php echo $self['username']; ?>">
					<img class="nav-img" src="<?=base_url()?>uploads/<?php echo $self['image']; ?>"/>
				</a>
			</div> -->
			<?php } ?></div>
			
			<!-- User is NOT logged in -->
			
<!-- Unlogged in navbar --><div class="wrapper">
		<!--<a href="<?=base_url()?>">Home</a> |
		<a href="<?=base_url()?>about">About</a> |<!-->
		<!-- <a href="<?=base_url()?>dashboard">Login</a> | -->
		<!-- <a href="<?=base_url()?>join">Join</a> | -->
		<?php if ( ! isset($log_check) ) { ?>
		<div class="fr"><div class="login">
		  <?php echo validation_errors(); ?>
		  <?php echo form_open('login/verifylogin'); ?>
		   <label for="username">Email Address:</label>
		   <input type="text" class="login-input" name="username"/>
		   <label for="password">Password:</label>
		   <input type="password" class="login-input" name="password"/>
		   <input type="submit" value="Login"/>
		  </form></div>
		  </div></div>
		<?php } ?>
<!--
		<script>
		  // This is called with the results from from FB.getLoginStatus().
		  function statusChangeCallback(response) {
		    console.log('statusChangeCallback');
		    console.log(response);
		    // The response object is returned with a status field that lets the
		    // app know the current login status of the person.
		    if (response.status === 'connected') {
		      // Logged into your app and Facebook.
		      testAPI();
		    } else if (response.status === 'not_authorized') {
		      // The person is logged into Facebook, but not your app.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into this app.';
		    } else {
		      // The person is not logged into Facebook, so we're not sure if
		      // they are logged into this app or not.
		      document.getElementById('status').innerHTML = 'Please log ' +
		        'into Facebook.';
		    }
		  }
		  // This function is called when someone finishes with the Login Button.
		  function checkLoginState() {
		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
		  }
		  window.fbAsyncInit = function() {
		  FB.init({
		    appId      : '691232867658713',
		    cookie     : true,  // enable cookies to allow the server to access 
		                        // the session
		    xfbml      : true,  // parse social plugins on this page
		    version    : 'v2.1' // use version 2.1
		  });
		  // FB.getLoginStatus().  This function gets the state of the
		  // person visiting this page and can return one of three states to
		  // the callback you provide.  They can be:
		  // 1. Logged into your app ('connected')
		  // 2. Logged into Facebook, but not your app ('not_authorized')
		  // 3. Not logged into Facebook and can't tell if they are logged into
		  //    your app or not.
		  // These three cases are handled in the callback function.
		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });
		  };
		  // Here we run a very simple test of the Graph API after login is
		  // successful.  See statusChangeCallback() for when this call is made.
		  function testAPI() {
		    console.log('Welcome!  Fetching your information.... ');
		    FB.api('/me', function(response) {
		      console.log('Successful login for: ' + response.name);
		      document.getElementById('status').innerHTML =
		        'Thanks for logging in, ' + response.name + '!';
		      var username = response.name;
		      var email = response.email;
		      var id = response.id;
		      window.location.replace("http://interplay.xyz/health/facebook_login/"+username+"/"+email+"/"+id+"");
		    });
		  }
		</script>
		
		<!-- Login Button
		<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
		</fb:login-button>
		<div id="status"></div><!-->
		
		</div>
		</div>
		
	</div><!--wrapper-->
	
</header>

<!-- User is logged in -->
	<?php if ( isset($log_check) ) { ?>
<!-- Use URL to determine which button to apply active to -->
  	<?php $second_seg = $this->uri->segment(2); ?>
  	<?php $first_seg = $this->uri->segment(1); ?>
	<aside>
<!-- Sidebar -->
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



		</div>
	</div>
<?php } ?>
<div class="wrapper">