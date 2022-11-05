<html>
    <head>
    </head>
    <body>
        <script>
            function checkLoginForm() {
                var eleuser = document.forms["signIn"]["username"];
                var elepass = document.forms["signIn"]["pswd"];
                 var username = eleuser.value;
                 var pass =  elepass.value;
                if(username == "") {
                    alert("Username or Email is needed");
                    eleuser.focus();
                    return false;
                }
            if(username.length < 4) {
                alert("Username or Email is to short");
                eleuser.focus();
                return false;
            }
            re = /^[-_a-zA-Z0-9.,@#!?]*$/;
            if(!re.test(username)) {
                alert("Username or Email only contains letters, numbers and _-.,@#!?");
                eleuser.focus();
                return false;
            }
            if(pass == ""){
                alert("Password is needed");
                elepass.focus();
                return false;
            }   
            return true;
                        }
        </script>
        
        <form method="post" name='signIn' onsubmit='return checkLoginForm();'>
        <div class='enterInfo' align='left'>Username or Email 1:</div>
            <input size='60' type='text' name='username' class='input' id='theFieldID'>
        <div class='enterInfo'> Password: </div>
            <input id='username1' size='60' type='password' name='pswd' class='input'>
            <br><br>
           <input type='submit' value='Log In'>
        </form>
    </body>
</html>