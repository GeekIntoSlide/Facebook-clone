<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

?>
<?php
include("../function/db.php");
include("../function/session.php");
include("../function/redirect.php");
include("../function/userExist.php")
?>
<?php
if(isset($_POST['signupButton']))
{
    $fullName=$_POST['firstName']." ".$_POST['lastName'];
    $email=$_POST['userId'];
    $password=$_POST['password'];
    $dob=$_POST['dateOfBirth'];
    $gender=$_POST['gender'];

    if(empty($fullName)||empty($email)||empty($password)||empty($dob)||empty($gender))
    {
     $_SESSION['errorMessage']="All input must be filled";   
     redirectFunction("signup.php");
    }
    elseif (userExist($email)) {
     $_SESSION['errorMessage']="User Id not available";
     redirectFunction("signup.php");
    }
    else
    {
     
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
        $_SESSION['email']=$email;
        $_SESSION['fullName']=$fullName;
        $_SESSION['password']=$password;
        $_SESSION['gender']=$gender;
        $_SESSION['dob']=$dob;
        
        $from="kraghuvanshi435@gmail.com";
        $to=$email;
        $subject="Security code for verification";
        $otp=rand(100000,999999);
        $message=strval($otp);
        $headers="From:kraghuvanshi435@gmail.com";
        
        if(mail($to,$subject,$message,$headers))
        {
            $_SESSION['OTP']=$otp;
            redirectFunction("otp.php");

        }
        else{
            $_SESSION['errormessage']="Otp send failed";
        }

    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sytle.css">
    <title>Signup</title>
</head>
<body>
    <h2 style="text-align:center;font-size:24px;"><?php echo errorMessage()?></h2>
    <h2 style="text-align:center;font-size:24px;"><?php echo successMessage()?></h2>
  <h2 class="topHeading">Facebook</h2>
    <form method="post" action="signup.php">
        <div class="signup-form">
            <h2>Create new account</h2>
            <p style="text-align:center; font-size:18px">It's easy and quick</p>
            <div class="name">
                <input type="text" name="firstName" placeholder="First name"/>
                <input type="text" name="lastName" placeholder="Last name"/>
            </div>
            <div class="idField">
                <input type="text" placeholder="Email address or Mobile number" name="userId"/>
                <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="date-gen">
                <div class="date">
                    <p>Date of birth</p>
                    <input type="date" name="dateOfBirth"/>
                </div>
                <div class="gender">
                    <p>Gender</p>
                    <input type="radio" name="gender" />
                    <label >Male</label>
                    <input type="radio" name="gender"/>
                    <label>Female</label>
                </div>
                <div class="coll-button">
                <button type="submit" name="signupButton">Sign Up</button>
                <button type="submit" ><a href="login.php">Already have an account</a></button>
                </div> 
            </div>
        </div>
    </form>
</body>
</html>