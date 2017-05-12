<?php 
require_once("connection.php");
require_once("listing.php");
class Members {

	private $iMembersID;
	private $sFirstName;
	private $sLastName;
	private $sCompany;
	private $iTelephone;
	private $sEmail;
	private $sUserName;
	private $iPassword;
	private $iAdmin;
	private $aWatchListings;
	private $aListings;
	private $iActive;


	public function __construct(){

		$this->iMembersID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sCompany = "";
		$this->iTelephone = 0;
		$this->sEmail = "";
		$this->sUserName = "";
		$this->iPassword = 0;
		$this->iAdmin = 0;
		$this->aWatchListings = array();
		$this->aListings = array();
		$this->iActive = 0;


	}//construct

	public function load($iMembersID){

		$connection = new Connection();

		$sQuery = "SELECT MembersID,FirstName,LastName,Company,Telephone,Email,UserName,Password,Admin,Active 
				   FROM tbmembers
				   WHERE MembersID = ".$connection->escape($iMembersID);
	

		$resulset = $connection->query($sQuery);

		$row = $connection->fetch_array($resulset);

		$this->iMembersID = $row["MembersID"];
		$this->sFirstName = $row["FirstName"];
		$this->sLastName = $row["LastName"];
		$this->sCompany = $row["Company"];
		$this->iTelephone = $row["Telephone"];
		$this->sEmail = $row["Email"];
		$this->sUserName = $row["UserName"];
		$this->iPassword = $row["Password"];
		$this->iAdmin = $row["Admin"];
		$this->iActive = $row["Active"];

		$sQuery = "SELECT ListingID, WatchItemID
				   FROM tbwatchitem
				   WHERE Active=1 AND MembersID = ".$connection->escape($iMembersID);

		$resulset = $connection->query($sQuery);
		while($row = $connection->fetch_array($resulset)){
			$iListing = $row["ListingID"];
			$iWatchItemID = $row["WatchItemID"];
			$oListing = new Listing();
			$oListing->load($iListing);
			$this->aWatchListings[$iWatchItemID] = $oListing;
		}

		$sQuery = "SELECT ListingsID
				   FROM tblistings
				   WHERE MembersID = ". $connection->escape($iMembersID);

		// echo $sQuery;

		$resulset = $connection->query($sQuery);
		while($row = $connection->fetch_array($resulset)){
			$iListing = $row["ListingsID"];
			$oListing = new Listing();
			$oListing->load($iListing);
			$this->aListings[] = $oListing;
		}	


		$connection->close_connection();

	}//load


	public function loadByUserName($sUserName){

		$connection = new Connection();
		$sQuery ="SELECT MembersID
				  FROM   tbmembers
				  WHERE  UserName = '".$connection->escape($sUserName)."'";

		$resulset = $connection->query($sQuery);

		$row = $connection->fetch_array($resulset);

		if ($row == false) {
			return false;
			}else{
				$this->load($row["MembersID"]);
				return true;
		}
		
		$connection->close_connection();
	}


	public function save(){

		$connection = new Connection();

			if ($this->iMembersID == 0) {
				//member does not exist do insert
			$sSQL = "INSERT INTO tbmembers (FirstName, LastName, Company, Telephone, Email, UserName, Password) 
					 VALUES ('".$connection->escape($this->sFirstName)."', '".$connection->escape($this->sLastName)."', 
					 		 '".$connection->escape($this->sCompany)."', '".$connection->escape($this->iTelephone)."',
					 		 '".$connection->escape($this->sEmail)."', '".$connection->escape($this->sUserName)."', 
					 		 '".$connection->escape($this->iPassword)."')";
		
		$bSuccess = $connection->query($sSQL);

		if ($bSuccess == true) {
			
			$this->iMembersID = $connection->get_insert_id();
		}else{
			die($sSQL . "fails");
		}
		
		}else{

			$sSQL = "UPDATE tbmembers 
			SET FirstName = '".$connection->escape($this->sFirstName)."', 
			LastName = '".$connection->escape($this->sLastName)."', 
			Company = '".$connection->escape($this->sCompany)."', 
			Telephone = '".$connection->escape($this->iTelephone)."',
			Email = '".$connection->escape($this->sEmail)."',
			Active = '".$connection->escape($this->iActive)."' 
			WHERE MembersID =".$connection->escape($this->iMembersID);

			$bSuccess = $connection->query($sSQL);
			if ($bSuccess == false) {
				die($sSQL . "fails");
			}

		}


	}//save


	public function __get($sKey){

		switch ($sKey){
	 case "membersID":
        return $this->iMembersID;
        break;		
    case "firstName":
        return $this->sFirstName;
        break;
    case "lastName":
        return $this->sLastName;
        break;
    case "company":
        return $this->sCompany;
        break;
    case "telephone":
        return $this->iTelephone;
        break;
    case "email":
        return $this->sEmail;
        break; 
    case "userName":
        return $this->sUserName;
        break; 
    case "password":
        return $this->iPassword;
        break;
    case "admin":
        return $this->iAdmin;
        break;  
    case "watchListings":
        return $this->aWatchListings;
        break; 
    case "listings":
        return $this->aListings;
        break;
    case "active":
        return $this->iActive;
        break;
    default:
    default:
     	die ($sKey . "does not exist");
		
		}//switch


	}//get

	public function __set($sKey,$value){

		switch ($sKey){
    case "firstName":
        return $this->sFirstName = $value;
        break;
    case "lastName":
        return $this->sLastName = $value;
        break;
    case "company":
        return $this->sCompany = $value;
        break;
    case "telephone":
        return  $this->iTelephone = $value;
        break;
    case "email":
        return $this->sEmail = $value;
        break; 
    case "userName":
        return $this->sUserName = $value;
        break; 
    case "password":
        return $this->iPassword = $value;
        break; 
    case "active":
        return $this->iActive = $value;
        break;         
    default:
     	die ($sKey . "does not exist");
		
		}//switch
	}



}//class


//test----------------------------------------------

// $oMembers = new Members();

// $oMembers->load(2);

// echo "<pre>";
// print_r($oMembers);
// echo "</pre>";

// $Members = new Members();
// $Members->firstName = "Miro";
// $Members->lastName  = "Miro";
// $Members->company   = "Bucklands Bucklands";
// $Members->telephone = 02122222;
// $Members->email = "miro@gmail.com";
// $Members->userName = "miromiro13";
// $Members->password = 2;

// $Members->save();

// echo "<pre>";
// print_r($Members);
// echo "</pre>";

 ?>