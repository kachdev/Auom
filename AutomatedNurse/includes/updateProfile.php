<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

        echo $first = mysqli_real_escape_string($connect, $_POST['fname']);
        echo $last = mysqli_real_escape_string($connect, $_POST['lname']);
        echo $user = mysqli_real_escape_string($connect, $_POST['uname']);
        echo $pass = mysqli_real_escape_string($connect, $_POST['pwd']);
        echo $email = mysqli_real_escape_string($connect, $_POST['email']);
        echo $gender = mysqli_real_escape_string($connect, $_POST['gen']);
        echo $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        echo $address = mysqli_real_escape_string($connect, $_POST['address']);

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
                    $sql = "UPDATE `t_nurse` SET `nu_firstname`= '$first',`nu_lastname`='$last',
                    `nu_username`='$user',`nu_email`='$email',`nu_gender`='$gender',
                    `nu_phone`='$phone',`nu_address`='$address' WHERE NurseID = '".$_SESSION['nu_id']."'";
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