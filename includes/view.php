<?php 
class View{

	static public function renderNav($aCategories){
		$sOutput = "<ul>";
		for ($iCount=0; $iCount<count($aCategories); $iCount++) { 
			
			$oCategory = $aCategories[$iCount];
			$sOutput .= '<li class="hvr-overline-from-center"><a href="listings.php?CategoriesID='.htmlentities($oCategory->categoriesID).'">'.htmlentities($oCategory->categoriesTitle).'<i class="'.htmlentities($oCategory->class).'"></i></a></li>';
		
		}

		$sOutput .= "</ul>";
			
			return $sOutput;

	}//rendernav
	
	static public function renderNavTwo($aCategories){

		$sOutput = "<ul>";

		for ($iCount=0; $iCount<count($aCategories); $iCount++) { 
			
			$oCategory = $aCategories[$iCount];
			$sOutput .= '<li><a class="hvr-overline-from-center " href="listings.php?CategoriesID='.htmlentities($oCategory->categoriesID).'">'.htmlentities($oCategory->categoriesTitle).'</a></li>';
			
			
		}
		
		$sOutput .= "</ul>";
			
			return $sOutput;

	}


	static public function renderCategories($oCategory){

			$aListings = $oCategory->listings;
			$sOutput  =  "";
		for ($iCount=0; $iCount<count($aListings); $iCount++) { 
			$oListings = $aListings[$iCount];
		
			if ($oListings->active == 0) {

			$sOutput .= '<div id="listingsbox">';
			$sOutput .= '<div id="listingdescroption">';
			$sOutput .= '<a href="full_listing_details.php?ListingsID='.htmlentities($oListings->listingsID).'"><h1>'.htmlentities($oListings->categoriesTitle).'</h1></a><br>';
			$sOutput .=	'<p> Location:&nbsp;'.htmlentities($oListings->location).'</p><br>';
			$sOutput .= '<p> Type:&nbsp;'.htmlentities($oListings->listingType).'</p><br>';
			$sOutput .= '<p> telephone:&nbsp;'.htmlentities($oListings->telephone).'</p>';
			$sOutput .= '<ul class="save"><li><a href="add_watch_item.php?ListingsID='.htmlentities($oListings->listingsID).'"><i class="fa fa-plus-circle"></i>&nbsp; watchlist</a></li></ul>';
			$sOutput .= '</div>';
			$sOutput .= '<div id="listingspic">';
			$sOutput .= '<img src="./img/'.htmlentities($oListings->photo).'">';
			$sOutput .= '</div>';
			$sOutput .= '</div>';
		
		}
		
		}

		return $sOutput;

	}

		static public function renderHeading($oCategory){
		$sOutput = "";
		$sOutput .= '<div id="middlebox" >';
		$sOutput .= '<div class="websiteheading">';
		$sOutput .= '<h1>'.$oCategory->categoriesTitle.'</h1>';
		$sOutput .= '</div>';
		$sOutput .= '</div>';
		$aListings = $oCategory->listings;

		return $sOutput;
	}



	static public function renderWatchList($aListings){

		$sOutput = "";
		// $sOutput = '<a href="full_listing_details.php"><h1>'.$oCategoris->categoriesTitle.'</h1></a><br>';
	

		//for ($iCount=0; $iCount<count($aListings); $iCount++) { 
		foreach($aListings as $iWatchItemID=>$oListings){
		
		
			if ($oListings->active == 0) {

			$sOutput .= '<div id="listingsbox">';
			$sOutput .= '<div id="listingdescroption">';
			$sOutput .= '<a href="full_listing_details.php?ListingsID='.htmlentities($oListings->listingsID).'"><h1>'.htmlentities($oListings->categoriesTitle).'</h1></a><br>';
			$sOutput .= '<p>'.htmlentities($oListings->categoriesTitle).'</p><br>';
			$sOutput .=	'<p> Location:&nbsp;'.htmlentities($oListings->location).'</p><br>';
			$sOutput .= '<p>'.htmlentities($oListings->listingType).'</p>';
			$sOutput .= '<ul class="applay"><li><a href="watchlist_remove.php?WatchItemID='.htmlentities($iWatchItemID).'"><i class="fa fa-times"></i> remove</a></li></ul>';
			$sOutput .= '</div>';
			$sOutput .= '<div id="listingspic">';
			$sOutput .= '<img src="./img/'.htmlentities($oListings->photo).'">';
			$sOutput .= '</div>';
			$sOutput .= '</div>';
		
		}
		
		}



		return $sOutput;

	}//renderwatchlist

