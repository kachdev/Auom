<?php
    
    require_once('includes/connect.php');
    $details = mysqli_fetch_assoc($connect->query("SELECT * FROM t_doctor WHERE DoctorID=".$_SESSION['doc_id'].""));
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
    <link rel="stylesheet" href="css/doctor.css">
    
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
                <span>Doctor Panel</span>
                    
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
                    echo "<p> Welcome Dr ".$_SESSION['doc_first']." ".$_SESSION['doc_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['doc_id'])) {
                        
                        echo'<form action="includes/doctor_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: doctorhome.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        
        </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a href="doctor.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Doctor Dashboard</p> 
                </a>
            </li>

            <li>
                <a href="manage_inpatient.php">
                    <i class="fa fa-user"></i>
                    <p>In Patient</p> 
                </a>
            </li>

            <li>
                <a href="manage_outpatient.php">
                    <i class="fa fa-user"></i>
                    <p>Out Patient</p> 
                </a>
            </li>

            <li>
                <a class="current" href="view_appointment.php">
                    <i class="fa fa-edit "></i>
                    <p>View Appointment</p> 
                </a>
            </li>

            <li>
                <a href="manage_prescription.php">
                    <i class="fa fa-stethoscope "></i>
                    <p>Manage Prescription</p> 
                </a>
            </li>

            <li>
                <a href="manage_report.php">
                    <i class="fa fa-hospital-o "> </i>
                    <p>Manage Reports</p> 
                </a>
            </li>


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
            View Appointment
        </div>
        <div class="tablelist">  
            <div id="tab-hide1" class="table-tab" >
                <li id="tab1" class="tab-one">
                    <a class="tab-on" href="">
                        <i class="fa fa-align-justify"></i>
                        <span>View Appointment</span>
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
                    // $first   =$_SESSION['in_first'] ;
                    //     $second= $_SESSION['in_last'] ;
                    if(isset($_POST['search']))
                    {
                        $name = $_POST['search'];
                    }
                    else{ $name = '';}
                    
                    $query = "SELECT * FROM t_appointment WHERE DoctorID = '".$_SESSION['doc_id']."'";
                   

                    $response = mysqli_query($connect, $query);
                    $count = mysqli_affected_rows($connect);
                    if ($count>0) 
                    {
                        echo'<table id="mytable" border="1">
                        <thead>
                            <tr>
                                <th>#<i class="fa fa-sort-up"></i></th>
                                <th>S/N<i class="fa fa-sort-up"></i></th>
                                <th>Date<i class="fa fa-sort"></i></th>
                                <th>Patient<i class="fa fa-sort"></i></th>
                                
                            </tr>
                        </thead>';
                        $counter =1;
                    while ($row = mysqli_fetch_assoc($response)) {
                        echo '<tbody>';

                        
                        echo'<tr>';
                        echo'<td>  <input type="checkbox" name="" id=""> </td>';
                        echo '<td>'.$counter.'</td>';
                        echo
                        '<td>'.$row['ap_date'].'</td>'.
                        '<td>'.$row['inp_name'].'</td>';
                        // echo   '<td>
                        //             <a href="viewauser.html">
                        //                 <i class="fa fa-wrench"></i>
                        //             </a>
                        //             <a class="delbtn" href="viewauser.html">
                        //                 <i class="fa fa-trash-o "></i>
                        //             </a>
                        //         </td>';
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