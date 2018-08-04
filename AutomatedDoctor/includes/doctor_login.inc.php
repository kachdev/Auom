<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        
        
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($user) || empty($pass)) {
            header("Location: ../doctorlogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_doctor WHERE d_username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../doctorlogin.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($pass, $row['d_password']);

                    //PASSWORD MATCHING ERROR
                    if ($pass == false) {
                        header("Location: ../doctorlogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($pass == true) {
                        //LOGIN THE USER HERE INTO THE WEBSITE
                        $_SESSION['doc_id'] = $row['DoctorID'];
                        $_SESSION['doc_first'] = $row['d_firstname'];
                        $_SESSION['doc_last'] = $row['d_lastname'];
                        $_SESSION['doc_uname'] = $row['d_username'];
                        $_SESSION['doc_email'] = $row['d_email'];
                        $_SESSION['doc_gender'] = $row['d_gender'];
                        $_SESSION['doc_phoneno'] = $row['d_phoneno'];
                        $_SESSION['doc_address'] = $row['d_address'];
                        $_SESSION['doc_department'] = $row['d_department'];
                        $_SESSION['doc_profile'] = $row['d_profile'];
                        
                        header("Location: ../doctor.php");
                        // exit();
                    }

                }
            }
        }
        





    }
    else {
        header("Location: doctorlogin.php?Login=login error");
        exit();
    }