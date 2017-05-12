<?php 
require_once("connection.php");
require_once("listing.php");


class Categories {

	private $iCategoriesID;
	private $sCategoriesTitle;
	private $sClass;
	private $aListings;



	public function __construct(){

		$this->iCategoriesID = 0;
		$this->sCategoriesTitle = "";
		$this->aListings = array();

	}

	public function load($iCategoriesID){

		$connection = new Connection();
		$sQuery = "SELECT CategoriesID, CategoriesTitle, Class
				   FROM tbcategories 
				   WHERE CategoriesID =" .$connection->escape($iCategoriesID);


		$resultset = $connection->query($sQuery);

		$row = $connection->fetch_array($resultset);

		$this->iCategoriesID = $row ["CategoriesID"];
		$this->sCategoriesTitle = $row ["CategoriesTitle"];
		$this->sClass = $row ["Class"];
	

		$sSQL = "SELECT ListingsID FROM tblistings WHERE CategoriesID = ".$connection->escape($iCategoriesID);
		$resultset = $connection->query($sSQL);

		while ($row = $connection->fetch_array($resultset)){
			$iListingsID = $row["ListingsID"];
			$oListings = new Listing();
			$oListings->load($iListingsID);
			$this->aListings[] = $oListings;
		}

		$connection->close_connection();


	}//load


	public function __get($sKey){

			switch ($sKey) {
    case "categoriesID":
        return $this->iCategoriesID;
        break;
    case "categoriesTitle":
        return $this->sCategoriesTitle;
        break;
    case "class":
        return $this->sClass;
        break;
    case "listings":
        return $this->aListings;
        break;                                    
    default:
     	die ($sKey . "does not exist");
		
		}//switch
	}
}//class




//test--------------------------------------------

// $oCategorie = new Categories();
// $oCategorie->load(3);

// echo "<pre>";
// print_r($oCategorie);
// echo "</pre>";




























 ?>