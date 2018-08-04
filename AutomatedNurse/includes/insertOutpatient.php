<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

         $first = mysqli_real_escape_string($connect, $_POST['fname']);
         $last = mysqli_real_escape_string($connect, $_POST['lname']);
         $user = mysqli_real_escape_string($connect, $_POST['uname']);
         $pass = mysqli_real_escape_string($connect, $_POST['pwd']);
         $email = mysqli_real_escape_string($connect, $_POST['email']);
         $gender = mysqli_real_escape_string($connect, $_POST['gen']);
         $phone = mysqli_real_escape_string($connect, $_POST['phoneno']);
         $address = mysqli_real_escape_string($connect, $_POST['address']);
         $date = mysqli_real_escape_string($connect, $_POST['date']);
         $occupation = mysqli_real_escape_string($connect, $_POST['occupation']);
         $status = mysqli_real_escape_string($connect, $_POST['status']);
         $blood = mysqli_real_escape_string($connect, $_POST['blood']);

        if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)
         || empty($gender) || empty($phone) || empty($address) || empty($date) || empty($occupation) || empty($status) 
         || empty($blood)){
            header("Location:  ../view_outpatient.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $first) || !preg_match("/^[a-zA-Z*S]/", $last)){
                header("Location: ../view_outpatient.php?signup=invalid values");
                exit();
            }

            else {
                // CHECK IF EMAIL IS VALID
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../view_outpatient.php?signup=invalid email");
                    exit();
                }
                
                else {
                    $sql = "SELECT * FROM t_outpatient WHERE OutpatientID = '$user'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    //CHECKING FOR USERNAME ERRORS
                    if($resultcheck > 0){
                        header("Location: ../view_outpatient.php?signup=username taken");
                        exit();
                    }
                        else {
                            //HASHING THE PASSWORD
                            $hashedpwd = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

                            //INSERTING USER INTO THE DATABASE

                            $sql = "INSERT INTO t_outpatient (outp_firstname, outp_lastname, outp_username, outp_password,
                             outp_email, outp_gender, outp_phoneno, outp_address, outp_birthdate, outp_occupation, outp_maritalstatus, 
                             outp_bloodgroup) VALUES('$first', '$last', '$user', '$hashedpwd', '$email', '$gender', '$phone', '$address', '$date', '$occupation', '$status', '$blood');";
                            var_dump($sql);
                            mysqli_query($connect, $sql);
                            header("Location: ../view_outpatient.php?signup=success");
                            exit();
                        }
                }
            }
        }
        
     }else{
        header("Location: ../view_outpatient.php");
        exit();
    }

?>  