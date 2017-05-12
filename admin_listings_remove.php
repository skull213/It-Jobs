<?php 
session_start();
require_once("includes/members.php");
require_once("includes/view.php");

$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

if ($oTestMember->admin != 1) {
	header("Location:register.php");
}

$oListing = new Listing();
$oListing->load($_GET["ListingsID"]);

$oListing->active = 1;

$oListing->save();

header("Location:admin_listings.php");
exit;















 ?>