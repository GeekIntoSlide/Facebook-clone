<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");
?>

<?php
if(isset($_POST['forgotSearch']))
{
    $email=$_POST['email'];
    if(empty($email))
    {
       $_SESSION['errorMessage']="All field must be filled";
       redirectFunction("forgotPassword.php");
    }
    else if(loginUser($email,$password)){
        $_SESSION['successMessage']="Log in successfully";
    }
    else{
        $_SESSION['errorMessage']="Wrong credintial";
    }

}
if(isset($_POST['forgotSearch']))
{
$email=$_POST['email'];
global $connectionDB;
$sql="SELECT email FROM signupform WHERE email=:emaiL";
$stmt=$connectionDB->prepare($sql);
$stmt->bindValue(':emaiL',$email);
$stmt->execute();
$result=$stmt->rowCount();
if($result==1)
{ 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    $from="kraghuvanshi435@gmail.com";
    $to=$email;
    $subject="Recovery security code";
    $otp=rand(100000,999999);
    $message=strval($otp);
    $headers="From:kraghuvanshi435@gmaiil.com";
    if(mail($to,$subject,$message,$headers))
    {
        $_SESSION['emailToUpdate']=$email;
        $_SESSION['OTP']=$otp;
        redirectFunction("updatePassword.php");
    }
    else{
        echo "Recovery password not sent";
    }
    
}
else{
    $_SESSION['errorMessage']="User not exist";
    redirectFunction("forgotPassword.php");
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
    <title>ForgotPassword</title>
</head>
<body>
    <div class="forgotHeader">
        <div>
            <h1>Facebook</h1>
        </div>
        <form method="post" action="forgotPassword.php">
        <div>
            <input type="text" name="userId" placeholder="Email Address"/>
            <input type="password" name="password" placeholder="password"/>
            <button type="submit" name="loginButton">Log in</button>
            <button type="submit" name="forgotButton" style="background-color:#75b940; border-radius:5px"><a href="signup.php" style="color:white;">Don't have an account</a></button>
        </div>
    </div>
    <div class="forgot-form">
        
            <h2><?php echo errorMessage()?></h2>
            <h2><?php echo successMessage()?></h2>
            <div class="heading"><h1>Find your account</h1></div>
            <div class="para"><p>Please enter your email id to search your account</p></div>
            <input type="text" name="email" placeholder="Email address"/>
            <button type="submit" name="cancelSearch"><a href="login.php">Cancel</a></button>
            <button type="submit" name="forgotSearch"  >Search</button>
        </form>

    </div>
</body>
</html>