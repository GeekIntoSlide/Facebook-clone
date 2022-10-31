<?php
include("../function/db.php");
include("../function/session.php");
include("../function/redirect.php");
include("../function/userExist.php")
?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$otp=$_SESSION['OTP'];
$email= $_SESSION['email'];
$fullName= $_SESSION['fullName'];
$password=$_SESSION['password'];
$gender=$_SESSION['gender'];
$dob=$_SESSION['dob'];
if(isset($_POST['otpSubmit']))
{
    if($_POST['otp']==$otp)
    {
        global $connectionDB;
            $sql="INSERT INTO signupForm(name,email,password,birthDate,gender)";
            $sql.="VALUES(:namE,:emaiL,:passworD,:birthDatE,:gendeR)";
            $stmt=$connectionDB->prepare($sql);
            $stmt->bindValue(':namE',$fullName);
            $stmt->bindValue(':emaiL',$email);
            $stmt->bindValue(':passworD',$password);
            $stmt->bindValue(':birthDatE',$dob);
            $stmt->bindValue(':gendeR',$gender);
            $Execute=$stmt->execute();
            if($Execute)
            {
                redirectFunction('home.php');
            }
    }
    else
    {
        $_SESSION['errorMessage']="Security code not match";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/63c877e653.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/sytle.css">
    <title>Email Verification</title>
</head>
<body>
<div class="forgotHeader">
        <div>
            <h1>Facebook</h1>
        </div>
</div>
    <form action="otp.php" method="post">
    <div class="otpForm">
        <h5><?php echo errorMessage()?></h5>
        <h1>Enter security code</h1>
        <p>Please check your emails for a message with your code. Your code is 6 numbers long.</p>
     <div class="otp-col">
      <div>
        <input type="number" name="otp" placeholder="Enter code"/>
      </div>
      <div class="static-otp">
        <p>We sent otp to:</p><br>
        <p><?php echo $email?>
            
      </div>
     </div>
     <div class="otpButton">
      <div>
        <p>Didn't get a code?</p>
      </div>
      <div>
        <button><a href="signup.php">Cancel</a></button>
        <button type="submit" name="otpSubmit" style="background-color:#3b5998; color:white; border-radius:5px;">Submit</button>
      </div>
    </div>
    
    </div>
   
    </form>
</body>
</html>