<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated</title>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/admin.css">
    
</head>
<body>
<!-- <h1>Welcome to the Admin Page</h1> -->
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
            <div class="adminlogout-btn">
                <a href="adminlogin.html">Logout</a>
            </div>
        </nav>
    </header>

    <nav class="big-sidebar">
        <div class="left-sidebar">
            <li>
                <a href="admin.php">
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
            <a  href="manage_doctor.php">
                <i class="fa fa-user-md"></i>
                <p>Doctor</p> 
            </a>
            </li>

            <li>
                <a href="manage_inpatient.php">
                    <i class="fa fa-user"></i>
                    <p>Inpatient</p>
                </a>
            </li>

            <li>
                <a  href="manage_outpatient.php">
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
                    <li><a href=""><i class = "fa fa-columns"></i><p>Manage Noticeboard</p></a></li>
                    <li><a href=""><i class = "fa fa-columns"></i><p>Manage Noticeboard</p></a></li>
                    <li><a href=""><i class = "fa fa-columns"></i><p>Manage Noticeboard</p></a></li>
                </ul>
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
                        <form class="adding-form" action="" method="post">
                            <div>
                                Firstname: <input type="text" name="" id="" placeholder="firstname">
                                Lastname: <input type="text" name="" id="" placeholder="lastname">
                            </div>

                            <div>
                                Username: <input type="text" name="" id="" placeholder="username">
                                Password: <input type="password" name="" id="" placeholder="password">
                            </div>

                            <div>
                                Gender: <select name="" id="">
                                            <option value="">Gender</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                        </select>
                                Phoneno: <input type="text" name="" id="">
                            </div>

                            <div class="address-flex">
                                Address: <input type="text" name="" id="">
                            </div>
                        </form>
                
                        <div class="table-footer">
                            <div class="table-footer-btn">
                                <input type="submit" value="Update Profile">
                            </div>
                            
                        </div>   

                
                   
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
        // $(document).ready(function(){
        //     $("#has-sub").click(function(){
        //         $("#panel").slideDown("slow");
        //     });
 
        // });
        $(document).ready(function(e){
            $(".has-sub").click(function(){
                $(this).toggleClass('tap');
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