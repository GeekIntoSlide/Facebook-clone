<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");


?>
<?php
if(isset($_POST['loginButton']))
{
    $email=$_POST['userId'];
    $password=$_POST['password'];
    if(empty($email)||empty($password))
    {
       $_SESSION['errorMessage']="All field must be filled";
       redirectFunction("login.php");
    }
    else if(loginUser($email,$password)){
        global $connectionDB;
        $sql="SELECT * from signupform WHERE email='$email' AND password='$password'";
        $stmt=$connectionDB->query($sql);
        while($DataRows=$stmt->fetch())
        {
            $name=$DataRows['name'];
            $email=$DataRows['email'];
        }
        $stmt->execute();
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        error_log(json_encode($_SESSION));
       redirectFunction("homePage.php");
    }
    else{
        $_SESSION['errorMessage']="Wrong credential";
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
    <title>Login</title>
</head>
<body>
    
        <div class="login-div">
            <h2><?php echo errorMessage()?></h2>
            <h2><?php echo successMessage()?></h2>
            <div class="logo">
                <h1>Facebook</h1>
                <p>Facebook helps you connect and share with the people in the life </p>
            </div>
            <form method="post" action="login.php">
            <div class="login-form">
                <div>
                    <input type="text" name="userId" placeholder="Email Address" autocomplete="off"/>
                    <input type="password" name="password" placeholder="Password" autocomplete="off"/>
                    <button type="submit" name="loginButton" class="login">Log in</button>
                    <button type="submit" name="forgotButton" class="forgot"><a href="forgotPassword.php">Forgot password?</a></button>
                    <button type="submit" name="signUpButton" class="signup"><a href="signup.php">Create New Account</a></button>
                </div>
            </div>
            </form>
        </div>
</body>
</html>