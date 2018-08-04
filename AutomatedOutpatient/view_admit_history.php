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
    <link rel="stylesheet" href="css/dycalendar.min.css">
    <link rel="stylesheet" href="css/patient.css">
    
</head>
<body>
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Dashboard</a> 
           
        </div>
        <nav class="big-header">
            <div class="doctorpost">
                <i class="fa fa-user"></i>
                <span>Patient Panel</span>        
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
                    //echo "<p> Welcome Dr ".$_SESSION['u_first']." ".$_SESSION['u_last']."</p>";
                ?>
            </div>
            <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['u_id'])) {
                        
                        echo'<form action="includes/doctor_logout.inc.php" class = "adminlogout"  method="POST">
                        <input type="submit" name = "submit" value="Logout">
                        </form>';
                    }
                    // else {
                    //     header("Location: doctorhome.php?Logout=success");
                    //     exit();
                    // }
                ?>
            </div>
        </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a  href="patient.php">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Patient Dashboard</p> 
                </a>
            </li>

            <li>
                <a  href="view_appointment.php">
                    <i class="fa fa-edit "> </i>
                    <p>View Appointment</p> 
                </a>
            </li>

            <li>
                <a  href="view_prescription.php">
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

            <li>
                <a class="current" href="view_admit_history.php">
                    <i class="fa fa-hdd-o "> </i>
                    <p>Admit History</p> 
                </a>
            </li>

            <li>
                <a  href="view_operation_history.php">
                    <i class="fa fa-hospital-o "> </i>
                    <p>Operation History</p> 
                </a>
            </li>


            <li>
                <a href="manage_setting.php">
                    <i class="fa fa-wrench "> </i>
                    <p>Settings</p> 
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
                    View Admit History
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Bed Allotment List</span>
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
                                <input type="search" name="" placeholder="Search for users" id="">
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
                            $query = "SELECT * FROM t_admithistory";

                            $response = @mysqli_query($connect,$query);

                            if ($response) {
                                echo'<table id="mytable" border="1">
                                <thead>
                                    <tr>
                                        <th>#<i class="fa fa-sort-up"></i></th>
                                        <th>S/N<i class="fa fa-sort-up"></i></th>
                                        <th>Bed Number<i class="fa fa-sort"></i></th>
                                        <th>Bed Type <i class="fa fa-sort"></i></th>
                                        <th>Patient<i class="fa fa-sort"></i></th>
                                        <th>Allotment Date Time<i class="fa fa-sort"></i></th>
                                        <th>Discharge Date Time<i class="fa fa-sort"></i></th>
                                        <th>Options<i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>';

                            while ($row = mysqli_fetch_array($response)) {
                                echo '<tbody>';

                                
                                echo'<tr>';
                                echo'<td>  <input type="checkbox" name="" id=""> </td>';
                                echo '<td>'.$counter.'</td>';
                                echo
                                '<td>'.$row['ad_bednumber'].'</td>'.
                                '<td>'.$row['ad_bedtype'].'</td>'.
                                '<td>'.$row['p_patient'].'</td>'.
                                '<td>'.$row['ad_allotdate_time'].'</td>'.
                                '<td>'.$row['ad_disdate_time'].'</td>';
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
                
            
                
            </div>
        </div>
    </div>

        </div>
    </nav>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/dycalendar.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">
        // $(document).ready(function(){
        //     $("#has-sub").click(function(){
        //         $("#panel").slideDown("slow");
        //     });
 
        // });

        // var table = '#mytable'
        // $('#maxRows').on('change', function () {
        //     $('.pagination').html('')
        //     var trnum = 0
        //     var maxRows = parseInt($(this).val())
        //     var totalRows = $(table+' tbody tr').length
        //     $(table +' tr:gt(0)').each(function () {
        //         trnum++
        //         if (trnum > maxRows) {
        //             $(this).hide()
        //         }
        //         if (trnum <= maxRows) {
        //             $(this).show()
        //         }
        //     })
        //     if (totalRows > maxRows) {
        //         var pagenum = Math.ceil(totalRows/maxRows)
        //         for(var i = 1; i <= pagenum;){
        //             $('.pagination').append('<li data-page = "'+i+'">\<span>' + i++ +'<span class = "sr-only">(current)</span></span>\</li>').show()
        //         }
        //     }

        //     $('.pagination li:first-child').addClass('active')
        //     $('.pagination li').on('click', function(){
        //         var pageNum = $(this).attr('data-page')
        //         var trIndex = 0;
        //         $('pagination li').removeClass('active')
        //         $(this).addClass('active')
        //         $(table+'tr:gt(0)').each(function () {
        //             trIndex++
        //             if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
        //                 $(this).hide()
        //             }else{
        //                 $(this).show()
        //             }
        //         })
        //     })
        // })
        // $(function(){
        //     $('table tr:eq(0)').prepend('<th>ID</th>')
        //     var id = 0;
        //     $('table tr:gt(0)').each(function () {
        //         id++
        //         $(this).prepend('<td>'+id+'</td>')
        //     })
        // })
       
        
    </script>    
</body>
</html>