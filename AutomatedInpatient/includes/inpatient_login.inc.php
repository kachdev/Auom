<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        
        
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($user) || empty($pass)) {
            header("Location: ../inpatientlogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_inpatient WHERE inp_username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../inpatientlogin.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($pass, $row['inp_password']);

                    //PASSWORD MATCHING ERROR
                    if ($pass == false) {
                        header("Location: ../inpatientlogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($pass == true) {
                        //LOGIN THE USER HERE INTO THE WEBSITE
                        $_SESSION['in_id'] = $row['InpatientID'];
                        $_SESSION['in_first'] = $row['inp_firstname'];
                        $_SESSION['in_last'] = $row['inp_lastname'];
                        $_SESSION['in_uname'] = $row['inp_username'];
                        $_SESSION['in_email'] = $row['inp_email'];
                        $_SESSION['in_gender'] = $row['inp_gender'];
                        $_SESSION['in_phoneno'] = $row['inp_phoneno'];
                        $_SESSION['in_address'] = $row['inp_address'];
                        $_SESSION['in_date'] = $row['inp_birthdate'];
                        $_SESSION['in_occupation'] = $row['inp_occupation'];
                        $_SESSION['in_status'] = $row['inp_maritalstatus'];
                        $_SESSION['in_blood'] = $row['inp_bloodgroup'];
                        
                        header("Location: ../inpatient.php");
                        exit();
                    }

                }
            }
        }
        





    }
    else {
        header("Location: inpatientlogin.php?Login=login error");
        exit();
    }