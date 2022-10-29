<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/sytle.css">
    <title>Signup</title>
</head>
<body>
  <h2 class="topHeading">Facebook</h2>
    <form>
        <div class="signup-form">
            <h2>Create new account</h2>
            <p style="text-align:center; font-size:18px">It's easy and quick</p>
            <div class="name">
                <input type="text" name="firstName" placeholder="First name"/>
                <input type="text" name="lastName" placeholder="Last name"/>
            </div>
            <div class="idField">
                <input type="text" placeholder="Email address or Mobile number" name="userId"/>
                <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="date-gen">
                <div class="date">
                    <p>Date of birth</p>
                    <input type="date" name="dateOfBirth"/>
                </div>
                <div class="gender">
                    <p>Gender</p>
                    <input type="radio" name="gender" />
                    <label >Male</label>
                    <input type="radio" name="gender"/>
                    <label>Female</label>
                </div>
                <div class="coll-button">
                <button type="submit" name="signupButton">Sign Up</button>
                <button type="submit" ><a href="login.php">Already have an account</a></button>
                </div> 
            </div>
        </div>
    </form>
</body>
</html>