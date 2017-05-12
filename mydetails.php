<?php 
session_start();

if (isset($_SESSION["MembersID"]) == false) {
	header("Location:register.php");
}

require_once("includes/header.php");
require_once("includes/members.php");
require_once("includes/view.php");

$oMember = new Members();
$oMember->load($_SESSION["MembersID"]);

?>

<div id="categoriesregister">
	<div id="middlebox">
	<div class="websiteheading"> 
		<h1>My Details</h1>
	</div>	
</div>
	<div id="registerform">
		<?php echo View::RenderMember($oMember); ?>
		
  	</div>
</div>

<?php require_once("includes/footer.php") ?>