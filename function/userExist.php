<?php
include("db.php");
?>
<?php
function userExist($email)
{
global $connectionDB;
$sql="SELECT email FROM signupform WHERE email=:emaiL";
$stmt=$connectionDB->prepare($sql);
$stmt->bindValue(':emaiL',$email);
$stmt->execute();
$result=$stmt->rowCount();
if($result==1)
{
    return true;
}
else{
    return false;
}
}
function loginUser($email,$password)
{
  global $connectionDB;
  $sql="SELECT * FROM signupform WHERE email=:userID AND password=:passworD LIMIT 1";
  $stmt=$connectionDB->prepare($sql);
  $stmt->bindValue(':userID',$email);
  $stmt->bindValue(':passworD',$password);
  $stmt->execute();
  $result=$stmt->rowCount();
  if($result==1)
  {
    return true;
  }
  else{
    return false;
  }
}

?>