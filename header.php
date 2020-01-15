<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width">
	<!-- https://getbootstrap.com/docs/3.4/examples/theme/# -->
	<!-- https://fonts.google.com/?selection.family=Stardos+Stencil -->
	<!-- Title -->
	<title>Sharing With Friends!</title>
	<!-- Title Icon -->
	<link rel="icon" type="img" href="images/icon.png">
	<!-- Web-Font -->
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Beth+Ellen|Indie+Flower|Lobster|Pacifico|Shadows+Into+Light|Teko&display=swap" rel="stylesheet">

	<!-- Cascading Style Sheets -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">

</head>
<body>
	<div class="main">

	<header>

		<nav class="navbar header" id="myHeader">
			<div class="navbar-header">
			
			    <button type="button" class="navbar-toggle minus collapsed" data-toggle="collapse" data-target="#navbar-collapse-minus">
					<span class="icon-bar bg-yellow"></span>
					<span class="icon-bar bg-yellow"></span>
					<span class="icon-bar bg-yellow"></span>
				</button>
			</div>
			
			<div class="collapse navbar-collapse col-md-8 col-md-offset-3" id="navbar-collapse-minus">
			  <ul class="nav navbar-nav">
			    <li class="active font8 home fs2"><a href="index.php?#section1" class="ancher">Home</a></li>
			    <li class="font8 fs2"><a href="index.php?#about" class="ancher">About Us</a></li>
			    <li class="font8 fs2"><a href="index.php?#contact" class="ancher">Contact </a></li>
<?php 

session_start();

if($_SESSION['u_id']==""){ 
?>

		    <li class="font8 fs2">
		    	<a href="#" class="ancher dropdown-toggle" type="button" data-toggle="dropdown">
		    		Get Started!
		    	</a>
		    	<ul class="dropdown-menu">
		    		<li class="font8 fs2"><a href="login.php">Log In</a></li>
		    		<li class="font8 fs2"><a href="signup.php">Not An User? Register With Us</a></li>
		    		<li class="font8 fs2"><a href="admin/admin.php">Admin Login</a></li>
		    	</ul>
		    </li>
			  <?php
					}else{
			  ?>
		    <li class="font8 fs2">
		    	<a href="#" class="ancher dropdown-toggle" type="button" data-toggle="dropdown">
		    		Browse
		    	</a>
		    	<ul class="dropdown-menu">
		    		<li class="font8 fs2"><a href="add_product.php">Add Personal Item</a></li>
		    		<li class="font8 fs2"><a href="view_product.php">View Your items</a></li>
		    		<li class="font8 fs2"><a href="view_borrow.php">Borrowed Items</a></li>
		    	</ul>
		    </li>
		    <li class="font8 fs2">
		    	<a href="#" class="ancher dropdown-toggle" type="button" data-toggle="dropdown">Notifications</a>

		    	<ul class="dropdown-menu">
		    		<li class="font8 fs2"><a href="sendrequest.php">Sent Requests</a></li>
		    		<li class="font8 fs2"><a href="recieverequest.php">Recieved Requests</a></li>
		    	</ul>
		    </li>
		    <li class="font8 fs2">
		    	<a href="#" class="ancher dropdown-toggle" type="button" data-toggle="dropdown">
		    		Settings
		    	</a>
		    	<ul class="dropdown-menu">
		    		<li class="font8 fs2"><a href="profile.php">Profile</a></li>
		    		<li class="font8 fs2"><a href="password.php">Update Password</a></li>
		    		<li class="font8 fs2"><a href="logout.php">Logout!</a></li>
		    	</ul>
		    </li>
			  <?php
			}
				?>
			  </ul>
			</div>
		</nav>
	</header>