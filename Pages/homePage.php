<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");
// password_protected();
?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$name=$_SESSION['name'];
$email=$_SESSION['email'];
?>
<?php


// if(isset($_POST['postUploadButton']))
// {
//     $textPost=$_POST['postText'];
//     if(empty($textPost))
//     {
//         $_SESSION['errorMessage']="Type something then post";
        
//     }
//     else{
//         global $connectionDB;
//         $sql="INSERT INTO postdata(email,postText)";
//         $sql.="VALUES(:emaiL,:postTexT)";
//         $stmt=$connectionDB->prepare($sql);
//         $stmt->bindValue(':emaiL',$email);
//         $stmt->bindValue(':postTexT',$textPost);
//         $Execute=$stmt->execute();
//         if($Execute)
//         {
//             $_SESSION['successMessage']="Post uploaded";
//             redirectFunction("homePage.php");
//         }
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://kit.fontawesome.com/63c877e653.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="header">
    <div class="logo">
        <h1><i class="fa-brands fa-facebook"></i></h1>
    </div>
    <div class="search">
        <input type="text" placeholder="Search facebook" name="facebookSearch"/>
    </div>
    <div class="buttonColl">
        <button type="submit" name="messengerbutton"><i class="fa-brands fa-facebook-messenger"></i></button> 
        <button type="submit"><i class="fa-solid fa-bell"></i></i></button>
        <button type="submit"><i class="fa-regular fa-user"></i></button>
    </div>
</div>
<div class="main">
    <div class="col1">
        <h4><i class="fa-sharp fa-solid fa-house" style="color:#3b5998 ;"></i> Home</h4>
        <h4><i class="fa-regular fa-user"></i><?php echo $name?></h4>
        <h4><i class="fa-sharp fa-solid fa-bars"></i>Menu</h4>
        <h4><i class="fa-sharp fa-solid fa-user-group" style="color:#3b5998 ;"></i>Friends</h4>
        <h4><i class="fa-solid fa-people-group"></i>Groups</h4>
    </div>
    <div class="col2">
       <div class="userData">
        <div class="story">
            <h4>Stories</h4>
        <div class="storySection">
            <div class="storyUpload" >hello</div>
            <div class="storyUploded">hello</div>
        </div>
       </div>
       </div>
       <div class="userPost" id="butt">
        <div class="postFill">
            <i class="fa-solid fa-user"></i>
            <div style="display:inline;" class="postFillPara">
             <p style="display:inline ;">What's on your mind username</p>
            </div>
        </div>
        <div class="storyPhoto">
            <p style="text-align: center;background-color:#3b5998; height:35px; justify-content:center; position:relative;top:5px;">Photos/Videos</p>
        </div>
       </div>
       <div class="postShow">
        <div class="postArea">
        
       <div class="postContent">
        <?php
        global $connectionDB;
        $sql="SELECT * FROM postdata WHERE email='$email'";
        $stmt=$connectionDB->query($sql);
        while($DataRow=$stmt->fetch())
        {
            $name=$DataRow['name'];
            $content=$DataRow['postText'];
            $like=$DataRow['likesGet'];
            $comment=$DataRow['commentsGet'];
            ?>
            <p><?php echo $name?></p>
            <p><?php echo $content?></p>
            <div class="likeShow">
            <p>Likes<?php echo $like?></p>
            <p>Comment<?php echo $comment?></p>
            </div>
            <div class="likeButton">
                <button type="button" name="likeButton" id="like" onclick="likeFn()" value="false">Like</button>
                <button type="button" name="commentButton" id="comment">Comment</button>
            </div>
       <?php 
        
    }?>
       </div>   
        </div>
       </div>
    </div>
    <div class="col3">
        <h3>Group Conversation</h3>
        <h4><i class="fa-solid fa-plus"></i>Create new group</h4>
    </div>
</div>
<form  method="post" action="" type="submit">
<div class="storyPopup" id="sty">
<div class="popupStory">
    <h1 style="text-align:center ;">Create post <i class="fa-sharp fa-solid fa-xmark fa-cross" id="crossButton"></i></h1>
<div>
    <p class ="errorClass" id="demo"></p>
    <textarea rows="10" cols="65" id="message" class="textArea" name="messag" placeholder="What's on your mind?<?php echo $name?>"></textarea>
    
</div>
<p id="success"></p>
<button class="postButton"  name="postUploadButton"  type="button" onclick="postButton()">Submit</button>
</div>
</div>
</form>
<script type="text/javascript">
    document.getElementById("butt").addEventListener("click",function(){
        document.querySelector(".storyPopup").style.display="flex";
    })
    document.getElementById("crossButton").addEventListener("click",function(){
        document.querySelector(".storyPopup").style.display="none";
    })
    
    {
    function likeFn()
    {
        var like=$('button#like').val();
        
        var fdata={like:like};
        $.ajax({url:"http://localhost/facebook/Pages/test.php",
        type:"POST",
        data:fdata,
        success:function(response)
        {
            
        }
        })

    }
}
  
    function postButton()
    {
      var message=$('textarea#message').val();
      var formData={message:message};
      $.ajax({url:"http://localhost/facebook/Pages/test.php",
             type:"POST",
             data:formData,
             success:function(response)
             {
                document.getElementById("sty").style.display="none";
             }
    })
      document.getElementById("success").innerHTML=postData;
    }
</script>

</body>
</html>
