<?php
    require_once('includes/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated</title>
    <link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/patientstyle.css">
</head>
<body>
    <div class="registerbackdrop"></div>
    <div class="form-group-wrapper">
        <form class="form-group" method="POST" action="includes/patient_signup.inc.php" >
            <div class="form-head">
                    <h2>Create An Account</h2> 
            </div>
            <br>
            <div class="form-grouprow">
                <input type="text" name="fname" id="" placeholder=" Firstname">
                <input type="text" name="lname" id="" placeholder=" Lastname">
            </div>
            
            <input type="email" name="email" id="" placeholder="Email">
            <input type="text" name = "uname" id = "" placeholder = "Username">
            <input type="password" name="pwd" id="" placeholder=" password">
            <input type="password" name="cfm_pwd" id="" placeholder="Confirm password">
            <button name = "submit" id = "myBtn" value="Register" >Register</button>
            
            <div class = "formcheckbox">
            <input type="checkbox" name="" id="">  By clicking here you have accepted our <a href="">Terms and Conditions</a> and our <a href="">Privacy Policy</a><br>
                Already have an account?<a href="patientlogin.php">Log in</a> 
            </div>
            
            <div id = "myModal" class = "modaldrop"></div>
                <div class = "box">
                    <div id = "register-alert" class = "box-content">
                        <span class = "close">&times;</span>
                        <div class = "modalheader">
                            <h2>Registered Successfully!!</h2>
                        </div>
                        <div class = "modalbtn">
                            <a href="patientlogin.php">Login</a>
                        </div>
                    </div>
                    
                </div>
                
            
            
    
        </form>
    </div>
    <script type="text/javascript" src="_js/jquery.min.js"></script>
    <script type="text/javascript" src="_js/custom.js"></script>
</body>
</html>