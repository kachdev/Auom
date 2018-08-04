<?php

    if(isset($_POST['submit'])){

        include_once 'connect.php';

        $first = mysqli_real_escape_string($connect, $_POST['fname']);
        $last = mysqli_real_escape_string($connect, $_POST['lname']);
        $usname = mysqli_real_escape_string($connect, $_POST['uname']);
        $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $gender = mysqli_real_escape_string($connect, $_POST['gen']);
        $phoneno = mysqli_real_escape_string($connect, $_POST['phone']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);

        // ERROR HANDLERS
        // CHECK FOR EMPTY FIELDS

        if (empty($first) || empty($last) || empty($usname) || empty($pwd) || empty($email)  ||  empty($gender)  
        || empty($phoneno) || empty($address)) {
            header("Location: ../manage_nurse.php?signup=empty");
            exit();
        }
        //VALIDATION LARGER ELSE
        else {
            //CHECK IF THE INPUT CHARACTERS ARE VALID
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../manage_nurse.php?signup=invalid input");
                exit();
            }
            else {
                //CHECK IF EMAIL IS VALID
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../manage_nurse.php?signup=invalid email");
                    exit();
                }
                else {
                    //USERNAME VALIDATION
                    $sql = "SELECT * FROM t_nurse WHERE nu_username = '$usname'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysql_num_rows($result);

                    //USERNAME ERROR MESSAGE 
                    if ($resultcheck > 0) {
                        header("Location: ../manage_nurse.php?signup=username taken");
                        exit();
                    }
                    else {
                        //HASHING THE PASSWORD
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                        //INSERT USER DETAILS INTO THE DATABASE
                        $sql = "INSERT INTO t_nurse (nu_firstname, nu_lastname, nu_username, nu_password, nu_email, nu_gender, nu_phoneno, nu_address) VALUES  ('$first','$last','$usname','$hashedPwd','$email', '$gender', '$phoneno', '$address');";
                        mysqli_query($connect, $sql);
                        header("Location: ../manage_nurse.php?signup=success");
                        exit();
                    }
                }
            }
        }

    }
    else {
        header("Location: manage_nurse.php");
        exit();
    }

