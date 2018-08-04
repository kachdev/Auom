<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        
        
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($user) || empty($pass)) {
            header("Location: ../outpatientlogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_outpatient WHERE outp_username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../outpatientlogin.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($pass, $row['outp_password']);

                    //PASSWORD MATCHING ERROR
                    if ($pass == false) {
                        header("Location: ../outpatientlogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($pass == true) {
                        //LOGIN THE USER HERE INTO THE WEBSITE
                        $_SESSION['out_id'] = $row['OutpatientID'];
                        $_SESSION['out_first'] = $row['outp_firstname'];
                        $_SESSION['out_last'] = $row['outp_lastname'];
                        $_SESSION['out_uname'] = $row['outp_username'];
                        $_SESSION['out_email'] = $row['outp_email'];
                        $_SESSION['out_gender'] = $row['outp_gender'];
                        $_SESSION['out_phoneno'] = $row['outp_phoneno'];
                        $_SESSION['out_address'] = $row['outp_address'];
                        $_SESSION['out_date'] = $row['outp_birthdate'];
                        $_SESSION['out_occupation'] = $row['outp_occupation'];
                        $_SESSION['out_status'] = $row['outp_maritalstatus'];
                        $_SESSION['out_blood'] = $row['outp_bloodgroup'];
                        
                        header("Location: ../outpatient.php");
                        exit();
                    }

                }
            }
        }
        





    }
    else {
        header("Location: outpatientlogin.php?Login=login error");
        exit();
    }