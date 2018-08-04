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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <!-- <h1>Welcome to the Admin Page</h   1> -->
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Dashboard</a> 
           
        </div>
        <nav class="big-header">
            <!-- <div class="searchbar">
                <input type="search" name="" placeholder="Search for users" id="">
            </div>
            <div class="submitbtn">
                <input type="submit" value="Search">
            </div> -->
            <div class="adminpost">
                <i class="fa fa-user"></i>
                <span>AdminPanel</span>
                 
            </div>
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
            <div class = "loginuser">
                <?php
                   //echo "<p> Welcome Admin ".$_SESSION['ad_first']." ".$_SESSION['ad_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['u_id'])) {
                        
                        echo'<form action="includes/admin_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    // else {
                    //     header("Location: adminlogin.php?Logout=success");
                    //     exit();
                    // }
                ?>
            </div>
        </nav>
    </header>

    <div class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a class="current" href="admin.html">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Admin Dashboard</p> 
                </a>
            </li>

            <li>
                <a href="manage_department.php">
                    <i class="fa fa-sitemap"></i>    
                    <p>Department</p> 
                </a>
            </li>
        
            <li>
            <a href="manage_doctor.php">
                <i class="fa fa-user-md"></i>
                <p>Doctor</p> 
            </a>
            </li>

            <li>
                <a  href="manage_inpatient.php">
                    <i class="fa fa-user"></i>
                    <p>Inpatient</p>
                </a>
            </li>

            <li>
                <a href="manage_outpatient.php">
                    <i class="fa fa-user"></i>
                    <p>Outpatient</p>
                </a>
            </li>

            <li>
                <a  href="manage_nurse.php">
                    <i class="fa fa-plus"></i>
                    <p>Nurse</p>
                </a>
            </li>


            <li>
                <a href="manage_pharmacist.php">
                    <i class="fa fa-medkit "> </i>
                    <p>Pharmacist</p> 
                </a>
            </li>


            <li class = "has-sub"><a href="#"><i class="fa fa-wrench "></i><p>Settings</p><i class = "fa fa-arrow"></i></a>
                <ul>
                    <li><a href="manage_noticeboard.php"><i class = "fa fa-columns"></i><p>Manage Noticeboard</p></a></li>
                    <!-- <li><a href="backup_restore.php"><i class = "fa fa-download"></i><p>Backup Restore</p></a></li> -->
                </ul>
            </li>

            <li>
                <a href="manage_profile.php">
                    <i class="fa fa-lock "> </i>
                    <p>Profile</p> 
                </a>
            </li>
        
        </div>
        <div class="main-content">
            <div class="main-container">
                <div class="infotab">
                    <i class="fa fa-info-circle"></i>
                    Admin Dashboard
                </div>
    
                <div class="big-icons">
                    <div class="list-icons1">
                        
                        <div class="content-icons">
                            <i class="fa fa-user-md"></i>
                            <div class="content-note">
                                <span>Doctor</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-user"></i>
                            <div class="content-note">
                                <span>Patient</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-plus"></i>
                            <div class="content-note">
                                <span>Nurse</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-medkit"></i>
                            <div class="content-note">
                                <span>Pharmacist</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-medkit"></i>
                            <div class="content-note">
                                <span>Laboratorist</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-money"></i>
                            <div class="content-note">
                                 <span>Accountant</span>
                            </div>
                            
                        </div>
                    </div>
                    <div class="list-icons2">
                        <div class="content-icons">
                            <i class="fa fa-exchange "></i>
                            <div class="content-note">
                                <span>Appointment</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-credit-card "></i>
                            <div class="content-note">
                                <span>Payment</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa  fa-tint "></i>
                            <div class="content-note">
                                <span>Blood Bank</span>
                            </div>
                            
                        </div>
                    
                        <div class="content-icons">
                            <i class="fa fa-medkit"></i>
                            <div class="content-note">
                                <span>Medicine</span>
                            </div>
                            
                        </div>
    
                        <div class="content-icons">
                            <i class="fa fa-navicon"></i>
                            <div class="content-note">
                                <span>Operation Report</span>
                            </div>                                
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-github-alt"></i>
                            <div class="content-note">
                                    <span>Birth Report</span>   
                            </div>  
                            
                        </div>
                    </div>
                    
                    <div class="list-icons3">
                        <div class="content-icons">
                            <i class="fa fa-minus"></i>
                            <div class="content-note">
                                <span>Death Report</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-hdd-o "></i>
                            <div class="content-note">
                                <span>Bed Allotment</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-columns"></i>
                            <div class="content-note">
                                <span>Noticeboard</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-h-square "></i>
                            <div class="content-note">
                                <span>Settings</span>
                            </div>
                            
                        </div>
            
                        <div class="content-icons">
                            <i class="fa fa-globe "></i>
                            <div class="content-note">
                                <span>Language</span>
                            </div>
                            
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-download "></i>
                            <div class="content-note">
                                <span>Backup</span>
                            </div>
                            
                        </div>
                    </div>        
                </div>

                <div class="main-container-bottom">
                    <div class="some-class">
                        <div class="some-class-header">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar Schedule</span>
                        </div>
                        <div id="calendar" class="dycalendar-container ">
                            <div class="dycalendar-month-container">
                                <div class="dycalendar-header" data-option="
                                {
                                    &quot;target&quot;:
                                    &quot;#calendar
                                    &quot;,
                                    &quot;type
                                    &quot;:
                                    &quot;month
                                    &quot;,
                                    &quot;highlighttoday
                                    &quot;:true,
                                    &quot;prevnextbutton
                                    &quot;:
                                    &quot;show
                                    &quot;,
                                    &quot;month
                                    &quot;:0,
                                    &quot;year
                                    &quot;:2018,
                                    &quot;date
                                    &quot;:21,
                                    &quot;monthformat
                                    &quot;:
                                    &quot;full
                                    &quot;,
                                    &quot;dayformat
                                    &quot;:
                                    &quot;full
                                    &quot;,
                                    &quot;highlighttargetdate
                                    &quot;:false
                                }">
                                <span class="dycalendar-prev-next-btn prev-btn" data-date="21" data-month="0" data-year="2018" data-btn="prev">
                                    &lt;
                                    </span>
                                    <span class="dycalendar-span-month-year">
                                        January 2018
                                    </span>
                                    <span class="dycalendar-prev-next-btn next-btn" data-date="21" data-month="0" data-year="2018" data-btn="next">
                                        &gt;
                                    </span>
                                </div>
                                <div class="dycalendar-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Sun</td>
                                                <td>Mon</td>
                                                <td>Tue</td>
                                                <td>Wed</td>
                                                <td>Thu</td>
                                                <td>Fri</td>
                                                <td>Sat</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                                <td>5</td>
                                                <td>6</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>9</td>
                                                <td>10</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>13</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>15</td>
                                                <td>16</td>
                                                <td>17</td>
                                                <td>18</td>
                                                <td>19</td>
                                                <td>20</td>
                                            </tr>
                                            <tr>
                                                <td class="dycalendar-today-date">21</td>
                                                <td>22</td>
                                                <td>23</td>
                                                <td>24</td>
                                                <td>25</td>
                                                <td>26</td>
                                                <td>27</td>
                                            </tr>
                                            <tr>
                                                <td>28</td>
                                                <td>29</td>
                                                <td>30</td>
                                                <td>31</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="some-class2">
                        <div class="some-class2-header">
                            <i class="fa fa-align-justify"></i>
                            <span>Noticeboard</span>  
                        </div>
                        <div class="some-class2-content">
                            <div class = "some-class2-container">
                                <div class = "some-class2-icon">
                                    <i class = "fa fa-tag"></i>
                                </div>

                                <?php
                                    $sql = "SELECT * FROM t_noticeboard";
                                    $result = mysqli_query($connect, $sql);

                                    // if($result){
                                    //     echo'<div class = "some-class2-notes">
                                    //     <span>Your Title</span>
                                    //     <p>appointment</p>
                                    //     </div>';

                                    while($row = mysqli_fetch_array($result)){
                                        echo '<p>'.$row['no_title'].'</p>';
                                        echo '<p>'.$row['no_notice'].'</p>';
                                        echo '<p>'.$row['no_date'].'</p>';
                                        
                                    }
                                    // }
                                    

                                ?>
                                
                                
                                <div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </div>

<script src="js/dycalendar.min.js"></script> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
    dycalendar.draw({
        target:"#calendar",
        type:"month",
        highlighttoday:true,
        prevnextbutton:"show"
    });

    $(document).ready(function(e){
            $(".has-sub").click(function(){
                $(this).toggleClass('tap');
            });
                
            
        });
</script>
</body>
</html>