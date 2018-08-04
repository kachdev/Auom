<?php
    require_once('connect.php');
    if (isset($_POST['update-password'])) {
        
        
        $oldPass = mysqli_real_escape_string($connect, $_POST['old_password']);
        $newPass = mysqli_real_escape_string($connect, $_POST['new_password']);
        $verPass = mysqli_real_escape_string($connect, $_POST['ver_password']);

        //ERROR HANDLERS
        //CHECK IF THE INPUTS ARE EMPTY

        if (empty($oldPass) || empty($newPass) || empty($verPass)) {
            header("Location: ../pharmacistlogin.php?Login=empty");
            exit();

        }
        else {
            $sql = "SELECT * FROM t_pharmacist WHERE PharmacistID = ".$_SESSION['ph_id']."";
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
                    $hashedpwdcheck = password_verify($oldPass, $row['ph_password']);

                    //PASSWORD MATCHING ERROR
                    if ($hashedpwdcheck == false) {
                        header("Location: ../pharmacistlogin.php?Password Login=error");
                        exit();
                    }
                    elseif ($hashedpwdcheck == true) {
                        if($newPass == $verPass){
                            $newPass = password_hash($newPass, PASSWORD_DEFAULT, ['cost'=>10]);
                            $connect->query("UPDATE t_pharmacist SET ph_password = '$newPass' WHERE PharmacistID = ".$_SESSION['ph_id'])."";
                            header("Location: ../pharmacist.php? Password Updated Successfully!!");
                            exit();
                        }
                    }

                }
            }
        }
        

    }
    else {
        header("Location: pharmacistlogin.php?Login=login error");
        exit();
    }