<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

        $first = mysqli_real_escape_string($connect, $_POST['fname']);
        $last = mysqli_real_escape_string($connect, $_POST['lname']);
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $gender = mysqli_real_escape_string($connect, $_POST['gen']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);

        if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)
         || empty($gender) || empty($phone) || empty($address)){
            header("Location:  ../manage_profile.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $first) || !preg_match("/^[a-zA-Z*S]/", $last)){
                header("Location: ../manage_profile.php?signup=invalid values");
                exit();
            }

            else {
                // CHECK IF EMAIL IS VALID
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../manage_profile.php?signup=invalid email");
                    exit();
                }
                
                else {
                    $sql = "UPDATE `t_pharmacist` SET `ph_firstname`= '$first',`ph_lastname`='$last',
                    `ph_username`='$user',`ph_email`='$email',`ph_gender`='$gender',
                    `ph_phoneno`='$phone',`ph_address`='$address' WHERE PharmacistID = '".$_SESSION['ph_id']."'";
                    var_dump($sql);
                    mysqli_query($connect, $sql);
                    header("Location: ../manage_profile.php?sigphp=success");
                    exit();
                }
            }
        }
        
     }else{
        header("Location: ../manage_profile.php");
        exit();
    }

?>  