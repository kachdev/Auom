<?php
    require_once('includes/connect.php');
    
    $details = mysqli_fetch_assoc($connect->query("SELECT * FROM t_nurse WHERE NurseID=".$_SESSION['nu_id'].""));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated</title>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/nurse.css">
</head>
<body>
    <!-- <h1>Welcome to the Admin Page</h1> -->
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Dashboard</a> 
           
        </div>
        <nav class="big-header">
            <div class="pharmacistpost">
                <i class="fa fa-user"></i>
                <span>Nurse Panel</span>
                    
            </div>

            <div class = "lang-flex">
                <div class="language">
                    <select name="" id="">
                        <option value="">Select Language</option>
                        <option value="">english</option>
                        <option value="">spanish</option>
                        <option value="">russian</option>
                        <option value="">chinese</option>
                        <option value="">french</option>
                        <option value="">turkish</option>
                        <option value="">german</option>
                        <option value="">italian</option>
                        <option value="">greek</option>
                        <option value="">latin</option>
                    </select>
                </div>
            </div>
            
        
            <div class = "loginuser">
                <?php
                    echo "<p> Welcome Nurse ".$_SESSION['nu_first']." ".$_SESSION['nu_last']."</p>";
                ?>
                </div>
                <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['nu_id'])) {
                        
                        echo'<form action="includes/nurse_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: nursehome.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        </div>
    </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="nurse.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Nurse Dashboard</p> 
                </a>
            </li>

            <li>
                <a  href="view_inpatient.php">
                    <i class="fa fa-user "> </i>
                    <p>InPatient</p> 
                </a>
            </li>

            <li>
                <a  href="view_outpatient.php">
                    <i class="fa fa-user "> </i>
                    <p>OutPatient</p> 
                </a>
            </li>

            <li  class = "has-sub"><a  href="#"><i class="fa fa-hdd-o"></i><p>Bed Ward</p><i class = "fa fa-arrow"></i></a>
                <ul>
                    <li><a href="manage_bed.php"><i class = "fa fa-columns"></i><p>Manage Bed</p></a></li>
                    <li><a href="manage_bed_allotment.php"><i class = "fa fa-wrench"></i><p>Manage Bed Allotment</p></a></li>
                </ul>
            </li>

            <li>
                <a  href="manage_report.php">
                    <i class="fa fa-hospital-o"></i>
                    <p>Report</p> 
                </a>
            </li>

            <li>
                <a class="current" href="manage_profile.php">
                    <i class="fa fa-lock "> </i>
                    <p>Profile</p> 
                </a>
            </li>
        </div>
        <div class="main-content">
            <div class="main-wrapper">
                <div class="infotab">
                    <i class="fa fa-info-circle"></i>
                    Manage Profile
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Manage Profile</span>
                            </a>
                        </li>
                    
                        <li id="tab2" class="tab-two-new-new">
                            <a  href="">
                                
                            </a>
                        </li>
                    </div>

                    <div class="table-wrapper" id="display1">
                        <form class="adding-form" action="includes/updateProfile.php" method="post">
                            <div>
                                Firstname: <input type="text" name="fname" id="fname" placeholder="first name" value = "<?php echo $details['nu_firstname'];   ?>">
                                Lastname: <input type="text" name="lname" id="lname" placeholder="last name" value = "<?php echo $details['nu_lastname'];   ?>">
                            </div>
                    
                            <div>
                                Username: <input type="text" name="uname" id="uname" placeholder="username" value = "<?php echo $details['nu_username'] ?>">
                                Password: <input type="password" name="pwd" id="pwd" placeholder="password" value = "<?php echo $details['nu_password'] ?>">
                            </div>

                            <div class="address-flex">
                                Email: <input type="email" name="email" id="email" placeholder = "email" value = "<?php echo $details['nu_email']   ?>">
                            </div>

                            <div>
                                Gender: <select name="gen" id="gen" value = "<?php echo $details['nu_gender'];?>">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                Phoneno: <input type="text" name="phone" id="phone" placeholder = "phone number" value = "<?php echo $details['nu_phone']   ?>">
                            </div>

                            <div class="address-flex">
                                Address: <input type="text" name="address" id="address" placeholder = "Address" value = "<?php echo $details['nu_address']   ?>">
                            </div>

                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <input type="submit" name = "submit" value="Update Nurse">
                                </div>
                            </div>
                        </form>
                 
                </div>            
            </div>
            <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one-new-new">
                            <a class="tab-on" href="">
                                <i class="fa fa-lock"></i>
                                <span>ChangePassword</span>
                            </a>
                        </li>
                    
                        <li id="tab2" class="tab-two-new-new">
                            <a  href="">
                                
                            </a>
                        </li>
                    </div>

                    <div class="table-wrapper" id="display1">
                        <form class="adding-form" action="" method="post">
                            <div>
                                Old Password: <input type="password" name="" id="" placeholder = "Old Password">
                            </div>

                            <div>
                                New Password: <input type="password" name="" id="" placeholder = "New Password">
                            </div>

                            <div>
                                Confirm New Password:<input type="password" name="" id="" placeholder = "Confirm New Password"> 
                            </div>

                        </form>
                
                        <div class="table-footer">
                            <div class="table-footer-btn">
                                <input type="submit" value="Update Password">
                            </div>
                            
                        </div>   

                    </div>
                </div>
            </div>
       </div>
    </nav>


    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script src="js/dycalendar.min.js"></script>
    <script>
        function hide(){
              $('#left-sidebar').toggleClass("display");
        }
    </script>
</body>
</html>