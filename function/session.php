<?php
session_start();
function errorMessage()
{
    if(isset($_SESSION['errorMessage']))
    {
        $output="<div class=\"session\">";
        $output.=htmlentities($_SESSION['errorMessage']);
        $output.="</div>";
        $_SESSION['errorMessage']=null;
        return $output;
    }
}
function successMessage()
{
    if(isset($_SESSION['successMessage']))
    {
        $output="<div class=\"sessionGreen\">";
        $output.=htmlentities($_SESSION['successMessage']);
        $output.="</div>";
        $_SESSION['successMessage']=null;
        return $output;
    } 
}
// $otp=$_SESSION["OTP"];
function password_protected()
{
   if(isset($_SESSION['email']))
   {
      return true;
      redirectFunction("homePage.php");    
   }
   else{
      $_SESSION['errorMessage']="Login required";
      redirectFunction("login.php");
   }
}
?>