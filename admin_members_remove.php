<?php 
session_start();
require_once("includes/members.php");
require_once("includes/view.php");

$oTestMember = new Members();
$oTestMember->load($_SESSION["MembersID"]);

if ($oTestMember->admin != 1) {
	header("Location:register.php");
}

$oMember = new Members();
$oMember->load($_GET["MembersID"]);

$oMember->active = 1;

$oMember->save();

header("Location:admin_members.php");
exit;

 ?>