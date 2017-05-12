<?php 
session_start();
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
require_once("includes/header.php");
require_once("includes/listing.php");
require_once("includes/form.php");
require ("includes/class.phpmailer.php");


// if (isset($_SESSION["MembersID"]) == false) {
//     header("Location:register.php");
//     exit;
// }

// $oTestListing = new listing();
// $oTestListing->load($_GET["ListingsID"]);

$oListing = new Listing();
$oListing->load($_GET["ListingsID"]);

$aExistingData = array();
$aExistingData["company_name"] = $oListing->companyName;
$aExistingData["categories_title"] = $oListing->categoriesTitle;
 

$oForm = new Form("Apply online");
$oForm->data = $aExistingData;

if (isset($_POST["submit"])) {
    
    $oForm->data = $_POST;
    $oForm->files = $_FILES;

     
        
        $oForm->checkFilled("first_name");
        $oForm->checkFilled("last_name");
        $oForm->checkFilled("phone");
        $oForm->checkFilled("email");
        $oForm->checkFilled("telephone");
        $oForm->checkFileUploaded("photo");

   
    


    if ($oForm->valid == true) {
        
      



          //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Set who the message is to be sent from
        $mail->setFrom('mirompm@gmail.com', 'Christoper');
        //Set an alternative reply-to address
        $mail->addReplyTo('mirompm@gmail.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($_POST["email"], $_POST["first_name"]);
        //Set the subject line
        $mail->Subject = 'Hello from Chris';
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML("Hello, how are you? Chris");
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
        //$mail->addAttachment($_FILES["photo"]["temp_name"]);
        $sNewPath = dirname(__FILE__). '/img/' .$_FILES["photo"]['name'];
        move_uploaded_file($_FILES["photo"]['tmp_name'], $sNewPath);
        $mail->addAttachment($sNewPath);


        print_r($_FILES);

        //send the message, check for errors
            if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
            }
        


        //header ("Location:listings.php?CategoriesID=".$oListing->categoriesID);

    }

}

$oForm->StartGrouping();
$oForm->MakeInput("company_name","Company Name");
$oForm->MakeInput("categories_title","Position");
$oForm->MakeInput("first_name","First Name");
$oForm->MakeInput("last_name","Last Name");
$oForm->MakeInput("phone","Contact Phone");
$oForm->MakeInput("email","Your email address ");
$oForm->MakeInput("telephone","Telephone");
$oForm->makeFileInput("photo","Attach a CV ");
$oForm->EndGrouping();
$oForm->MakeSubmit("submit","send");
?>


<div id="categoriesregister">
    <div id="middlebox">
        <div class="websiteheading"> 
            <h1>Apply Online</h1>
        </div>  
    </div>
    <div id="registerform">
        <?php echo $oForm->HTML; ?>
    </div> 
</div>

<?php require_once("includes/footer.php") ?>