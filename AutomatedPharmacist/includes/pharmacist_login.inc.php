<?php
    require_once('connect.php');
    if (isset($_POST['submit'])) {
        
        
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($user) || empty($pass)) {
            header("Location: ../pharmacistlogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_pharmacist WHERE ph_username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../pharmacistlogin.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($pass, $row['ph_password']);

                    //PASSWORD MATCHING ERROR
                    if ($hashedpwdcheck == false) {
                        header("Location: ../pharmacistlogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($hashedpwdcheck == true) {
                        //LOGIN THE USER HERE INTO THE WEBSITE
                        $_SESSION['ph_id'] = $row['PharmacistID'];
                        $_SESSION['ph_first'] = $row['ph_firstname'];
                        $_SESSION['ph_last'] = $row['ph_lastname'];
                        $_SESSION['ph_uname'] = $row['ph_username'];
                        $_SESSION['ph_email'] = $row['ph_email'];
                        $_SESSION['ph_gender'] = $row['ph_gender'];
                        $_SESSION['ph_phoneno'] = $row['ph_phoneno'];
                        $_SESSION['ph_address'] = $row['ph_address'];
                        
                        header("Location: ../pharmacist.php");
                        exit();
                    }

                }
            }
        }
        

    }
    else {
        header("Location: pharmacistlogin.php?Login=login error");
        exit();
    }