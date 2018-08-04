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
                <a href="view_appointment.php">
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
                <a class="current"  href="manage_profile.php">
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
                                Firstname: <input type="text" name="fname" id="" placeholder="firstname" value = "<?php echo $details['d_firstname'];?>" >
                                Lastname: <input type="text" name="lname" id="" placeholder="lastname" value = "<?php echo $details['d_lastname'];?>">
                            </div>

                            <div>
                                Username: <input type="text" name="uname" id="" placeholder="username" value = "<?php echo $details['d_username'];?>">
                                Password: <input type="password" name="pwd" id="" placeholder="password" value = "<?php echo $details['d_password'];?>">
                            </div>

                            <div class="address-flex">
                                Email: <input type="email" name="email" id="" placeholder = "email" value = "<?php echo $details['d_email'];?>">
                            </div>

                            <div>
                                Gender: <select name="gen" id="gen" value = "<?php echo $details['d_gender'];?>">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                Phoneno: <input type="text" name="phone" id="" value = "<?php echo $details['d_phoneno'];?>">
                            </div>

                            <div class="address-flex">
                                Address: <input type="text" name="address" id="" value = "<?php echo $details['d_address'];?>">
                            </div>

                            <div>
                                Department: <select name="dept" id="dept" value = "<?php echo $details['d_department'];?>">
                                                <option value="cardiology">Cardiology</option>
                                                <option value="neurology">Neurology</option>
                                                <option value="pharmacy">Pharmacy</option>
                                            </select>

                                Profile <input type="text" name="profile" id="" placeholder="profile" value = "<?php echo $details['d_profile'];?>">
                            </div>

                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <button type="submit" name="submit" id="submit" value="Update Profile">Update Profile</button>
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
                    <form class="adding-form" action="includes/updatePassword.php" method="post">
                        <div>
                            Old Password: <input type="password" name="old_password" id="" placeholder = "Old Password">
                        </div>

                        <div>
                            New Password: <input type="password" name="new_password" id="" placeholder = "New Password">
                        </div>

                        <div>
                            Confirm New Password:<input type="password" name="ver_password" id="" placeholder = "Confirm New Password"> 
                        </div>

                        <div class="table-footer">
                            <div class="table-footer-btn">
                                <input type="submit" name = "update-password" value="Update Password">
                            </div>
                            
                        </div>

                    </form>
            
                       

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