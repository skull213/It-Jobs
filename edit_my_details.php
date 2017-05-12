<?php
session_start(); 
require_once("includes/form.php");
require_once("includes/header.php");
require_once("includes/members.php");


$oMember = new Members();
$oMember->load($_SESSION["MembersID"]);



$aExistingData = array();
$aExistingData["first_name"] = $oMember->firstName; // ->firstname form --public function get--
$aExistingData["last_name"] = $oMember->lastName;
$aExistingData["company"] = $oMember->company;
$aExistingData["telephone"] = $oMember->telephone;
$aExistingData["email"] = $oMember->email;


$oForm = new Form("Update");
$oForm->data = $aExistingData;

if (isset($_POST["submit"])) {
	$oForm->data = $_POST;

		$oForm->checkFilled("first_name","First Name");
		$oForm->checkFilled("last_name","Last Name");
		$oForm->checkFilled("company","Company");
		$oForm->checkFilled("telephone","Telephone");
		$oForm->checkFilled("email","Email");
			
			if ($oForm->valid == true) {
				$oMember->firstName = $_POST["first_name"]; //   ->firstname is also from public function get
				$oMember->lastName = $_POST["last_name"];
				$oMember->telephone = $_POST["telephone"];
				$oMember->company = $_POST["company"];
				$oMember->email = $_POST["email"];

				$oMember->save();

				header("Location:mydetails.php");
				exit;
			}

}

$oForm->StartGrouping();
$oForm->MakeInput("first_name","First Name");
$oForm->MakeInput("last_name","Last Name");
$oForm->MakeInput("company","Company");
$oForm->MakeInput("telephone","Telephone");
$oForm->MakeInput("email","Email");
$oForm->EndGrouping();
$oForm->MakeSubmit("submit","submit");
 ?>
<div id="middlebox">
	<div class="websiteheading"> 
		<h1>Edit My Details</h1>
	</div>	
</div>	
<div id="categoriesregister">
	<div id="registerform">
		<?php  echo $oForm->HTML;?>
	</div>
</div>

<?php  require_once("includes/footer.php");?>

