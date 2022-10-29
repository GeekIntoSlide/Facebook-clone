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
        <div>
            <input type="text" name="userId" placeholder="Email Address"/>
            <input type="password" name="password" placeholder="password"/>
            <button type="submit" name="loginButton">Log in</button>
            <button type="submit" name="forgotButton" style="background-color:#75b940; border-radius:5px"><a href="signup.php" style="color:white;">Don't have an account</a></button>
        </div>
    </div>
    <div class="forgot-form">
        <form>
            <div class="heading"><h1>Find your account</h1></div>
            <div class="para"><p>Please enter your email id to search your account</p></div>
            <input type="text" name="email" placeholder="Email address"/>
            <button type="submit" name="cancelSearch"><a href="login.php">Cancel</a></button>
            <button type="submit" name="forgotSearch"  ><a href="#">Search</a></button>
        </form>

    </div>
</body>
</html>