	static public function renderMyJobs($oMember){

		$sOutput = "";
		// $sOutput = '<a href="full_listing_details.php"><h1>'.$oCategoris->categoriesTitle.'</h1></a><br>';
	
			$aListings = $oMember->listings;
		for ($iCount=0; $iCount<count($aListings); $iCount++) { 
			$oListings = $aListings[$iCount];
			
			if ($oListings->active == 0) {  //the loop for the active to remove from watchlist,myjobs, admin page

			$sOutput .= '<div id="listingsbox">';
			$sOutput .= '<div id="listingdescroption">';
			$sOutput .= '<a href="full_listing_details.php?ListingsID='.htmlentities($oListings->listingsID).'"><h1>'.htmlentities($oListings->categoriesTitle).'</h1></a><br>';
			$sOutput .= '<p>'.htmlentities($oListings->categoriesTitle).'</p><br>';
			$sOutput .=	'<p> Location:&nbsp;'.htmlentities($oListings->location).'</p><br>';
			$sOutput .= '<p>'.htmlentities($oListings->listingType).'</p>';
			$sOutput .= '<ul class="applay"><li><a href="my_jobs_remove.php?ListingsID='.htmlentities($oListings->listingsID).'"><i class="fa fa-times"></i> remove</a></li></ul>';
			$sOutput .= '<ul class="save"><li><a href="edit_listing.php?ListingsID='.htmlentities($oListings->listingsID).'"><i class="fa fa-pencil"></i> edit</a></li></ul>';
			$sOutput .= '</div>';
			$sOutput .= '<div id="listingspic">';
			$sOutput .= '<img src="./img/'.htmlentities($oListings->photo).'">';
			$sOutput .= '</div>';
			$sOutput .= '</div>';
		
		}
		
		}

			
		return $sOutput;
	}//rendermyjob

	static public function renderAdminListings($aAllListings){

		$sOutput = "";
		// $sOutput = '<a href="full_listing_details.php"><h1>'.$oCategoris->categoriesTitle.'</h1></a><br>';
	
			
		for ($iCount=0; $iCount<count($aAllListings); $iCount++) { 
			
			$oListings = $aAllListings[$iCount];
			
			if ($oListings->active == 0) {

			$sOutput .= '<div id="listingsbox">';
			$sOutput .= '<div id="listingdescroption">';
			$sOutput .= '<a href="full_listing_details.php?ListingsID='.htmlentities($oListings->listingsID).'"><h1>'.htmlentities($oListings->categoriesTitle).'</h1></a><br>';
			$sOutput .= '<p>'.htmlentities($oListings->categoriesTitle).'</p><br>';
			$sOutput .=	'<p> Location:&nbsp;'.htmlentities($oListings->location).'</p><br>';
			$sOutput .= '<p>'.htmlentities($oListings->listingType).'</p>';
			$sOutput .= '<ul class="applay"><li><a href="admin_listings_remove.php?ListingsID='.htmlentities($oListings->listingsID).'">remove</a></li></ul>';
			$sOutput .= '</div>';
			$sOutput .= '<div id="listingspic">';
			$sOutput .= '<img src="./img/'.htmlentities($oListings->photo).'">';
			$sOutput .= '</div>';
			$sOutput .= '</div>';
		
		}
		
		}

		return $sOutput;

	}//renderAdminListings


