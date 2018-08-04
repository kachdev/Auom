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
    <link rel="stylesheet" href="css/dycalendar.min.css">
    <link rel="stylesheet" href="css/patient.css">
    
</head>
<body>
    <!-- <h1>Welcome to the Admin Page</h1> -->
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Dashboard</a> 
           
        </div>
        <nav class="big-header">
            <div class="doctorpost">
                <i class="fa fa-user"></i>
                <span>Inpatient Panel</span>
                    
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
                    echo "<p> Welcome ".$_SESSION['in_first']." ".$_SESSION['in_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['in_id'])) {
                        
                        echo'<form action="includes/inpatient_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: inpatienthome.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        
        </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="inpatient.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Inpatient Dashboard</p> 
                </a>
            </li>

            <li>
                <a href="manage_appointment.php">
                    <i class="fa fa-edit "></i>
                    <p>manage Appointment</p> 
                </a>
            </li>

            <li>
                <a href="view_prescription.php">
                    <i class="fa fa-stethoscope "> </i>
                    <p>View Prescription</p> 
                </a>
            </li>

            <li>
                <a class="current" href="view_doctor.php">
                    <i class="fa fa-user-md"></i>
                    <p>View Doctor</p> 
                </a>
            </li>

            <li>
                <a href="view_admit_history.php">
                    <i class="fa fa-hdd-o "> </i>
                    <p>Admit History</p> 
                </a>
            </li>

            <li>
                <a href="view_operation_history.php">
                    <i class="fa fa-hdd-o "> </i>
                    <p>Operation History</p> 
                </a>
            </li>

            <!-- <li>
                <a href="manage_setting.php">
                    <i class="fa fa-wrench "> </i>
                    <p>Settings</p> 
                </a>
            </li> -->

            <li>
                <a href="manage_profile.php">
                    <i class="fa fa-lock "> </i>
                    <p>Profile</p> 
                </a>
            </li>
        </div>

        <div class="main-content">
            <div class="main-wrapper">
                <div class="infotab">
                    <i class="fa fa-info-circle"></i>
                    View Doctor
                </div>
            <div class="tablelist">  
                <div id="tab-hide1" class="table-tab" >
                    <li id="tab1" class="tab-one">
                        <a class="tab-on" href="">
                            <i class="fa fa-align-justify"></i>
                            <span>View Doctor</span>
                        </a>
                    </li>
                
                    <li id="tab2" class="tab-two-new-new">
                        <a  href="">
                            
                        </a>
                    </li>
                </div>

                <div class="table-wrapper" id="display1">
                    <div class="table-wrapper-header">
                        <div class="searchbar-fill">
                            <form class = "searchbar" method="post" >
                                <span>Search:</span>
                                    <input type="search" name="search" placeholder="Search for users" id="">
                                        <span class = "search-btn">
                                            <input type="submit" value="" > <i class = "fa fa-search"></i>
                                        </span>
                            </form>
                        </div>
                        <div class="show-entries">
                            <span>show</span>
                            <div class="show-bar">
                                <select name="state" id="maxRows">
                                    <option value="50">Show All</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <span>entries</span> 
                        </div>
                    </div>
                    

                    <?php
                        if(isset($_POST['search'])){
                            $name = $_POST['search'];
                        }else{ $name = '';}
                        $query = "SELECT * FROM t_doctor WHERE CONCAT(d_firstname,' ',d_lastname) LIKE '%$name%' ORDER BY DoctorID ASC";

                        $response = @mysqli_query($connect,$query);

                        if ($response) {
                            echo'<table id="mytable" border="1">
                            <thead>
                                <tr>
                                    <th>#<i class="fa fa-sort-up"></i></th>
                                    <th>S/N<i class="fa fa-sort-up"></i></th>
                                    <th>Firstname<i class="fa fa-sort"></i></th>
                                    <th>Lastname<i class="fa fa-sort"></i></th>
                                    <th>Department<i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>';

                            $did = '';
                            $counter = 1;
                        while ($row = mysqli_fetch_array($response)) {
                            echo '<tbody>';
                            $did = $row['DoctorID'];
                            
                            echo'<tr>';
                            echo'<td>  <input type="checkbox" name="" id=""> </td>';
                            echo '<td>'.$counter.'</td>';
                            echo
                            '<td>'.$row['d_firstname'].'</td>'.
                            '<td>'.$row['d_lastname'].'</td>'.
                            '<td>'.$row['d_department'].'</td>';
                            echo'</tr>';
                            echo '</tbody>';
                            $counter++;
                        }
                            
                            echo "</table>";
                        }
                        else {
                            echo "Error retrieving data";
                            echo mysqli_error($connect);

                        }
                        mysqli_close($connect);
                        

                    ?>
                
                    <div class="table-footer">
                        <div class="show-note">
                            <p>Showing 1 to 3 of 3 entries</p>
                        </div>
                        <div class="pagination-wrapper">
                            <div>
                                <button>First</button>
                            </div>
                            <div>
                                <button>Previous</button>
                            </div>
                            <div>
                                <button>1</button>
                            </div>
                            <div>
                                <button>Next</button>
                            </div>
                            <div>
                                <button>Last</button>
                            </div>
                        </div>
                    </div>
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