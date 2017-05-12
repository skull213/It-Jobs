<?php 
require_once("includes/header.php");
require_once("includes/view.php");
require_once("includes/categories.php");
require_once("includes/categories_manager.php");
require_once("includes/listing.php");
$aAllCategories = CategoriesManager::getAllCategories();  

$oListings = new Listing();
$oListings->load($_GET["ListingsID"]); 
?>

<div id="middlebox">
		<div class="websiteheading"> 
			<h1>Discover Your Future Job</h1>
		</div>	
	</div>
	<div id="categories3" class="self_clear">
		<div id="listingsnav">
					<?php echo View::renderNavtwo($aAllCategories); ?>

			<!-- <ul>
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


		

		<div id="listingsboxfull">
		
<!-- 
			<div id="listingdescroption">

			
				<h1>PHP Web Developer </h1><br><br><br>
				<p>Company: Sunstone Talent </p><br><br>
				<p>Location: Christchur­ch City, Canterbury </p><br><br>
				<p>Pay and benefits: 	$50k-$70k+­GreatTeamCulture+DrinksFridge+Free Fruit </p><br><br>
				<p>Telephone:123243546</p><br><br>
			</div>
				 -->
				<!-- <div id="listingspic">
					<img src="img/puma.png">
				</div> -->
				<div id="fulldescription">

					<?php echo View::RenderFullListing($oListings); ?>
				<!-- 	<h1>Description</h1><br><br>
					<p> Our culture 

					SilverStripe is big on things like building trusting relationships, sharing ideas, being open, using technology to solve important problems, and helping others reach their goals. We actively foster a culture that supports these core values. Our culture kicks ass.
					<br><br>
					How to apply
					<br><br>
					At SilverStripe, we see finding the right team fit as crucial, so in the first instance we'll invite you for a casual coffee. If that goes well, we invite you to formal interviews. We’ll take you through a technical interview first. You’ll then get a chance to meet your future team mates to assess team fit. By the end of this process, we’ll both know if we want to work together.

					If you think you would make a great SilverStriper, please apply online via https://silverstripe.workable.com/jobs/75559.

					Applicants for this position should have NZ residency or a valid NZ work visa.
					rrgetrgetrhgg
					etrhgergreh
					terhtrehrt </p>


					<p> Our culture kicks ass

					SilverStripe is big on things like building trusting relationships, sharing ideas, being open, using technology to solve important problems, and helping others reach their goals. We actively foster a culture that supports these core values. Our culture kicks ass.
					<br><br>
					How to apply
					<br><br>
					At SilverStripe, we see finding the right team fit as crucial, so in the first instance we'll invite you for a casual coffee. If that goes well, we invite you to formal interviews. We’ll take you through a technical interview first. You’ll then get a chance to meet your future team mates to assess team fit. By the end of this process, we’ll both know if we want to work together.

					If you think you would make a great SilverStriper, please apply online via https://silverstripe.workable.com/jobs/75559.

					Applicants for this position should have NZ residency or a valid NZ work visa.
					rrgetrgetrhgg
					etrhgergreh
					terhtrehrt </p>

					
					<ul class="applay">
					<li><a href="">applay</a></li>
				</ul> -->
				
				</div>
				
		</div>
	</div>	
			
		
<?php require_once("includes/footer.php") ?>