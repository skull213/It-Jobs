<?php 
session_start();
require_once("includes/header.php");
require_once("includes/listing.php");
require_once("includes/form.php");
require_once("includes/members.php");
require_once("includes/categories_manager.php");


if (isset($_SESSION["MembersID"]) == false) {
    header("Location:register.php");
    exit;
}

$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

$oForm = new Form("Add New Job");

if (isset($_POST["submit"])) {
    
    $oForm->data = $_POST;
    $oForm->files = $_FILES;

    $oForm->checkFilled("categories_ID");
    // $oForm->checkFilled("categories_title");
    $oForm->checkFilled("company_name");
    $oForm->checkFilled("occupation");
    $oForm->checkFilled("location");
    $oForm->checkFilled("telephone");
    $oForm->checkFilled("email");
    $oForm->checkFilled("listing_type");
    $oForm->checkFileUploaded("photo");
    $oForm->checkFilled("description");


    if ($oForm->valid == true) {
        
        $oListing = new Listing();

        $date = new DateTime();

        $sImageName = "image" .date_timestamp_get($date).".jpg";
        $oForm->moveFile("photo", $sImageName);

        $oListing->categoriesID = $_POST["categories_ID"];
        // $oListing->categoriesTitle = $_POST["categories_title"];
        $oListing->companyName = $_POST["company_name"];
        $oListing->occupation = $_POST["occupation"];
        $oListing->location = $_POST["location"];
        $oListing->telephone = $_POST["telephone"];
        $oListing->email = $_POST["email"];
        $oListing->listingType = $_POST["listing_type"];
        $oListing->photo = $sImageName;
        $oListing->description = $_POST["description"];
        $oListing->memberID = $_SESSION["MembersID"];  //get member id from session the person who has loged in at the moment



        $oListing->save();

        header ("Location:employers_Listings.php");

    }

}

$oForm->StartGrouping();
$aCategoryList = CategoriesManager::listCategories();
$oForm->makeOption("categories_ID","Categories",$aCategoryList);
// $oForm->MakeInput("categories_title","Categories Title");
$oForm->MakeInput("company_name","Company Name");
$oForm->MakeInput("occupation","Occupation");
$oForm->MakeInput("location","Location");
$oForm->MakeInput("telephone","Telephone");
$oForm->MakeInput("email","Email");
$oForm->MakeInput("listing_type","Listing Type");
$oForm->makeFileInput("photo","Photo");
$oForm->MakeTextArea("description","Description");
$oForm->MakeSubmit("submit","submit");
$oForm->EndGrouping();

?>




<div id="middlebox">
    <div class="websiteheading"> 
        <h1>Post New Job</h1>
    </div>  
</div>
    
<div id="categoriesregister">
    <div id="registerform">
        <?php echo $oForm->HTML; ?>
    </div> 
</div>

<?php require_once("includes/footer.php") ?>