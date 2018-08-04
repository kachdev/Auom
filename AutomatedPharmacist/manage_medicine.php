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
                    echo "<p> Welcome ".$_SESSION['ph_first']." ".$_SESSION['ph_last']."</p>";
                ?>
                </div>
                <div class="adminlogout-btn" >
                <?php
                    if (isset($_SESSION['ph_id'])) {
                        
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
        </div>
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
                <a href="medicine_category.php">
                    <i class="fa fa-edit "> </i>
                    <p>Medicine Category</p> 
                </a>
            </li>

            <li>
                <a class="current" href="manage_medicine.php">
                    <i class="fa fa-medkit "> </i>
                    <p>Manage Medicine</p> 
                </a>
            </li>

            <li>
                <a  href="manage_prescription.php">
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
                    Manage Medicine
                </div>
                <div class="tablelist">  
                    <div id="tab-hide1" class="table-tab" >
                        <li id="tab1" class="tab-one">
                            <a class="tab-on" href="">
                                <i class="fa fa-align-justify"></i>
                                <span>Medicine List</span>
                            </a>
                        </li>
                    
                        <li id="tab2" class="tab-two">
                            <a  href="">
                                <i class="fa fa-plus"></i>
                                <span>Add Medicine</span>
                            </a>
                        </li>
                    </div>

                    <div id="tab-hide2" class="table-tab" >
                        <li id="tab1" class="tab-one-new">
                            <a  class="tab-on" href="">
                                <i class="fa fa-square "></i>
                                <span >Medicine List</span>
                            </a>
                        </li>
                        
                        <li id="tab2" class="tab-two-new">
                            <div class="tab-two-new-content">
                                <a href="">
                                    <i class="fa fa-plus"></i>
                                    <span>Add Medicine</span>
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

                        <div id = "medicine">
                            <?php
                                if(isset($_POST['search'])){
                                    $name = $_POST['search'];
                                }else{ $name = ''; }
                                $query = "SELECT * FROM t_medicine WHERE CONCAT(me_medicine_name,' ',me_medicine_category ) LIKE '%$name%' ORDER BY medicineID ASC";

                                $response = @mysqli_query($connect,$query);

                                if ($response) {
                                    echo'<table id="mytable" border="1">
                                    <thead>
                                        <tr>
                                            <th>#<i class="fa fa-sort-up"></i></th>
                                            <th>S/N<i class="fa fa-sort-up"></i></th>
                                            <th>Medicine <br>Name <i class="fa fa-sort"></i></th>
                                            <th>Medicine <br> Category <i class="fa fa-sort"></i></th>
                                            <th>Description<i class="fa fa-sort"></i></th>
                                            <th>Price <i class="fa fa-sort"></i></th>
                                            <th>Manufacturing Company <i class = "fa fa-sort"></i></th>
                                            <th>Status <i class="fa fa-sort"></i></th>
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
                                    '<td>'.$row['me_medicine_name'].'</td>'.
                                    '<td>'.$row['me_medicine_category'].'</td>'.
                                    '<td>'.$row['me_description'].'</td>'.
                                    '<td>'.$row['me_price'].'</td>'.
                                    '<td>'.$row['me_manufacturing_company'].'</td>'.
                                    '<td>'.$row['me_status'].'</td>';
                                    echo'<td>
                                            <div class = "table_btns">
                                                <div class = "updatebtn" onClick="showUpdate(\''.$row['me_medicine_name'].'\',\''.$row['medicineID'].'\')" href="">
                                                    <i class="fa fa-wrench"></i>
                                                </div>    
                                                <div class="delbtn" onClick="showDelete(\''.$row['me_medicine_name'].'\',\''.$row['medicineID'].'\')" href="">
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
                        
                            <!-- <th>Manufacturing Company <br> <i class="fa fa-sort"></i></th> -->
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
                        <form class="adding-form" action="includes/insertMedicine.php" method="POST" enctype="multipart/form-data">
                            <div>
                                Medicine Name: <input type="text" name="medname" id="" placeholder = "medicine name">
                                Medicine Category:  <select name="category" id="">
                                    <option value="cough">Cough</option>
                                    <option value="headache">Headache</option>
                                    <option value="malaria">Malaria</option>
                                    <option value="fever">Fever</option>
                                    <option value="typhoid">Typhoid</option>
                                    <option value="hypertension">Hypertension</option>
                                    <option value="cancer">Cancer</option>
                                </select>
                            </div>

                            <div>
                               Description: <textarea name="description" id="" placeholder = "Enter Description" cols="30" rows="10"></textarea> 
                               
                            </div>

                            <div>
                                Price: <input type="text" name="price" id="" placeholder = "price">
                            </div>

                            <div>
                               Manufacturing Company: <input type="text" name="manufactcompany" id=""  placeholder = "manufacturing company">
                               
                            </div>

                            
                            <div>
                                Status: <input type="text" name="status" id="" placeholder = "status">
                            </div>

                            <div class="table-footer">
                                <div class="table-footer-btn">
                                    <input type="submit" name="submit" id="submit" value="Add Medicine">
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

                        
                            <!-- UPDATE MODAL -->
                    <div id = "success">

                    </div>
                    <div class = "update_invisible_drop"></div>
                        <div class = "update_prompt_box">
                        <button Onclick = "x_btn" id = "x_btn"><i class = "fa fa-times "></i></button>
                            <form class="adding-form" action="includes/updateMedicine.php" method="POST">
                                <input type="hidden" name="medicine_id" id="medicine_id" readonly required >
                                <div>
                                    Medicine Name: <input type="text" name="medname" id="medname_up" placeholder = "medicine name">
                                    Medicine Category:  <select name="category" id="category_up">
                                        <option value="cough">Cough</option>
                                        <option value="headache">Headache</option>
                                        <option value="malaria">Malaria</option>
                                        <option value="fever">Fever</option>
                                        <option value="typhoid">Typhoid</option>
                                        <option value="hypertension">Hypertension</option>
                                        <option value="cancer">Cancer</option>
                                    </select>
                                </div>

                                <div>
                                Description: <textarea name="description" id="description_up" placeholder = "Enter Description" cols="30" rows="10"></textarea> 
                                
                                </div>

                                <div>
                                    Price: <input type="text" name="price" id="price_up" placeholder = "price">
                                </div>

                                <div>
                                Manufacturing Company: <input type="text" name="manufactcompany" id="manufactcompany_up"  placeholder = "manufacturing company">
                                
                                </div>

                                
                                <div>
                                    Status: <input type="text" name="status" id="status_up" placeholder = "status">
                                </div>

                                <div class="table-footer">
                                    <div class="table-footer-btn">
                                        <button type="submit" name="submit" id="submit">Update Medicine Category</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>


                </div>                    
            </div>
       </div>
    </div>

    
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/medicine.js"></script>
    <script src="js/dycalendar.min.js"></script>
    <script>
        function hide(){
              $('#left-sidebar').toggleClass("display");
        }
    </script>
</body>
</html>