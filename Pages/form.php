<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <script src="https://kit.fontawesome.com/63c877e653.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method="post" type="submit">
    <p>Name</p>
    <input type="text" placeholder="Name" name="name" value=""/>
    <p>email</p>
    <input type="email" name="email" value=""/>
    <p>Password</p>
    <input type="password" name="pass" value=""/>
    <button type="button" onclick="submitForm();" name="save_button" value="save">submit</button>
    </form>
    <p id="hel"></p>
    <p id="hel1"></p>
    <p id="hel2"></p>
    <script type="text/javascript">
        function submitForm()
        {
            var name=$('input[name=name]').val();
            var email=$('input[name=email]').val();
            var password=$('input[name=pass]').val();
            var formData={name:name,email:email,password:password};
            document.getElementById("hel").innerHTML=name;
            document.getElementById("hel1").innerHTML=email;
            document.getElementById("hel2").innerHTML=password;
            $.ajax({url:"http://localhost/facebook/Pages/test.php",
                type:"POST",
                data:formData,
                success:function(response){
               alert("hello");
            },
            error:function(response)
        {
            alert("hello error");
        }})
           
        }
    </script>
</body>
</html>