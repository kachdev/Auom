<?php
    session_start();

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
    <link rel="stylesheet" href="css/patient.css">
    
</head>
<body>
    <!-- <h1>Welcome to the Admin Page</h1> -->
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Automy</a> 
           
        </div>
        <nav class="big-header">
            <div class="searchbar">
                <input type="search" name="" placeholder="Search for users" id="">
            </div>
            <div class="submitbtn">
                <input type="submit" value="Search">
            </div>

            <div class = "loginuser">
                <?php
                    echo "<p> Welcome ".$_SESSION['u_first']." ".$_SESSION['u_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['u_id'])) {
                        
                        // echo $_SESSION['u_first'] + $_SESSION['u_last']; 
                        echo'<form action="../includes/patient_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: ../patient/patienthome.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        </nav>
    </header>

    <div class="big-sidebar">
         <div class="left-sidebar">
            <a href="patientuserprofile.html">
                <i class="fa fa-user"></i>
                <p>Patient Profile</p> 
            </a>
            <a href="">
                <i class="fa fa-calendar"></i>
                <p>Book Appointment</p>
            </a>
            <a href="">
                <i class="fa fa-money"></i>
                <p>Pay Bills</p>
            </a>
            <a href="">
                <i class="fa fa-map-marker"></i>
                <p>Maps</p>
            </a>
            <a href="">
                <i class="fa fa-bell"></i>
                <p>Notifications</p>
            </a>
            <a class="current" href="changepassword.php">
                <i class="fa fa-lock"></i>
                <p>Change Password</p>
            </a> 
         </div>
         <div class="main-content">
            
                <form class="changepassword" action="" method="post">
                    <input type="password" name="" id="" placeholder = "Old password">
                    <input type="password" name="" id="" placeholder = "New Password">
                    <input type="password" name="" id="" placeholder = "Confirm password">
                    <input type="submit" value="Change">
                </form>
            
         </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script>
        function hide(){
              $('#left-sidebar').toggleClass("display");
        }
    </script>
</body>
</html>

