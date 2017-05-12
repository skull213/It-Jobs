<?php 
require_once("connection.php");

class WatchItem {

	private $iMembersID;
	private $iWatchItemID;
	private $iListingsID;
	private $iActive;


	public function __construct(){

	$this->iMembersID = 0;
	$this->iWatchItemID = 0;
	$this->iListingsID = 0;
	$this->iActive = 0;
}


	public function Load($iWatchItemID){

		$connection = new Connection();

		$sQuery = "SELECT MembersID, ListingID, WatchItemID,Active
				   FROM tbwatchitem
		           WHERE WatchItemID = ".$connection->escape($iWatchItemID);


		$resultset = $connection->query($sQuery);

		$row = $connection->fetch_array($resultset);

		$this->iMembersID = $row["MembersID"];
		$this->iListingsID = $row["ListingID"];
		$this->iWatchItemID = $row["WatchItemID"];
		$this->iActive = $row["Active"];
		

		$connection->close_connection();

	}//load


	public function save(){

		$connection = new Connection();

		if ($this->iWatchItemID == 0) {

		$sSQL = "INSERT INTO tbwatchitem (MembersID, ListingID, WatchItemID)
				 VALUES ('".$connection->escape($this->iMembersID)."', '".$connection->escape($this->iListingsID)."','".$connection->escape($this->iWatchItemID)."')";

		$bSuccess = $connection->query($sSQL);

		if ($bSuccess == true) {
			
			$this->iWatchItemID = $connection->get_insert_id();
		}else{
			
			die($sSQL . "fails");
		}
		
		}else{
				$sSQL = "UPDATE tbwatchitem 
				SET Active = '".$this->iActive."' 
				WHERE WatchItemID = ".$connection->escape($this->iWatchItemID);

				$bSuccess = $connection->query($sSQL);	
		
				if ($bSuccess == false) {
				die($sSQL . "fails");
			}

		}

			$connection->close_connection();

	}//save


	public function __get($sKey){

		switch ($sKey){
	 case "membersID":
        return $this->iMembersID;
        break;		
    case "listingsID":
        return $this->iListingsID;
        break;
    case "watchItemID":
        return $this->iWatchItemID; 
     case "active":
	        return $this->iActive;
	        break;         
    default:
     	die ($sKey . "does not exist");
		
		}//switch


	}//get


	public function __set($sKey,$value){

		switch ($sKey){
	 case "membersID":
        return $this->iMembersID = $value;
        break;		
    case "listingsID":
        return $this->iListingsID = $value;
        break;
    case "watchItemID":
        return $this->iWatchItemID = $value;
    case "active":
	        return $this->iActive = $value;
	        break;          
    default:
     	die ($sKey . "does not exist");
		
		}//switch


	}//set


}//class


//test===================================================


// $oWatch = new WtachItem();

// $oWatch->membersID = 4;
// $oWatch->listingID = 10;

// $oWatch->save();

// echo "<pre>";
// print_r($oWatch);
// echo "</pre>";


 ?>