<?php

    mysql_connect("localhost", "root", "");
    mysql_select_db("autopatient");
    
    
    $DoctorID = $_POST['DoctorID'];
    $first = $_POST['fname'];
    $last = $_POST['lname'];
    $usname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];
    $gender = $_POST['gen'];
    $phoneno = $_POST['phone'];
    $address = $_POST['address'];
    $dept = $_POST['dept'];
    $profile = $_POST['profile'];
    
    $query = "UPDATE t_doctor SET d_firstname = '$first', d_lastname = '$last', d_username = '$usname', d_password = '$pwd', 
    d_email = '$email', d_gender = '$gender', d_phoneno = '$phoneno', d_address = '$address', d_department = '$dept',
     d_profile = '$profile' WHERE DoctorID = '$DoctorID' ";
    
    // $response = @mysqli_query($connect, $query);
    
    
    if (mysql_query($query)) {
        echo "Updated Successfully";
    }else {
        echo "Error Updating data";
        echo mysqli_error($connect);
    }

