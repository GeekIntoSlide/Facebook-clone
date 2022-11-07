<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");
// password_protected();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/63c877e653.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/comment.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <title>Comments</title>
</head>
<body>
<div class="commentSection">
<?php
$id=$_GET['id'];
global $connectionDB;
$sql="SELECT * FROM postdata WHERE id=$id";
$stmt=$connectionDB->query($sql);
while($DataRow=$stmt->fetch())
{
  $name=$DataRow['name'];
  $post=$DataRow['postText'];?>
<h1><?php echo $name?></h1>
<p style="background-color: #b1bdd6;"><?php echo $post?></p>
<?php } ?>
<textarea rows="10" cols="100" placeholder="Type your comment" id="commentText"></textarea>
<button type="button" onclick="commentPost(<?php echo $id?>)">Submit</button>
<p>Your listed comment:</p>
<?php
global $connectionDB;
$sql="SELECT * FROM comments WHERE post_id='$id'";
$srno=0;
$stmt=$connectionDB->query($sql);
while($DataRow=$stmt->fetch())
{
    $comment=$DataRow['comment'];
    $srno++;?>
    <p><?php echo $srno?></p>
    <p><?php  echo $comment?></p>
<?php }?>
</div>
<script>

function commentPost(id)
{
  
    var commentText=$('textarea#commentText').val();
    var formData={commentText:commentText,id:id};
   $.ajax({url:"http://localhost/facebook/Pages/test.php",
        type:"POST",
        data:formData,
        success:function()
        {
            $('textarea#commentText').val("")
        },
        
})
}
</script>
</body>
</html>