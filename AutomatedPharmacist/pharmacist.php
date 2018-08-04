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
    <link rel="stylesheet" href="css/pharmacist.css">
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
                echo "<p> Welcome  ".$_SESSION['ph_first']." ".$_SESSION['ph_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    
                    if (isset($_SESSION['ph_id'])) {
                        
                        echo'<form action="includes/pharmacist_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }else {
                        header("Location: pharmacisthome.php?Logout=success");
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
                <a class="current" href="pharmacist.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Pharmacist Dashboard</p> 
                </a>
            </li>

            <li>
                <a href="medicine_category.php">
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
                <a  href="provide_medication.php">
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
         <div class="main-container">
                <div class="infotab">
                    <i class="fa fa-info-circle"></i>
                    Pharmacist Dashboard
                </div>

                <div class="big-icons">
                    <div class="list-icons1">
                        <div class="content-icons">
                            <i class="fa fa-edit"></i>
                            <div class="content-note">
                                <span>Medicine Category</span>
                            </div>
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-medkit "></i>
                            <div class="content-note">
                                <span>Manage Medicine</span>
                            </div>
                        </div>

                        <div class="content-icons">
                            <i class="fa fa-stethoscope "></i>
                            <div class="content-note">
                                <span>Provide Medication</span>
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
                                                <td>21</td>
                                                <td>22</td>
                                                <td  class="dycalendar-today-date">23</td>
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
                                <div class = "some-class2-notes">
                                    <span>Your Title</span>
                                    <p>appointment</p>
                                </div>
                                
                                <div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script src="js/dycalendar.min.js"></script>
</body>
</html>