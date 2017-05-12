<?php 
session_start();
require_once("includes/members.php");
require_once("includes/view.php");

$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

$oListing = new Listing();
$oListing->load($_GET["ListingsID"]);

$oListing->active = 1;

$oListing->save();

header("Location:employers_Listings.php");
exit;
