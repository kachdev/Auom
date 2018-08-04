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
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <form class="admin_formlogin" action="includes/admin_login_inc.php" method="post">
        <h2>Login</h2> 
        <hr>
        <input type="text" name="user" id="" placeholder="username">
        <input type="password" name="pwd" id="" placeholder="password">
        <div class = "admin_submit_btn">
            <input type="submit" name = "submit" value="Login">
        </div>
        
    </form>
</body>
</html>