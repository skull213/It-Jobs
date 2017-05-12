<?php  
require_once("connection.php");

class Listing{

	private $iListingsID;
	private $sCategoriesTitle;
	private $sCompanyName;
	private $sOccupation;
	private $sLocation;
	private $iTelephone;
	private $sEmail;
	private $sListingType;
	private $sDescription;
	private $iCategoriesID;
	private $iMemberID;
	private $sPhoto;
	private $iActive;


public function __construct(){

	$this->iListingsID = 0;
	$this->sCategoriesTitle = "";
	$this->sCompanyName = "";
	$this->sOccupation = "";
	$this->sLocation = "";
	$this->iTelephone = 0;
	$this->sEmail = "";
	$this->sListingType = "";
	$this->sDescription = "";
	$this->iCategoriesID = 0;
	$this->iMemberID = 0;
	$this->sPhoto = "";
	$this->iActive = 0;

}

public function load ($iListingsID){

	$connection = new Connection();
	$sQuery = "SELECT ListingsID, CategoriesTitle, CompanyName, Occupation, Location, Telephone, Email, ListingType, Description, CategoriesID, MembersID, Photo,Active
			   FROM tblistings
			   WHERE ListingsID = ".$connection->escape($iListingsID);


	$resultset = $connection->query($sQuery);

	$row = $connection->fetch_array($resultset);

	$this->iListingsID = $row["ListingsID"];
	$this->sCategoriesTitle = $row["CategoriesTitle"];  // its getting all the info from querry
	$this->sCompanyName = $row["CompanyName"];
	$this->sOccupation = $row["Occupation"];
	$this->sLocation = $row["Location"];
	$this->iTelephone = $row["Telephone"];
	$this->sEmail = $row["Email"];
	$this->sListingType = $row["ListingType"];
	$this->sDescription = $row["Description"];
	$this->iCategoriesID = $row["CategoriesID"];
	$this->iMemberID = $row["MembersID"];
	$this->sPhoto = $row["Photo"];
	$this->iActive = $row["Active"];

	$connection->close_connection();

}//load

public function save(){

	$connection = new Connection();

	if ($this->iListingsID == 0) {

		$sSQL="INSERT INTO tblistings (CategoriesTitle, CompanyName, Occupation, Location,Telephone, Email, ListingType, Description, CategoriesID, MembersID, Photo) 
									   
			   VALUES ('".$connection->escape($this->sCategoriesTitle)."', '".$connection->escape($this->sCompanyName)."', '".$connection->escape($this->sOccupation)."', '".$connection->escape($this->sLocation)."',
			   		   '".$connection->escape($this->iTelephone)."', '".$connection->escape($this->sEmail)."', '".$connection->escape($this->sListingType)."', '".$connection->escape($this->sDescription)."', '".$connection->escape($this->iCategoriesID)."', '".$connection->escape($this->iMemberID)."',
			   		   '".$connection->escape($this->sPhoto)."')";

			$bSuccess = $connection->query($sSQL);

		if ($bSuccess == true) { // the if statement is to check the query is error free
			
			$this->iListingsID = $connection->get_insert_id();
		
		}else{
			die($sSQL . "fails");
		}

		}else{
				$sSQL = "UPDATE tblistings 
				SET CategoriesTitle = '".$connection->escape($this->sCategoriesTitle)."',
				CompanyName = '".$connection->escape($this->sCompanyName)."', 
				Occupation = '".$connection->escape($this->sOccupation)."', 
				Location = '".$connection->escape($this->sLocation)."',
				Telephone = '".$connection->escape($this->iTelephone)."', 
				Email = '".$connection->escape($this->sEmail)."', 
				ListingType = '".$connection->escape($this->sListingType)."', 
				Description = '".$connection->escape($this->sDescription)."', 
				Photo = '".$connection->escape($this->sPhoto)."',
				Active = '".$connection->escape($this->iActive)."'
				WHERE ListingsID = ".$connection->escape($this->iListingsID);

			$bSuccess = $connection->query($sSQL);
			
			if ($bSuccess == false) {
				die($sSQL . "fails");
			}
		
		}

			$connection->close_connection();
	}//save


public function __get($sKey){

	switch ($sKey) {
	    case "listingsID":
	        return $this->iListingsID;
	        break;
	    case "categoriesTitle":
	        return $this->sCategoriesTitle;
	        break;
	    case "companyName":
	        return $this->sCompanyName;
	        break;
	    case "occupation":
	        return $this->sOccupation;
	        break;
	    case "location":
	        return $this->sLocation;
	        break;
	    case "telephone":
	        return $this->iTelephone;
	        break;
	    case "email":
	        return $this->sEmail;
	        break; 
	    case "listingType":
	        return $this->sListingType;
	        break;
	    case "description":
	        return $this->sDescription;
	        break;
	    case "categoriesID":
	        return $this->iCategoriesID;
	        break;
	    case "memberID":
	        return $this->iMemberID;
	        break;
	    case "photo":
	        return $this->sPhoto;
	        break;
	    case "active":
	        return $this->iActive;
	        break;                                                       
	    default:
	     	die ($sKey . "does not exist");
	}//switch
}//get


public function __set($sKey,$value){
	  switch ($sKey) {
	  	case "listingsID":
	        return $this->iListingsID = $value;
	        break;
	    case "categoriesTitle":
	        return $this->sCategoriesTitle = $value;
	        break;
	    case "companyName":
	        return $this->sCompanyName = $value;
	        break;
	    case "occupation":
	        return $this->sOccupation = $value;
	        break;
	    case "location":
	        return $this->sLocation = $value;
	        break;
	    case "telephone":
	        return $this->iTelephone = $value;
	        break;
	    case "email":
	        return $this->sEmail = $value;
	        break; 
	    case "listingType":
	        return $this->sListingType = $value;
	        break;
	    case "description":
	        return $this->sDescription = $value;
	        break;
	    case "categoriesID":
	        return $this->iCategoriesID = $value;
	        break;
	    case "memberID":
	        return $this->iMemberID = $value;
	        break;
	    case "photo":
	        return $this->sPhoto = $value;
	        break;
	    case "active":
	        return $this->iActive = $value;
	        break;                                                       
	    default:
	     	die ($sKey . "does not exist");
	}//switch
}//set







}//class


//test------------------------------------------------------

// $oListings = new Listing();
// $oListings->load(30);

// echo "<pre>";
// print_r($oListings);
// echo "</pre>";



// $oListings1 = new Listing();


// $oListings1->categoriesTitle = "rfre";
// $oListings1->companyName = "tgrttr";
// $oListings1->occupation = "rtgrt";
// $oListings1->location = "orth";
// $oListings1->telephone = 23333333;
// $oListings1->email = "ytnty";
// $oListings1->listingType = "part";
// $oListings1->description = "hergielrgherighierhgirtgh";
// $oListings1->categoriesID = 2;
// $oListings1->memberID = 2;
// $oListings1->photo ="";

// $oListings1->save();


// echo "<pre>";
// print_r($oListings1);
// echo "</pre>";


?>