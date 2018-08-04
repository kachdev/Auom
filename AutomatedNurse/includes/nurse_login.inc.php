<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        
        
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($user) || empty($pass)) {
            header("Location: ../nurselogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_nurse WHERE nu_username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../nurselogin.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($pass, $row['nu_password']);

                    //PASSWORD MATCHING ERROR
                    if ($pass == false) {
                        header("Location: ../nurselogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($pass == true) {
                        //LOGIN THE USER HERE INTO THE WEBSITE
                        $_SESSION['nu_id'] = $row['NurseID'];
                        $_SESSION['nu_first'] = $row['nu_firstname'];
                        $_SESSION['nu_last'] = $row['nu_lastname'];
                        $_SESSION['nu_uname'] = $row['nu_username'];
                        $_SESSION['nu_email'] = $row['nu_email'];
                        $_SESSION['nu_gender'] = $row['nu_gender'];
                        $_SESSION['nu_phoneno'] = $row['nu_phoneno'];
                        $_SESSION['nu_address'] = $row['nu_address'];
                        
                        header("Location: ../nurse.php");
                        exit();
                    }

                }
            }
        }
        





    }
    else {
        header("Location: nurselogin.php?Login=login error");
        exit();
    }