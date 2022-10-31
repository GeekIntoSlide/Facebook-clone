<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");
?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$showEmail=$_SESSION['emailToUpdate'];
$otp=$_SESSION['OTP'];
echo $otp;
?>
<?php
if(isset($_POST['updateButton']))
{
    $pass=$_POST['password'];
    $rePass=$_POST['rePassword'];
    $code=$_POST['code'];
    if(empty($code)||empty($rePass)||empty($rePass))
    {
        $_SESSION['errorMessage']="All field must be filled";
    }
    else if($code!=$otp)
    {
        $_SESSION['errorMessage']="Please enter correct security code";
    }
    else if($pass!=$rePass)
    {
        $_SESSION['errorMessage']="Password not match";
    }
    else{
        global $connectionDB;
        $sql="SELECT * FROM signupform WHERE email='$showEmail'";
        $stmt=$connectionDB->query($sql);
        while($DataRows=$stmt->fetch())
        {
            $password=$DataRows['password'];
        }
        $stmt->execute();
        if($password==$pass)
        {
            $_SESSION['errorMessage']="Password must be different from previous one";
        }
        else{
            global $connectionDB;
            $sql="UPDATE signupform SET password=$pass WHERE email='$showEmail'";
            $stmt=$connectionDB->prepare($sql);
            $Execute=$stmt->execute();
            if($Execute)
            {
                redirectFunction("login.php");
            }
        }
        echo $password;
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
    <title>Update Password</title>
</head>
<body>
<div class="forgotHeader">
        <div>
            <h1>Facebook</h1>
        </div>
</div>
<form method="post" action="updatePassword.php">
    <div class="updateForm">
        <?php echo errorMessage()?>
        <h1>Reset your password</h1>
        <p>Recovery security code sent to:<?php echo $showEmail?></p>
        <div class="updateItemForm">
        <label>Security code</label>
        <input type="number" placeholder="Code" name="code"/>
        <label>New password</label>
        <input type="text" name="password" placeholder="Password"/>
        <label>Re-enter your password</label>
        <input type="password" name="rePassword" placeholder="Re-enter your password"/>
        <button type="submit" name="updateButton">Submit</button>
        <button><a href="login.php">Cancel</a></button>
        </div>    
    </div>
    </form>
</body>
</html>