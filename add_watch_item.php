<?php
session_start();
require_once("includes/watch_item.php");
require_once("includes/view.php");
require_once("includes/listing.php");

if ($_SESSION["MembersID"] == false) {
	header("location:register.php");
}

$oWatchItem = new WatchItem();
$oWatchItem->listingsID = $_GET["ListingsID"];
$oWatchItem->membersID = $_SESSION["MembersID"];
$oWatchItem->active = 1;

$oWatchItem->save();
// print_r($oWatchItem);

header("Location:watchlist.php");








// start session_
// require_once

// $oWatchItem = new WatchItem();
// $oWatchItem->listingID = $_GET[];
// $oWatchItem->userID

// $oWatchItem->save()
// redirect
?>