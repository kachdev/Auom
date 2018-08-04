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
    <form class="loginform-group" method="POST" action="includes/inpatient_login.inc.php" >
        <div class="form-head">
                <h2>Inpatient Login</h2> 
        </div>
        <br>
        <input type="text" name="uname" id="" placeholder="username">
        <input type="password" name="pwd" id="" placeholder="password">
        <input type="submit" name = "submit" value="Login" >
        

    </form>
</div>

</body>
</html>