<?php 
require_once("connection.php");
require_once("categories.php");

class CategoriesManager{


	static public function getAllCategories(){
		$aCategories = array();

		$connection = new Connection();
		$sSQL = "SELECT CategoriesID FROM tbcategories";
		$resultset = $connection->query($sSQL);

		while($row = $connection->fetch_array($resultset)){

			$iCategoriesID = $row["CategoriesID"];
			$oCategories = new Categories();
			$oCategories->load($iCategoriesID);
			$aCategories[] = $oCategories;

		}

		$connection->close_connection();
		return $aCategories;

	}//getallcategories


	static public function getAllMembers(){
		$aAllMembers = array();

		$connection = new Connection();
		$sSQL = "SELECT MembersID FROM tbmembers";
		$resultset = $connection->query($sSQL);

		while ($row = $connection->fetch_array($resultset)) {
			$iMembersID = $row["MembersID"];
			$oAllMembers = new Members();
			$oAllMembers->load($iMembersID);
			$aAllMembers[] = $oAllMembers;
		}
			
		$connection->close_connection();
		return $aAllMembers;
	}

	static public function getAllListings(){
		$aAllListings = array();

		$connection = new Connection();
		$sSQL = "SELECT ListingsID FROM tblistings";
		$resultset = $connection->query($sSQL);

		while ($row = $connection->fetch_array($resultset)) {
			$iListingsID = $row["ListingsID"];
			$oAllListings = new Listing();
			$oAllListings->load($iListingsID);
			$aAllListings[] = $oAllListings;
		}
			
		$connection->close_connection();
		return $aAllListings;
	}

	static public function listCategories(){

		$aCategories = array();
		$connection = new Connection();
		$sSQL = "SELECT CategoriesID, CategoriesTitle FROM tbcategories";
		$resultSet = $connection->query($sSQL);

		while($row = $connection->fetch_array($resultSet)){
				$iCategoriesID = $row["CategoriesID"];
				$aCategories[$iCategoriesID] = $row["CategoriesTitle"];
		}

		$connection->close_connection();
		return $aCategories;

	
	}


}//class

?>