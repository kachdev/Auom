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
                <span>Outpatient Panel</span>
                    
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
                    echo "<p> Welcome ".$_SESSION['out_first']." ".$_SESSION['out_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['out_id'])) {
                        
                        echo'<form action="includes/outpatient_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: outpatientlogin.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        
        </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="outpatient.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Outpatient Dashboard</p> 
                </a>
            </li>

            <li>
                <a class="current" href="manage_appointment.php">
                    <i class="fa fa-edit "> </i>
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
                <a  href="view_doctor.php">
                    <i class="fa fa-user-md"></i>
                    <p>View Doctor</p> 
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
            Manage Appointment
        </div>
        <div class="tablelist">  
            <div id="tab-hide1" class="table-tab" >
                <li id="tab1" class="tab-one">
                    <a class="tab-on" href="">
                        <i class="fa fa-align-justify"></i>
                        <span>Appointment List</span>
                    </a>
                </li>
            
                <li id="tab2" class="tab-two">
                    <a  href="">
                        <i class="fa fa-plus"></i>
                        <span>Add Appointment</span>
                    </a>
                </li>
            </div>

            <div id="tab-hide2" class="table-tab" >
                <li id="tab1" class="tab-one-new">
                    <a  class="tab-on" href="">
                        <i class="fa fa-square "></i>
                        <span >Appointment List</span>
                    </a>
                </li>
                
                <li id="tab2" class="tab-two-new">
                    <div class="tab-two-new-content">
                        <a href="">
                            <i class="fa fa-plus"></i>
                            <span>Add Appointment</span>
                        </a>
                    </div>
                    
                </li>
            </div>

            <div class="table-wrapper" id="display1">
                <div class="table-wrapper-header">
                    <div class="searchbar-fill">
                        <span>Search:</span>
                        <form class = "searchbar" method="post" >
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
                    }else{ $name = ''; }
                    
                    $query = "SELECT * FROM t_appointment WHERE CONCAT(inp_name,' ',d_name) LIKE '%$name%' ORDER BY appointmentID ASC ";

                    $response = @mysqli_query($connect,$query);

                    if ($response) {
                        echo'<table id="mytable" border="1">
                        <thead>
                            <tr>
                                <th>#<i class="fa fa-sort-up"></i></th>
                                <th>S/N<i class="fa fa-sort-up"></i></th>
                                <th>Date<i class="fa fa-sort"></i></th>
                                <th>Doctor <i class="fa fa-sort"></i></th>
                                <th>Department<i class="fa fa-sort"></i></th>
                                <th>Options<i class="fa fa-sort"></i></th>
                            </tr>
                        </thead>';
                        $counter = 1;
                    while ($row = mysqli_fetch_array($response)) {
                        echo '<tbody>';

                        echo'<tr>';
                        echo'<td>  <input type="checkbox" name="" id=""> </td>';
                        echo '<td>'.$counter.'</td>';
                        echo
                        '<td>'.$row['ap_date'].'</td>'.
                        '<td>'.$row['d_name'].'</td>'.
                        '<td>'.$row['d_dept'].'</td>';
                        echo   '<td>
                                    <div class = "table_btns">
                                        <div class = "updatebtn" onClick = "" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </div>    
                                        <div class="delbtn" onClick="" href="">
                                            <i class="fa fa-trash-o "></i>
                                        </div>
                                    </div>
                                </td>';
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
                // mysqli_close($connect);
                    

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
            
                <?php
                        
                        // $pid = $_SESSION['in_id'];
                        
                        
                        // echo $pid;
                        // echo $did;
                        // die();
                        ?>
        
            <div class="table-wrapper" id="display2">
                <form class="adding-form" action="includes/insertAppointment.php" method="post">

                    <div>
                        Doctor: <select name="doc" id="" placeholder = "Doctor Name">
                            <?php
                                    $querydoctors = "SELECT * FROM t_doctor";
                                    $result2 = mysqli_query($connect, $querydoctors);
                                    if($result2){
                                        while($row = mysqli_fetch_array($result2))
                                        {                                            
                                            echo '<option>'.$row['d_firstname'].' '.$row['d_lastname'].'</option>';
                                        }
                                    }else{
                                        echo "<div>error".mysqli_error($connect)."</div>";
                                    }

                                    
                            
                        ?>
                        
                            </select>
                            
                    </div>

                   
                        <div>
                           Department: <select name="dept" id="" placeholder = "Department">
                                <?php
                                        $querydoctors = "SELECT * FROM t_doctor";
                                        $result2 = mysqli_query($connect, $querydoctors);
                                        if($result2){
                                            while($row = mysqli_fetch_array($result2))
                                            {                                            
                                                echo '<option>'.$row['d_department'].'</option>';
                                            }
                                        }else{
                                            echo "<div>error".mysqli_error($connect)."</div>";
                                        }
                                
                            ?>
                            
                                </select>
                    </div>
                        
                    
                    
                    <div>
                        Date: <input type="date" name="date" id="">
                    </div>

                    <div class="table-footer">
                        <div class="table-footer-btn">
                            <input type="submit" name = "insert-appointment" value="Add Appointment">
                        </div>
                    </div>
                </form>
                
                
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