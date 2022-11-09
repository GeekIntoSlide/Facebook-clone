<?php
include("../function/db.php");
include("../function/userExist.php");
include("../function/redirect.php");
include("../function/session.php");
password_protected();
$nameUser=$_SESSION['name'];
$email=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/comment.css">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <title>friend</title>
</head>
<body>
    <div class="friendSection">
        <div class="addedFriend">
            <h1 style="text-align:center;">Friend request</h1>
            <div class="showFriend">
             <?php
             global $connectionDB;
             $sqlF="SELECT * FROM friend WHERE fromUser='$email' AND statusUser='P' ";
             $stmtF=$connectionDB->query($sqlF);
             while($DatarowF=$stmtF->fetch())
             {
                $nameFriend=$DatarowF['name'];
                $fromFriend=$DatarowF['fromUser'];
                $toFriend=$DatarowF['toUser'];
                ?>
                
                <p><?php echo $nameFriend?><button type="button" onclick='addFriend("<?php echo $fromFriend ?>","<?php echo $toFriend?>")'>Add friend</button><button type="button">Cancel</button></p>
             <?php }?>             
            </div>
        </div>
        <div class="searchFriend">
           <input type="text" placeholder="Search friend"/>
           <span><button type="button" class="btn">Search</button></span>
           <div class="suggestion">
           <?php
             global $connectionDB;
             $sql="SELECT * FROM signupform";
             $stmt=$connectionDB->query($sql);
             while($Datarow=$stmt->fetch())
             {
                $name=$Datarow['name'];
                $friendEmail=$Datarow['email'];
                if($nameUser!=$name)
                {?>
                 <p><?php echo $name?><button type="button" id="fre" value="<?php echo $email?>" onclick='sendFriendReq("<?php echo$friendEmail;?>","<?php echo$name;?>")'>Submit</button>
                <?php }?>
                <?php }?>
           </div>
        </div>

    </div>
    <script>
        function addFriend(fromFriend,toFriend)
        {
            var formData={fromFriend:fromFriend,toFriend:toFriend};
            $.ajax({url:"http://localhost/facebook/Pages/test.php",
                    type:"POST",
                    data:formData,
                    success:function(response)
                    {
                        alert("success");
                    }
            })
        }
        function sendFriendReq(to,name)
        {
            var from=$("button#fre").val();
            var formData={from:from,to:to,name:name};
            $.ajax({url:"http://localhost/facebook/Pages/test.php",
                   type:"POST",
                   data:formData,
                   success:function(response)
                   {
                    // for(let i = 0; i < 5; i++)
                    // {
                    //     document.getElementById("fre").style.display="none";
                    // }
                   }

            })
            
        }
    </script>
</body>
</html>