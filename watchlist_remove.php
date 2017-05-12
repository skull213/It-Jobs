<?php 
session_start();
require_once("includes/watch_item.php");
require_once("includes/view.php");
require_once("includes/members.php");


$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

$oWatchList = new WatchItem();
$oWatchList->load($_GET["WatchItemID"]);

$oWatchList->active = 0;

$oWatchList->save();
print_r($oWatchList);

header("Location:watchlist.php");
exit;
 ?>