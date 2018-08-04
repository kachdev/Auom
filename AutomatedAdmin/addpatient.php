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
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
            $("#has-sub").click(function(){
                $("#panel").slideDown("slow");
            });
        });
    </script>
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
            <div class="searchbar">
                <input type="search" name="" placeholder="Search for users" id="">
            </div>
            <div class="submitbtn">
                <input type="submit" value="Search">
            </div>
            <div class="adminlogout-btn">
                <a href="adminlogin.html">Logout</a>
            </div>
        </nav>
    </header>

    <nav class="big-sidebar">
        <ul class="left-sidebar">
            <li>
                <a  href="admin.html">
                    <i class="fa fa-pie-chart"></i>    
                    <p>Admin Dashboard</p> 
                </a>
            </li>
            <li>
                <a href="adminuserprofile.html">
                    <i class="fa fa-user"></i>
                    <p>User Profile</p> 
                </a>
            </li>
            
            <li id="has-sub">
                <a href="#">
                    <i class="fa fa-users"> </i>
                    View Users
                    <i class="fa fa-angle-down"></i> 
                </a>
                
                <ul id="panel">
                    <!-- THE PATIENT -->
                    <li>
                        <a class="current"  href="patientview.html">
                            <i class="fa fa-user"></i>
                            <p>Patient</p>
                        </a>
                    </li>

                    <!-- THE DOCTOR -->
                    <li>
                        <a href="doctorview.html">
                            <i class="fa fa-user"></i>
                            <p>Doctor</p>
                        </a>
                    </li>

                    <!-- THE PHARMACIST -->
                    <li>
                        <a href="">
                            <i class="fa fa-user"></i>
                            <p>Pharmacist</p>
                        </a>
                    </li>

                </ul>
            </li>
            
            <li>
                <a href="">
                    <i class="fa fa-map-marker"></i>
                    <p>Maps</p>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-area-chart"></i>
                    <p>Charts</p>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-bell"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul> 
        <div class="main-content">
            <div class="formhead-wrapper">
                <!-- PATIENT DETAILS -->
                <div id="sect1">
                    <form action="includes/insertPatient.php" enctype="multipart/form-data" method="POST" class="form-wrapper" >
                        <h2 style="color:black;">Step 1: Personal Details</h2>
                        <div class="firstformrow">
                            <label for="">PatientID:</label>
                            <input type="text" name="" id="" placeholder = "PatientID">
                            <label for="">Username: </label>
                            <input type="text" name="" placeholder="Username" id="">
                            
                           <label for="">Title:</label>  <select name="" id="">
                                <option value="">Title</option>
                                <option value="">Mr</option>
                                <option value="">Mrs</option>
                                <option value="">Master</option>
                            </select>
                            
                        </div>
    
                        <div class="fourthformrow">
                            <label for="">FirstName:</label> 
                            <input type="text" name="" placeholder="First Name" id="">
                            <label for="">MiddleName:</label>  
                            <input type="text"  name="" placeholder="Middle Name" id="">
            
                            
                        </div>
                        <div class="thirdformrow">
                            <label for="">LastName</label>
                            <input type="text" name="" placeholder="Last Name" id="">
                        
                            <label for="">Gender</label>
                            <select name="" id="">
                                <option value="">Gender</option>
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>                            
                        </div>

                        <div class = "thirdformrow">
                            <label for="">DateOfBirth</label>
                            <input type="date" name="" id="" placeholder= "Date of Birth">
                        </div>

                        <div class="_thirdformrow" >
                            <h2>Type of patient</h2>
                            <select name="" id="">
                                <option value="" id = "inpatient">Inpatient</option>
                                <option value="" id = "outpatient">Outpatient</option>
                            </select>
                            <!-- <input type="radio" name="" id="inpatient" value="inpatient">  Inpatient
                            <input type="radio" name="" id="outpatient" value="outpatient">Outpatient -->
                        </div>

                        
                        <div class="fourthformrow">
                            <label for="">HomeAddress: </label>
                            <input type="text" name="" placeholder="Home Address" id="">
                        </div>
                        
                        <div class="thirdformrow">
                            <label for="">UploadPicture:</label>
                            <input type="file" name="image" id="image">
                            <div class="micro" style="opacity: 0.9;padding-top: 17px; font-size: smaller;">
                            Please upload a square shaped image not more than 5mb </div>        
                        </div>

                        <div class="fifthformrow">
                            <label for="">City: </label>
                            <input type="text" name="" placeholder="City" id="">
                            <label for="">Country: </label>
                            <input type="text" name="" placeholder="Country" id="">
                            <label for="">ZipCode: </label>
                            <input type="text" name="" placeholder="Zip Code" id="">
                        </div>
                        <div class="sixthformrow">
                            <label for="">PhoneNo: </label>
                            <input type="text" name="" id="" placeholder="Phone Number">
                            <label for="">Occupation: </label>
                            <input type="text" name="" id="" placeholder="Occupation">
                        </div>
                        <div class="sixthformrow">
                            <label for="">CivilStatus: </label>
                            <select name="" id="">
                                <option value="">Married</option>
                                <option value="">Single</option>
                            </select>

                            <label for="">AccountType: </label>
                            <select name="" id="">
                                <option value="">Individual</option>
                                <option value="">Cooperate</option> 
                            </select>
                            
                        </div>
                        <div id="hide">
                            <input type="text" name="" id="" placeholder="Assigned Doctor ID">
                        </div>
    
                        <input id="one" type="button" value="Next">
                    </form>
                </div>

                    <!-- GUARDIAN DETAILS -->
                    <div id="sect2">
                        <form action="includes/insertPatient.php" enctype="multipart/form-data" method="POST" class="form-wrapper" >
                            <h2 style="color:black;">Step 2: Guardian Details</h2>
                            <div class="firstformrow">
                                <label for="">GuardianID:</label>
                                <input type="text" name="" id="" placeholder = "GuardianID">
                                <label for="">FirstName:</label> 
                                <input type="text" name="" placeholder="First Name" id="">
                                <label for="">MiddleName:</label> 
                                <input type="text"  name="" placeholder="Middle Name" id="">
                            </div>
        
                            <div class="secondformrow">
                                <label for="">LastName:</label> 
                                <input type="text" name="" placeholder="Last Name" id="">
                                <label for="">Gender:</label> 
                                <select name="" id="">
                                    <option value="">Gender</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                            
                            <div class="fourthformrow">
                                <label for="">HomeAddress:</label>
                                <input type="text" name="" placeholder="Home Address" id="">
                            </div>
                            
                            <div class="fifthformrow">
                                <label for="">PhoneNo:</label>
                                <input type="text" name="" id="" placeholder="Phone Number">
                                <label for="">Occupation:</label>
                                <input type="text" name="" id="" placeholder="Occupation">
                                <label for="">Relationtopatient: </label>
                                <input type="text" name="" id="" placeholder="Relation to Patient">
                            </div>
                            <input id="two"  type="button" value="Next">
                        </form>
                    </div>
                    
                    <!-- ADMISSION DETAILS -->
                    <div id="sect3">
                        <form action="includes/insertPatient.php" enctype="multipart/form-data" method="POST" class="form-wrapper" id="sect3">
                            <h2 style="color:black;">Step 3: Admission Details</h2>
                            <div class="firstformrow">
                                <label for="">AdmssionID</label>
                                <input type="text" name="" placeholder="AdmissionID" id="" readonly>
                                <label for="">PatientID</label>
                                <input type="text" name="" placeholder="PatientID" id="" readonly>
                                
                            </div>
        
                            <div class="secondformrow">
                                <label for="">GuardianID</label>
                                <input type="text" name="" placeholder="GuardianID" id="" readonly>
                                <label for="">AdmissionDate:</label>
                                <input type="date" name="" id="" placeholder="Admission Date" readonly>
                                <label for="">AdmissionTime:</label>
                                <input type="time" name="" id="" placeholder="Admission Time" readonly>
                            </div>
                            <div class="thirdformrow">
                                <label for="">Patient Status: </label>
                                <select name="" id="">
                                    <option value="">Accident</option>
                                    <option value="">Death</option>
                                    <option value="">Cancer</option>
                                    <option value="">Ailment</option>
                                    <option value="">Malaria</option>
                                </select>
        
                                
                            </div>
                            <div class="fourthformrow">
                                <!-- <label for="">ReasonforStatus: </label> -->
                                <textarea name="" id="" cols="30" rows="10" placeholder="Reason for status here..."></textarea>
                            </div>
                            
                            <div class="fifthformrow">
                                <label for="">AssignedDoctorID: </label>
                                <select name="" id="">
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                <label for="">AssignedDoctorName: </label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>
                                
                            </div>

                            <div class="fifthformrow">
                                <label for="">DepartmentID:</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>

                                <label for="">DepartmentName:</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="fifthformrow">
                                <label for="">WardID:</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>

                                <label for="">WardName:</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>

                                <label for="">RoomID:</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="fifthformrow">
                                <textarea name="" id="" cols="30" rows="10" placeholder="Additional notes here..."></textarea>
                            </div>
                            <input id="three"  type="button" value="Register Patient">
                        </form>
                    </div>
                
            </div>
            
        </div>
    </nav>

    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        function hide(){
              $('#left-sidebar').toggleClass("display");
        }
        
    </script>
</body>
</html>