<?php
    require_once('connect.php');
    if (isset($_POST['update-password'])) {
        
        
        $oldPass = mysqli_real_escape_string($connect, $_POST['old_password']);
        $newPass = mysqli_real_escape_string($connect, $_POST['new_password']);
        $verPass = mysqli_real_escape_string($connect, $_POST['ver_password']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($oldPass) || empty($newPass) || empty($verPass)) {
            header("Location: ../manage_profile.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_doctor WHERE DoctorID = ".$_SESSION['doc_id']."";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            //USERNAME ERROR MESSAGE 
            if ($resultcheck < 1) {
                header("Location: ../manage_profile.php?Login=error");
                exit();
            }

            else {
                if ($row = mysqli_fetch_assoc($result)) {
                    //DE-HASHING THE PASSWORD
                    $hashedpwdcheck = password_verify($oldPass, $row['d_password']);

                    //PASSWORD MATCHING ERROR
                    if ($hashedpwdcheck == false) {
                        header("Location: ../manage_profile.php?Password Login=error");
                        exit();
                    }
                    elseif ($hashedpwdcheck == true) {
                        if($newPass == $verPass){
                            $newPass = password_hash($newPass, PASSWORD_DEFAULT, ['cost'=>10]);
                            $connect->query("UPDATE t_doctor SET d_password = '$newPass' WHERE DoctorID = ".$_SESSION['doc_id'])."";
                            header("Location: ../doctor.php? Password Updated Successfully!!");
                            exit();
                        }
                    }

                }
            }
        }
        

    }
    else {
        header("Location: manage_profile.php?Login=login error");
        exit();
    }