	static public function renderAdminMembers($aAllMembers){
		$sOutput = "";
		for ($iCount=0; $iCount<count($aAllMembers); $iCount++) { 
		
		$oMember = $aAllMembers[$iCount];
			
		if ($oMember->active == 0) {
			# code...
		

		$sOutput .= '<div class= "adminmembers">';	
		$sOutput .= 'firstName:'.htmlentities($oMember->firstName).'<br></br>';
		$sOutput .= 'lastName:' .htmlentities($oMember->lastName).'<br></br>';
		$sOutput .= 'company:'  .htmlentities($oMember->company).'<br></br>';
		$sOutput .= 'telephone:'.htmlentities($oMember->telephone).'<br></br>';
		$sOutput .= '<ul class="applay"><li><a href="admin_members_remove.php?MembersID='.htmlentities($oMember->membersID).'">remove</a></li></ul>';
		$sOutput .= '</div>	';
		
		}
		
		}
			return $sOutput;
		}	


	static public function RenderFullListing($oListings){

			$sOutput = "";

		 // 	$sOutput .= '<div id="listingsbox">';
			// $sOutput .= '<div id="listingdescroption">';
			//$sOutput .= '<div class="fulllisting">';
			//$sOutput .= '<div class="fulllistingphoto">';
			//$sOutput .= '<img src="./img/'.$oListings->photo.'">';
			//$sOutput .= '</div>'; 
			
			$sOutput .= '<div class="text">';
			$sOutput .= '<h1>'.htmlentities($oListings->categoriesTitle).'</h1>';
			$sOutput .= '<h3>Company:'.htmlentities($oListings->companyName).'<br><br></h3>';
			$sOutput .=	'<h3>Type:'.htmlentities($oListings->listingType).'<br><br></h3>';
			$sOutput .=	'<h3>Location:'.htmlentities($oListings->location).'<br><br></h3>';
			$sOutput .=	'<h3>Telephone:'.htmlentities($oListings->telephone).'<br><br></h3>';
			$sOutput .=	'<h3>Email:'.htmlentities($oListings->email).'<br><br></h3>';
			$sOutput .= '<p>'.htmlentities($oListings->description).'</p>';
			$sOutput .= '<ul class="save"><li><a href="apply.php?ListingsID='.htmlentities($oListings->listingsID).'"><i class="fa fa-paper-plane"></i> applay</a></li></ul>';
			$sOutput .= '</div>';
			//$sOutput .=	'</div>';
			// $sOutput .= '<div id="fulldescription">';
			// $sOutput .= '<h1>"'.$oListings->categoriesTitle.'"</h1><br><br>';
			// $sOutput .= '<h3>"'.$oListings->companyName.'"</h3>';
			// $sOutput .= '<h3>"'.$oListings->location.'"</h3>';
			// $sOutput .= '<h3>"'.$oListings->telephone.'"</h3>';
			// $sOutput .= '<p>"'.$oListings->description.'"</p>';
			// $sOutput .= '<ul class="applay"><li><a href="apply.php?ListingsID='.$oListings->listingsID.'">applay</a></li></ul>';
			// $sOutput .= '</div>';
			
			// $sOutput .= '</div>';
			// $sOutput .= '</div>';
		 

		 return $sOutput;

	}//RenderFullListing


	static public function RenderMember($oMember){
		

		$sOutput = "";
		$sOutput .= '<div class="mydetails">';
		$sOutput .= '<p>First Name:'.htmlentities($oMember->firstName).'</p><br></br>';
		$sOutput .= '<p>Last Name:' .htmlentities($oMember->lastName).'</p><br></br>';
		$sOutput .= '<p>Company:'  .htmlentities($oMember->company).'</p><br></br>';
		$sOutput .= '<p>Telephone:'.htmlentities($oMember->telephone).'</p><br></br>';
		$sOutput .= '<p>Email:'    .htmlentities($oMember->email).'</p><br></br>';
		$sOutput .= '<p>User Name:' .htmlentities($oMember->userName).'</p><br></br>';
		$sOutput .= '<ul class="savedetails"><li><a href="edit_my_details.php"><i class="fa fa-pencil"></i> edit</a></li></ul>';
		//$sOutput .=	'<li><a class="save"" href="edit_my_details.php">edit</a></li>';
		$sOutput .= '</div>';
				
		return $sOutput;

	}


}//class


 ?>