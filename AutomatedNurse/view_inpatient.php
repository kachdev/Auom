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

    <div class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="nurse.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Nurse Dashboard</p> 
                </a>
            </li>

            <li>
                <a class="current" href="view_inpatient.php">
                    <i class="fa fa-user "> </i>
                    <p>InPatient</p> 
                </a>
            </li>

            <li>
                <a href="view_outpatient.php">
                    <i class="fa fa-user "> </i>
                    <p>OutPatient</p> 
                </a>
            </li>

            <li class = "has-sub"><a href="#"><i class="fa fa-hdd-o"></i><p>Bed Ward</p><i class = "fa fa-arrow"></i></a>
                <ul>
                    <li><a href="manage_noticeboard.php"><i class = "fa fa-columns"></i><p>Manage Bed</p></a></li>
                    <li><a href="backup_restore.php"><i class = "fa fa-wrench"></i><p>Manage Bed Allotment</p></a></li>
                </ul>
            </li>

            <li>
                <a  href="provide_medication.php">
                    <i class="fa fa-hospital-o"></i>
                    <p>Report</p> 
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
                    Manage Inpatient
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Inpatient List</span>
                            </a>
                        </li>
                    
                        <li id="tab2" class="tab-two">
                            <a  href="">
                                <i class="fa fa-plus"></i>
                                <span>Add Inpatient</span>
                            </a>
                        </li>
                    </div>

                    <div id="tab-hide2" class="table-tab" >
                        <li id="tab1" class="tab-one-new">
                            <a  class="tab-on" href="">
                                <i class="fa fa-square "></i>
                                <span >Inpatient List</span>
                            </a>
                        </li>
                        
                        <li id="tab2" class="tab-two-new">
                            <div class="tab-two-new-content">
                                <a href="">
                                    <i class="fa fa-plus"></i>
                                    <span>Add Inpatient</span>
                                </a>
                            </div>
                            
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

                        <div id = "inpatient">
                            <?php
                                if(isset($_POST['search'])){
                                    $name = $_POST['search'];
                                }else{ $name = ''; }
                                $query = "SELECT * FROM t_inpatient WHERE CONCAT(inp_firstname, ' ', inp_lastname) LIKE '%$name%' ORDER BY InpatientID ASC";

                                $response = @mysqli_query($connect,$query);

                                if ($response) {
                                    echo'<table id="mytable" border="1">
                                    <thead>
                                        <tr>
                                            <th>#<i class="fa fa-sort-up"></i></th>
                                            <th>S/N<i class="fa fa-sort-up"></i></th>
                                            <th>Firstname<i class="fa fa-sort"></i></th>
                                            <th>Lastname<i class="fa fa-sort"></i></th>
                                            <th>Username<i class="fa fa-sort"></i></th>
                                            <th>Gender <i class="fa fa-sort"></i></th>
                                            <th>Blood Group <i class="fa fa-sort"></i></th>
                                            <th>Birth Date <i class="fa fa-sort"></i></th>
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
                                    '<td>'.$row['inp_firstname'].'</td>'.
                                    '<td>'.$row['inp_lastname'].'</td>'.
                                    '<td>'.$row['inp_username'].'</td>'.
                                    '<td>'.$row['inp_gender'].'</td>'.
                                    '<td>'.$row['inp_bloodgroup'].'</td>'.
                                    '<td>'.$row['inp_birthdate'].'</td>';
                                    echo'<td>
                                            <div class = "table_btns">
                                                <div class = "updatebtn" onClick = "showUpdate(\''.$row['inp_firstname'].' '.$row['inp_lastname'].'\',\' '.$row['InpatientID'].'\')" href="#">
                                                    <i class="fa fa-wrench"></i>
                                                </div>    
                                                <div class="delbtn" onClick="showDelete(\''.$row['inp_firstname'].' '.$row['inp_lastname'].'\',\''.$row['InpatientID'].'\')" href="">
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
                                mysqli_close($connect);
                                

                            ?>
                        </div>
                        
                            
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
                        <form class="adding-form" action="includes/insertInpatient.php" method="POST" enctype="multipart/form-data">
                            
                            <div>
                                Firstname: <input type="text" name="fname" id="" placeholder="firstname">
                                Lastname: <input type="text" name="lname" id="" placeholder="lastname">
                            </div>

                            <div>
                                Username: <input type="text" name="uname" id="" placeholder="username">
                                Password: <input type="password" name="pwd" id="" placeholder="password">
                            </div>

                            <div  class="address-flex">
                                Email: <input type="email" name="email" id="" placeholder="email">
                            </div>
                            <div>
                                Gender: <select name="gen" id="">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                Phoneno: <input type="text" name="phoneno" id="">
                            </div>

                            <div class="address-flex">
                                Address: <input type="text" name="address" id="">
                            </div>

                            <div>
                                DateofBirth <input type="date" name="date" id="">
                                Occupation <input type="text" name="occupation" id="">
                                
                            </div>

                            <div>
                                MaritalStatus <select name="status" id="">
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>
                                
                                    BloodGroup <select name="blood" id="">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option> 
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>    
                                </select>
                            </div>


                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <input type="submit" name="submit" id="submit" value="Add Inpatient">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id = "success">
                                
                    </div>
                    <div class = "invisible_drop"></div>
                        <div class = "prompt_box">
                            <h2>Are you Sure you want to Delete? </h2><br>
                            <div id="users_name"></div>
                            <div id="user_id">

                            </div>
                            <div class = "prompt_btn">
                                <button Onclick = "yes_btn" id = "yes_btn">Yes</button>
                                <button Onclick = "no_btn" id = "no_btn">No</button>
                            </div>
                        </div>


                        <!-- ==UPDATE MODAL -->
                    <div id = "success">

                    </div>
                    <div class = "update_invisible_drop"></div>
                        <div class = "update_prompt_box">
                        <button Onclick = "x_btn" id = "x_btn"><i class = "fa fa-times "></i></button>
                            <form class="adding-form" action="includes/updateInpatient.php" method="POST">
                                <input type="hidden" name="inp_id" id="inp_id" readonly required >
                                <div>
                                    Firstname: <input type="text" name="fname" id="fname_up" placeholder="firstname">
                                    Lastname: <input type="text" name="lname" id="lname_up" placeholder="lastname">
                                </div>

                                <div>
                                    Username: <input type="text" name="uname" id="uname_up" placeholder="username">
                                    Password: <input type="password" name="pwd" id="pwd_up" placeholder="password">
                                </div>

                                <div class="address-flex">
                                    Email: <input type="email" name="email" id="email_up" placeholder = "email">
                                </div>

                                <div>
                                    Gender: <select name="gen" id="gen_up">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                    Phoneno: <input type="text" name="phone" id="phone_up">
                                </div>

                                <div class="address-flex">
                                    Address: <input type="text" name="address" id="address_up">
                                </div>

                                <div>
                                    DateofBirth <input type="date" name="date" id="dob_up">
                                    Occupation <input type="text" name="occupation" id="occupation_up">
                                    
                                </div>

                                <div>
                                    MaritalStatus <select name="status" id="status_up">
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                </select>
                                    
                                        BloodGroup <select name="blood" id="blood_up">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option> 
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>    
                                    </select>
                                </div>
                                
                                <div>
                                    Nextofkin <input type="text" name="kin" id="kin_up" placeholder = "Next of kin">
                                    Nextofkinphoneno <input type="text" name="kphone" id="kinno_up">
                                </div>

                                <div class="table-footer">
                                    <div class="table-footer-btn">
                                        <button type="submit" name="submit" id="submit">Update Inpatient</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>


                </div>                    
            </div>
       </div>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/inpatient.js">
    alert('hello');
    </script>
    <script src="js/dycalendar.min.js"></script>
   
</body>
</html>