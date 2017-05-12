<?php 
session_start();

session_unset($_SESSION["MembersID"]);

header("Location:index.php");

 ?>