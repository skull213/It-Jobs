<?php
require_once("includes/members.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
	<link rel="stylesheet" href="assets/font-awesome-4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
 
</head>
<body>

	
	
<div id="container">
	<div id="header">
		<div class="logo">
			<ul>
				<li><a href="index.php">IT_Jobs <i class="fa fa-desktop"></i></a></li>
			</ul>
		</div>

		
		
		<div id="signup">
			<ul>
				<?php 
					$oMember = new Members();
				 if (isset($_SESSION["MembersID"]) == true) {
				 	$oMember->load($_SESSION["MembersID"]);

				 	if ($oMember->admin == 1) {
				 		echo '<li><a href="admin_listings.php"><i class="fa fa-sign-in"></i>Manage Listings</a></li>';
				 		echo '<li><a href="admin_members.php"><i class="fa fa-sign-in"></i>Manage Members</a></li>';
				 	}
				 }
				 ?>

				<?php if (isset($_SESSION["MembersID"]) == false) {
					echo '<li><a href="register.php"><i class="fa fa-sign-in"></i>  log in/Sign Up </a></li>';
				}else{
					echo '<li><a href="logOut.php"><i class="fa fa-sign-in"></i>  log out </a></li>';
				} 
				?>
				
				<li><a href="employers_Listings.php"><i class="fa fa-check-square-o"></i> My Jobs</a></li>
				<li><a href="mydetails.php"><i class="fa fa-info-circle"></i> My Details</a></li>
				
				<?php 
				if (isset($_SESSION["MembersID"]) == true) {
					echo '<li><a href="watchlist.php"><i class="fa fa-bars"></i> Watch List</a></li>';
				}else{
					echo '<li><a href="register.php"><i class="fa fa-bars"></i> watchlist</a></li>';
				}


				 ?>
				

				<?php if (isset($_SESSION["MembersID"]) == true) {
					echo '<li><a href="post_new_job.php"><i class="fa fa-sign-in"></i> Post Job</a></li>';
				} else

					echo '<li><a href="register.php"><i class="fa fa-paper-plane"></i> Post Job</a></li>';	
				?>
				<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>;
			
			</ul>
		</div>
	
	</div>