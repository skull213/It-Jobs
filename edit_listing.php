<?php
session_start(); 
require_once("includes/form.php");
require_once("includes/header.php");
require_once("includes/listing.php");


$oListing = new Listing();
$oListing->load($_GET["ListingsID"]);



$aExistingData = array();
$aExistingData["categories_title"] = $oListing->categoriesTitle; // ->categoriesTitle is also from public function get
$aExistingData["company_name"] = $oListing->companyName;
$aExistingData["occupation"] = $oListing->occupation;
$aExistingData["location"] = $oListing->location;
$aExistingData["telephone"] = $oListing->telephone;
$aExistingData["email"] = $oListing->email;
$aExistingData["listing_type"] = $oListing->listingType;
$aExistingData["description"] = $oListing->description;


$oForm = new Form("Update");
$oForm->data = $aExistingData;

if (isset($_POST["submit"])) {
	$oForm->data = $_POST;

		$oForm->checkFilled("categories_title","Categories Title");
		$oForm->checkFilled("company_name","Company Name");
		$oForm->checkFilled("occupation","Occupation");
		$oForm->checkFilled("location","Location");
		$oForm->checkFilled("telephone","Telephone");
		$oForm->checkFilled("email","Email");
		$oForm->checkFilled("listing_type","Listing Type");
		$oForm->checkFilled("description","Description");


			
			if ($oForm->valid == true) {
				$oListing->categoriesTitle = $_POST["categories_title"]; //   ->categoriesTitle is also from public function get
				$oListing->companyName = $_POST["company_name"];
				$oListing->occupation = $_POST["occupation"];
				$oListing->location = $_POST["location"];
				$oListing->telephone = $_POST["telephone"];
				$oListing->email = $_POST["email"];
				$oListing->listingType = $_POST["listing_type"];
				$oListing->description = $_POST["description"];

				$oListing->save();

				header("Location:employers_Listings.php");
				exit;
			}

}

$oForm->StartGrouping();
$oForm->MakeInput("categories_title","Categories Title");
$oForm->MakeInput("company_name","Company Name");
$oForm->MakeInput("occupation","Occupation");
$oForm->MakeInput("location","Location");
$oForm->MakeInput("telephone","Telephone");
$oForm->MakeInput("email","Email");
$oForm->MakeInput("listing_type","Listing Type");
$oForm->MakeTextArea("description","Description");
$oForm->EndGrouping();
$oForm->MakeSubmit("submit","submit");
 ?>
 <div id="middlebox">
	<div class="websiteheading"> 
		<h1>Edit My Listing</h1>
	</div>	
</div>	
	
<div id="categoriesregister">
	<div id="registerform">
		<?php  echo $oForm->HTML;?>
	</div>
</div>

<?php  require_once("includes/footer.php");?>

