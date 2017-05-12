<?php 
session_start();
require_once("includes/header.php"); 
require_once("includes/form.php");
require_once("includes/members.php"); 


//log in---------------------------------------------------------------------------------
$oForm1 = new Form("Please Log in / or Register In The Form Below");

if (isset($_POST["submit1"])) {
    $oForm1->data = $_POST;

$oForm1->checkFilled("user_name1");
$oForm1->checkFilled("password1");


if ($oForm1->valid == true) {
    
        $oTestMember = new Members();
        $bSuccess = $oTestMember->loadByUserName($_POST["user_name1"]);

            if ($bSuccess == false) {
                $oForm1->raiseCustomError("user_name1","wrong user name");
            }else{

                if (password_verify($_POST["password1"],$oTestMember->password) == false) {
                    $oForm1->raiseCustomError("password1","wrong password");
           
                }else{
                    $_SESSION["MembersID"] = $oTestMember->membersID;

                    header("Location:mydetails.php");
                    exit;
                }
        
            }
    
        }

    }

    $oForm1->StartGrouping();
    $oForm1->MakeInput("user_name1","User Name");
    $oForm1->MakePassword("password1","Password");
    $oForm1->EndGrouping();
    $oForm1->MakeSubmit("submit1","Submit");
//-------------------------------------------------------------------------------------------------------

//register-----------------------------------------------------------------------------
$oForm = new Form("Register New Account");

if (isset($_POST["submit"])) {
    $oForm->data = $_POST;

$oForm->checkFilled("first_name","First Name");
$oForm->checkFilled("last_name","Last Name");
$oForm->checkFilled("company","Company");
$oForm->checkFilled("telephone","Telephone");
$oForm->checkFilled("email","Email");
$oForm->checkFilled("user_name","User Name");
$oForm->checkFilled("password","Password");
$oForm->checkFilled("confirm_password","Confirm Password");
$oForm->checkSame("password", "confirm_password");

$oTestMember = new Members();
$bSuccess = $oTestMember->loadByUserName($_POST["user_name"]);
if ($bSuccess == true) {
    $oForm->raiseCustomError("user_name", "already taken");
}


if ($oForm->valid == true) {
    
    $oMember = new Members();

    $oMember->firstName = $_POST["first_name"];
    $oMember->lastName = $_POST["last_name"];
    $oMember->company = $_POST["company"];
    $oMember->telephone = $_POST["telephone"];
    $oMember->email = $_POST["email"];
    $oMember->userName = $_POST["user_name"];
    $oMember->password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $oMember->save();

        header("Location:index.php");
        exit;
    }



}

$oForm->StartGrouping();
$oForm->MakeInput("first_name","First Name");
$oForm->MakeInput("last_name","Last Name");
$oForm->MakeInput("company","Company");
$oForm->MakeInput("telephone","Telephone");
$oForm->MakeInput("email","Email");
$oForm->MakeInput("user_name","User Name");
$oForm->MakePassword("password","Password");
$oForm->MakePassword("confirm_password","Confirm Password");
$oForm->EndGrouping();
$oForm->MakeSubmit("submit","submit");

?>

<div id="categoriesregister">

<div id="login">

     <?php echo $oForm1->HTML; ?> 
<!-- <form class="pure-form">
    <fieldset>
        <legend>Log In</legend>

        <input type="email" placeholder="Username">
        <input type="password" placeholder="Password">

       

        <button type="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
</form> -->
</div>


<div id="registerform">
   <?php echo $oForm->HTML; ?> 
<!-- <form class="pure-form pure-form-stacked">
    <fieldset>
        <legend>Register</legend>

        <div class="pure-g">
            <div class="pure-u-1 pure-u-md-1-3">
                <label for="first-name">First Name</label>
                <input id="first-name" class="pure-u-23-24" type="text">
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="last-name">Last Name</label>
                <input id="last-name" class="pure-u-23-24" type="text">
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="Address">Address</label>
                <input id="Address" class="pure-u-23-24" type="text" required>
            </div>


            <div class="pure-u-1 pure-u-md-1-3">
                <label for="Telephone">Telephone</label>
                <input id="" class="pure-u-23-24" type="text" required>
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="Email">Email</label>
                <input id="" class="pure-u-23-24" type="text" required>
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="User Name">User Name</label>
                <input id="" class="pure-u-23-24" type="text">
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="Password">Password</label>
                <input id="" class="pure-u-23-24" type="password">
            </div>

            <div class="pure-u-1 pure-u-md-1-3">
                <label for="Confirm Password">Confirm  Password</label>
                <input id="" class="pure-u-23-24" type="password">
            </div>

            
        </div>

        <label for="terms" class="pure-checkbox">
            <input id="terms" type="checkbox"> I've read the terms and conditions
        </label>

        <button type="submit" class="pure-button pure-button-primary">Submit</button>
    </fieldset>
</form> -->
</div>

</div>
<?php require_once("includes/footer.php") ?>