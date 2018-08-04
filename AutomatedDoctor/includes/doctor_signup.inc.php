<?php

    if(isset($_POST['submit'])){

        include_once 'connect.php';

        $first = mysqli_real_escape_string($connect, $_POST['fname']);
        $last = mysqli_real_escape_string($connect, $_POST['lname']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $usname = mysqli_real_escape_string($connect, $_POST['uname']);
        $pwd = mysqli_real_escape_string($connect, $_POST['pwd']);
        $confm_pwd = mysqli_real_escape_string($connect, $_POST['cfm_pwd']);

        // ERROR HANDLERS
        // CHECK FOR EMPTY FIELDS

        if (empty($first) || empty($last) || empty($email) || empty($usname) || empty($pwd) || empty($confm_pwd)) {
            header("Location: ../doctorregister.php?signup=empty");
            exit();
        }
        //VALIDATION LARGER ELSE
        else {
            //CHECK IF THE INPUT CHARACTERS ARE VALID
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                header("Location: ../doctorregister.php?signup=invalid input");
                exit();
            }
            else {
                //CHECK IF EMAIL IS VALID
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../doctorregister.php?signup=invalid email");
                    exit();
                }
                else {
                    //USERNAME VALIDATION
                    $sql = "SELECT * FROM doctorregistration WHERE d_username = '$usname'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysql_num_rows($result);

                    //USERNAME ERROR MESSAGE 
                    if ($resultcheck > 0) {
                        header("Location: ../doctorregister.php?signup=username taken");
                        exit();
                    }
                    else {
                        //HASHING THE PASSWORD
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                        //INSERT USER DETAILS INTO THE DATABASE
                        $sql = "INSERT INTO doctorregistration (d_firstname, d_lastname, d_email, d_username, d_password) VALUES  ('$first','$last','$email','$usname','$hashedPwd');";
                        mysqli_query($connect, $sql);
                        header("Location: ../doctorregister.php?signup=success");
                        exit();
                    }
                }
            }
        }

    }
    else {
        header("Location: doctorregister.php");
        exit();
    }