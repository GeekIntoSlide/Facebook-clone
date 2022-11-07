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
    $sql="INSERT INTO postdata(postText,email,likes,comment,name)";
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
global $connectionDB;

if(isset($_POST['id']))
{
    if(isset($_POST['cLike']))
    {
    $cLike=$_POST['cLike'];
    $idLikes=$_POST['id'];
    error_log(json_encode($_POST));
    $sql="UPDATE postdata SET likes=$cLike+1 WHERE id=$idLikes";
    $stmt=$connectionDB->query($sql);
    $stmt->execute();
}
}
if(isset($_POST['commentText']))
{
    if(isset($_POST['id']))
    {
        global $connectionDB;
        $comment=$_POST['commentText'];
        $id=$_POST['id'];
        $sql="INSERT INTO comments(email,comment,post_id)";
        $sql.="VALUES(:emaiL,:commenT,:post_ID)";
        $stmt=$connectionDB->prepare($sql);
         $stmt->bindValue(':emaiL',$email);
         
         $stmt->bindValue(':commenT',$comment);
         $stmt->bindValue(':post_ID',$id);
        $result=$stmt->execute();
        error_log(json_encode($result));
    }
}
?>