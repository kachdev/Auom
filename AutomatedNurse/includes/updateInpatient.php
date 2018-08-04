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
        echo $date = mysqli_real_escape_string($connect, $_POST['date']);
        echo $occupation = mysqli_real_escape_string($connect, $_POST['occupation']);
        echo $status = mysqli_real_escape_string($connect, $_POST['status']);
        echo $blood = mysqli_real_escape_string($connect, $_POST['blood']);
        echo $kin = mysqli_real_escape_string($connect, $_POST['kin']);
        echo $kinphone = mysqli_real_escape_string($connect, $_POST['kphone']);

        if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)
         || empty($gender) || empty($phone) || empty($address) || empty($date) || empty($occupation) || empty($status) 
         || empty($blood) || empty($kin) || empty($kinphone)){
             
            header("Location:  ../view_inpatient.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $first) || !preg_match("/^[a-zA-Z*S]/", $last)){
                header("Location: ../view_inpatient.php?signup=invalid values");
                exit();
            }

            else {
                // CHECK IF EMAIL IS VALID
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../view_inpatient.php?signup=invalid email");
                    exit();
                }
                
                else {
                    $sql = "SELECT * FROM t_inpatient WHERE InpatientID = '$user'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    //CHECKING FOR USERNAME ERRORS
                    if($resultcheck > 0){
                        header("Location: ../view_inpatient.php?signup=username taken");
                        exit();
                    }
                        else {
                            //HASHING THE PASSWORD
                            $hashedpwd = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

                            //INSERTING USER INTO THE DATABASE

                            $sql = "UPDATE `t_inpatient` SET `inp_firstname`= '$first',`inp_lastname`='$last',
                                    `inp_username`='$user',`inp_email`='$email',`inp_gender`='$gender',
                                    `inp_phoneno`='$phone',`inp_address`='$address',`inp_birthdate`='$date',
                                     `inp_occupation`='$occupation', `inp_maritalstatus`='$status', `inp_bloodgroup`='$blood',
                                      `inp_kin`='$kin', `inp_kinno`='$kinphone' WHERE InpatientID = '".$_POST['inp_id']."'";
                            var_dump($sql);
                            mysqli_query($connect, $sql);
                            header("Location: ../view_inpatient.php?signup=success");
                            exit();
                        }
                }
            }
        }
        
     }else{
        header("Location: ../view_inpatient.php");
        exit();
    }

?>  