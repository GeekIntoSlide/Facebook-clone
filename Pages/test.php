<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$name=$_SESSION['name'];
$email=$_SESSION['email'];
?>
<?php
include("../function/db.php");



if(isset($_POST['message']))
{
    error_log(json_encode($_POST));
    $sql="INSERT INTO postdata(postText,email,likesGet,commentsGet,name)";
    $sql.="VALUES(:postTexT,:emaiL,0,0,:namE)";
    $stmt=$connectionDB->prepare($sql);
     $stmt->bindValue(':postTexT',$_POST['message']);
     $stmt->bindValue(':emaiL',$email);
     $stmt->bindValue(':namE',$name);
     $result = $stmt->execute();
     error_log(json_encode($result));
     
}
else{
    echo "Error";
}
$sql="SELECT likesGet FROM postdata WHERE email='$email'";
$stmt=$connectionDB->query($sql);
while($DataRow=$stmt->fetch())
{
    $clike=$DataRow['likesGet'];
}
if(isset($_POST['like']))
{
    error_log(json_encode($_POST));
    $sql="UPDATE postdata SET likesGet=$clike+1 WHERE email='$email'";
    $stmt=$connectionDB->prepare($sql);
    $result=$stmt->execute();
    error_log(json_encode($result));
}
?>