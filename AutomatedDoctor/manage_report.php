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
    <header>
        <div class="logo">
           <a onclick="hide()" href="">Dashboard</a> 
           
        </div>
        <nav class="big-header">
            <div class="doctorpost">
                <i class="fa fa-user"></i>
                <span>DoctorPanel</span>        
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
                        header("Location: doctorlogin.php?Logout=success");
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
                <a href="view_appointment.php">
                    <i class="fa fa-edit "></i>
                    <p>View Appointment</p> 
                </a>
            </li>

            <li>
                <a  href="manage_prescription.php">
                    <i class="fa fa-stethoscope "></i>
                    <p>Manage Prescription</p> 
                </a>
            </li>

            <li>
                <a class="current" href="manage_report.php">
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
                    Manage Report
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-onee">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Report List</span>
                            </a>
                        </li>

                        <li id="tab2" class="tab-two">
                            <a  href="">
                                <i class="fa fa-plus"></i>
                                <span>Add Report</span>
                            </a>
                        </li>
                    </div>

                    <div id="tab-hide2" class="table-tab" >
                        <li id="tab1" class="tab-one-new">
                            <a  class="tab-on" href="">
                                <i class="fa fa-square "></i>
                                <span >Report List</span>
                            </a>
                        </li>
                        
                        <li id="tab2" class="tab-two-new">
                            <div class="tab-two-new-content">
                                <a href="">
                                    <i class="fa fa-plus"></i>
                                    <span>Add Report</span>
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

                        <?php
                            if(isset($_POST['search'])){
                                $name = $_POST['search'];
                            }else{ $name = ''; }
                            $query = "SELECT * FROM t_report";
                            

                            $response = @mysqli_query($connect,$query);
                            
                            if ($response) {
                                echo'<table id="mytable" border="1">
                                <thead>
                                    <tr>
                                        <th>#<i class="fa fa-sort-up"></i></th>
                                        <th>S/N<i class="fa fa-sort-up"></i></th>
                                        <th>Date<i class="fa fa-sort"></i></th>
                                        <th>Patient<i class="fa fa-sort"></i></th>
                                        <th>Doctor<i class="fa fa-sort"></i></th>
                                        <th>Report Type<i class="fa fa-sort"></i></th>
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
                                '<td>'.$row['r_date'].'</td>'.
                                '<td>'.$row['p_name'].'</td>'.
                                '<td>'.$row['d_name'].'</td>'.
                                '<td>'.$row['r_type'].'</td>';
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
                
            
                <div class="table-wrapper" id="display2">
                    <form class="adding-form" action="includes/insertReport.php" method="post">
                        <div class = "flexrow">
                            <div class = "column">
                                <div>
                                    <label for="">Type</label>
                                    <select name="type" id="">
                                        <option value="operation">Operation</option>
                                        <option value="birth">Birth</option>
                                        <option value="death">Death</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class = "flexrow">
                            <div class = "column2"> 
                                <div>
                                    <label for="">Description:</label>
                                    <textarea name="desc" id=""  placeholder = "Enter Description"></textarea>
                                </div>
                            </div>
                        </div>
                            
                        <div class = "flexrow">
                            <div class = "column">
                                <div>
                                    <label for="">Date</label>
                                    <input type="date" name="date" id="" placeholder = "Date">
                                </div>
                            </div>

                            <div class = "column">
                                <div>
                                    <label for="">Doctor Name</label>
                                    <input type="text" name="doc" id="" value = "<?php echo $details['d_firstname'].' '.$details['d_lastname']; ?>"  placeholder = "">
                                </div>  
                            </div>
                        </div>
                            
                        <div class = "flexrow">
                            <div class = "column2">
                                <div>
                                    <label for="">Patient Name</label>
                                        <select name="pname" id="pname" placeholder = "Patient Name">
                                            <?php
                                                $querydoctors = "SELECT * FROM t_inpatient";

                                                $result2 = mysqli_query($connect, $querydoctors);
                                                if($result2){
                                                    while($row = mysqli_fetch_array($result2))
                                                    {                                            
                                                        echo '<option>'.$row['inp_firstname'].' '.$row['inp_lastname'].'</option>';
                                                    }
                                                }else{
                                                    echo "<div>error".mysqli_error($connect)."</div>";
                                                }

                                                    
                                            
                                            ?>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="table-footer">
                            <div class="table-footer-btn">
                                <input type="submit" name = "submit" value="Add Report">
                            </div>
                        </div>
                    </form>
                    
                    
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