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
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pharmacist.css">
</head>
<body>
    <!-- <h1>Welcome to the Admin Page</h1> -->
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Automy</a> 
           
        </div>
        <nav class="big-header">
            <div class="pharmacistpost">
                <i class="fa fa-user"></i>
                <span>Pharmacist Panel</span>
                    
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
                    echo "<p> Welcome ".$_SESSION['u_first']." ".$_SESSION['u_last']."</p>";
                ?>
                </div>
                <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['u_id'])) {
                        
                        echo'<form action="includes/pharmacist_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    else {
                        header("Location: pharmacisthome.php?Logout=success");
                        exit();
                    }
                ?>
            </div>
        <!-- </div> -->
    </nav>
    </header>

    <div class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="pharmacist.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Pharmacist Dashboard</p> 
                </a>
            </li>

            <li>
                <a  href="medicine_category.php">
                    <i class="fa fa-edit "> </i>
                    <p>Medicine Category</p> 
                </a>
            </li>

            <li>
                <a href="manage_medicine.php">
                    <i class="fa fa-medkit "> </i>
                    <p>Manage Medicine</p> 
                </a>
            </li>

            <li>
                <a class="current" href="manage_prescription.php">
                    <i class="fa fa-stethoscope"></i>
                    <p>Provide Medication</p> 
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
                    Manage Prescription
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Prescription List</span>
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
                                <span>Search:</span>
                                <input type="search" name="" placeholder="Search for medicine" id="">
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
                            require_once('includes/connect.php');
                            $counter = 1;
                            $query = "SELECT * FROM t_medicine_category";

                            $response = @mysqli_query($connect,$query);

                            if ($response) {
                                echo'<table id="mytable" border="1">
                                <thead>
                                    <tr>
                                        <th>#<i class="fa fa-sort-up"></i></th>
                                        <th>S/N<i class="fa fa-sort-up"></i></th>
                                        <th>Date <i class="fa fa-sort"></i></th>
                                        <th>Patient <i class="fa fa-sort"></i></th>
                                        <th>Doctor <i class="fa fa-sort"></i></th>
                                        <th>Options<i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>';

                            while ($row = mysqli_fetch_array($response)) {
                                echo '<tbody>';

                                
                                echo'<tr>';
                                echo'<td>  <input type="checkbox" name="" id=""> </td>';
                                echo '<td>'.$counter.'</td>';
                                echo
                                '<td>'.$row['m_medicine_category_name'].'</td>'.
                                '<td>'.$row['m_medicine_description'].'</td>';
                                echo   '<td>
                                            <a href="viewauser.html">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            <a class="delbtn" href="viewauser.html">
                                                <i class="fa fa-trash-o "></i>
                                            </a>
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

                    <div class="table-wrapper" id="display2">
                        <form class="adding-form" action="includes/doctoradmin_signup.php" method="POST" enctype="multipart/form-data">
                            <div>
                                Medicine Category Name: <input type="text" name="medicatname" id="" placeholder = "medicine category name">
                            </div>

                            <div>
                                Medicine Category Descritpion: <input type="text" name="meddescription" id="" placeholder="description">
                            </div>

                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <input type="submit" name="submit" id="submit" value="Add Medicine Category">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>                    
            </div>
       </div>
    </div>


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