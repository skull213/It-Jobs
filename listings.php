<?php
session_start();
require_once("includes/header.php");
require_once("includes/view.php");
require_once("includes/categories.php");
require_once("includes/categories_manager.php");

$aAllCategories = CategoriesManager::getAllCategories();   

$iCategory = 1;

if (isset($_GET["CategoriesID"])) {
	$iCategory = $_GET["CategoriesID"];
}

$oCategory = new Categories();
$oCategory->load($iCategory);

?>



<!-- <div id="middlebox">
	 <div class="websiteheading"> 
		
	</div>	
</div> -->

<?php echo View::renderHeading($oCategory); ?>
<div id="categories3" class="self_clear">
	<div id="listingsnav">
		<?php echo View::renderNavtwo($aAllCategories); ?>
	<!-- 	<ul>
			<li><a href="">Business Analyst</a></li>
			<li><a href="">JavaScript</a></li>
			<li><a href="">PHP Developer</a></li>
			<li><a href="">Network Systems</a></li>
			<li><a href="">Java Developer</a></li>
			<li><a href="">Android Developer</a></li>
			<li><a href="">Web Developer</a></li>
			<li><a href="">Linux Administrator</a></li>
			<li><a href="">Database Administrator</a></li>
			<li><a href="">Graphics Designer</a></li>
		</ul> -->
	</div>


			<?php echo View::renderCategories($oCategory); ?>

	
<!-- 	<div id="listingsbox">
		<div id="listingdescroption">
			<a href="full_listing_details.php"><h1>PHP Developer</h1></a><br>
			<p>Company Name: Website Angels </p><br>
			<p>Location: Auckland</p><br>
			<p>Type:Part Time</p>
			
			<ul class="save">
				<li><a href="register.php">save</a></li>
			</ul>
			<ul class="applay">
				<li><a href="">applay</a></li>
			</ul>
		</div>

			<div id="listingspic">
				<img src="img/puma.png">
			</div>	
	</div> -->




</div>	

<?php require_once("includes/footer.php") ?>
