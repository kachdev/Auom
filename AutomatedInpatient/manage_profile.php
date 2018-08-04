<?php
    require_once('includes/connect.php');
    $details = mysqli_fetch_assoc($connect->query("SELECT * FROM t_inpatient WHERE InpatientID=".$_SESSION['in_id'].""));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated</title>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
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
                <a class="current" href="manage_profile.php">
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
                                Firstname: <input type="text" name="fname" id="" placeholder="firstname" value = "<?php echo $details['inp_firstname'];?>">
                                Lastname: <input type="text" name="lname" id="" placeholder="lastname" value = "<?php echo $details['inp_lastname'];?>">
                            </div>

                            <div>
                                Username: <input type="text" name="uname" id="" placeholder="username" value = "<?php echo $details['inp_username'];?>">
                                Password: <input type="password" name="pwd" id="" placeholder="password" value = "<?php echo $details['inp_password'];?>">
                            </div>

                            <div  class="address-flex">
                                Email: <input type="email" name="email" id="" placeholder="email" value = "<?php echo $details['inp_email'];?>">
                            </div>
                            <div>
                                Gender: <select name="gen" id="" value = "<?php echo $details['inp_gender'];?>">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                Phoneno: <input type="text" name="phoneno" id="" value = "<?php echo $details['inp_phoneno'];?>">
                            </div>

                            <div class="address-flex">
                                Address: <input type="text" name="address" id="" value = "<?php echo $details['inp_address'];?>">
                            </div>

                            <div>
                                DateofBirth <input type="date" name="date" id="" value = "<?php echo $details['inp_birthdate'];?>">
                                Occupation <input type="text" name="occupation" id="" value = "<?php echo $details['inp_occupation'];?>">
                                
                            </div>

                            <div>
                                MaritalStatus <select name="status" id="" value = "<?php echo $details['inp_maritalstatus'];?>">
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>
                                
                                    BloodGroup <select name="blood" id="" value = "<?php echo $details['inp_bloodgroup'];?>">
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
                                Next of kin <input type="text" name="kin" id="" placeholder = "Next of kin" value = "<?php echo $details['inp_kin'];?>">
                                Next of kin contacts <input type="text" name="kphone" id="" value = "<?php echo $details['inp_kinno'];?>">
                            </div>

                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <button type="submit" name = "submit" value="Update Profile">Update Profile</button>
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
                            <form class="adding-form" action="" method="post">
                                <div>
                                    Old Password: <input type="password" name="" id="" placeholder = "Old Password">
                                </div>

                                <div>
                                    New Password: <input type="password" name="" id="" placeholder = "New Password">
                                </div>

                                <div>
                                    Confirm New Password:<input type="password" name="" id="" placeholder = "Confirm New Password"> 
                                </div>

                            </form>
                    
                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <input type="submit" value="Update Password">
                                </div>
                                
                            </div>   

                        </div>
                    </div>
                </div>
        </div>
    </nav>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#has-sub").click(function(){
                $("#panel").slideDown("slow");
            });
 
        });

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