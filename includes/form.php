<?php 
class Form{

	private $sHTML;
	private $aData;
	private $aErrors;
	private $aFiles;


	public function __construct($sLegend=""){
		$this->sHTML = '<form class="pure-form pure-form-stacked" method="post" action="" enctype="multipart/form-data"><fieldset><legend>'.$sLegend.'</legend>'."\n";
		$this->aData = array();
		$this->aErrors = array();
		$this->aFiles = array();

	}

	
	public function makeOption($sControlName,$sControlLabel,$aOptions){
		$this->sHTML .= '<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
		$this->sHTML .= '<select name="'.$sControlName.'">';

		foreach($aOptions as $key=>$value) {

			$sData = "";
			if (isset($this->aData[$sControlName])) {
				$sData = $this->aData[$sControlName];
			}
			 
			if($key == $sData){
				$this->sHTML .= '<option selected value="'.$key.'">'.$value.'</option>';
			}else{
				$this->sHTML .= '<option value="'.$key.'">'.$value.'</option>';
			}
		}

		$this->sHTML .=	'</select>';
	}

	public function MakeInput($sControlName,$sControlLabel){

		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$sData = "";

		if (isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}


		$this->sHTML .=	'<div class="pure-u-1 pure-u-md-1-3">';
		$this->sHTML .=	'<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
        $this->sHTML .= '<input  class="pure-u-23-24" type="text" name="'.$sControlName.'" value="'.$sData.'">'."\n";
        $this->sHTML .= '<span class="errors">'.$sErrors.'</span>'."\n";
        $this->sHTML .=	'</div>';
	}

	


	public function makeFileInput($sControlName, $sControlLabel){
		
		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {		
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sControlLabel.'</label>';
		$this->sHTML .=	'<input type="file" class="field" id="'.$sControlName.'" name="'.$sControlName.'" />'."\n";
		$this->sHTML .= '<span class="errors">' . $sErrors. '</span>' ."\n";		
	}

	


	public function moveFile($sControlName,$sNewName){

		$sNewPath = dirname(__FILE__). '/../img/' .$sNewName;
		move_uploaded_file($this->aFiles[$sControlName]['tmp_name'], $sNewPath);

	}//move file function


	public function checkFileUploaded($sControlName){

		if (isset($this->aFiles[$sControlName]) == false) {
			$this->aErrors[$sControlName] = "file not uploaded";
		}else{
			if ($this->aFiles[$sControlName]["error"] != 0) {
				$this->aErrors[$sControlName] = "file has errors";
			}
		}
	}

	

	public function MakeTextArea($sControlName,$sControlLabel){

		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$sData = "";

		if (isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}
		
		
		$this->sHTML .= '<textarea rows="15" cols="105" value="'.$sData.'" name="'.$sControlName.'">'.$sData.'</textarea>';
		$this->sHTML .= '<span class="errors">'.$sErrors.'</span>'."\n";
	}

	public function MakePassword($sControlName,$sControlLabel){

		$sData = "";

		if (isset($this->aData[$sControlName])) {
			$sData = $this->aData[$sControlName];
		}

		$sErrors = "";

		if (isset($this->aErrors[$sControlName])) {
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .=	'<div class="pure-u-1 pure-u-md-1-3">'."\n";
		$this->sHTML .=	'<label for="'.$sControlName.'">'.$sControlLabel.'</label>'."\n";
        $this->sHTML .= '<input class="pure-u-23-24" value="'.$sData.'" type="password" name="'.$sControlName.'">'."\n";
        $this->sHTML .= '<span class="errors">'.$sErrors.'</span>'."\n";
        $this->sHTML .=	'</div>';

	}

	public function checkSame($sControlName1,$sControlName2){
		$sData1 = $this->aData[$sControlName1];
		$sData2 = $this->aData[$sControlName2];
		
		if ($sData1 !== $sData2) {
			$this->aErrors[$sControlName2] = "* password does not match";
		}
	}

	public function raiseCustomError($sControlName,$sErrors){

		$this->aErrors[$sControlName] = $sErrors;
	}

	
	public function StartGrouping(){
		$this->sHTML .=	'<div class="pure-g">';
	}

	
	public function EndGrouping(){
		$this->sHTML .=	'</div>';
	}


	public function MakeSubmit($sControlName,$sControlLabel){
		$this->sHTML .=	'<div class="pure-u-1 pure-u-md-1-3">'."\n";
		$this->sHTML .= '<input type="submit" class="submit"  name="'.$sControlName.'" value="'.$sControlLabel.'"/>';
		$this->sHTML .=	'</div>';

	}

	public function checkFilled($sControlName){

		$sData = $this->aData[$sControlName];
		if (strlen($sData) == 0) {
			$this->aErrors[$sControlName] = "* Must be filled in";
		}

	}

	public function __get($sKey){
		switch ($sKey) {
			case 'HTML':
				return $this->sHTML .'</fieldset></form>'; 
				break;
			case 'valid':
				if (count($this->aErrors) ==0) {
					return true;
				}else{
					return false;
				} 
				break;	
			default:
				die($sKey . "does not exist");
				break;
		}//switch
	}

		public function __set($sKey,$value){
		switch ($sKey) {
			case 'data':
				$this->aData = $value;
				break;
				case 'files':
				$this->aFiles = $value;
				break;	
			default:
				die($sKey . "does not exist");
				break;
		}
	}


}//class


?>