<?php 
session_start();
require_once("includes/header.php"); 
require_once("includes/view.php");
require_once("includes/members.php");
require_once("includes/categories_manager.php");

if ($_SESSION["MembersID"] == false) {
	header("location:register.php");
}

$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

if ($oTestMember->admin !=1) {
	header("Location:register.php");
}

$aAllMembers = CategoriesManager::getAllMembers();  
?>

	
	<div id="middlebox">
		<div class="websiteheading"> 
			<h1>Admin Manage Members</h1>
		</div>	
	</div>
	<div id="categories">
		<!-- <h1>Popular job searches</h1> -->
			
		<!-- <div id="nav"> -->
				<!-- <div id="navbox"> -->
					
						<?php echo View::renderAdminMembers($aAllMembers); ?>
					
					<!-- <ul>
						<li><a href="listings.php">Business Analyst<i class="icon1"></i></a></li>
						<li><a href="">JavaScript<i class="icon4"></i></a></li>
						<li><a href="">PHP Developer<i class="icon2"></i></a></li>
						<li><a href="">Network Systems<i class="icon9"></i></a></li>
						<li><a href="">Java Developer<i class="icon4"></i></a></li>
						<li><a href="">Android Developer<i class="icon3"></i></a></li>
						<li><a href="">Web Developer<i class="icon5"></i></a></li>
						<li><a href="">Linux Administrator<i class="icon6"></i></a></li>
						<li><a href="">Database Administrator<i class="icon7"></i></a></li>
						<li><a href="">Graphics Designer<i class="icon8"></i></a></li>
						
					</ul> -->


				<!-- </div> -->
			<!-- 	<div id="navbox">
					<ul>
						<li><a href="">Web Developer</a></li>
						<li><a href="">Computer Technician</a></li>
						<li><a href="">Software Developer</a></li>
					</ul>
				</div>
				<div id="navbox">
					<ul>
						<li><a href="">Java Developer</a></li>
						<li><a href="">PHP Developer</a></li>
						<li><a href="">network engineer</a></li>
					</ul>
				</div> -->
				
	    </div>
	
<?php require_once("includes/footer.php") ?>

