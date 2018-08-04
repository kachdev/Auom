<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

        $first = mysqli_real_escape_string($connect, $_POST['fname']);
        $last = mysqli_real_escape_string($connect, $_POST['lname']);
        $user = mysqli_real_escape_string($connect, $_POST['uname']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $gender = mysqli_real_escape_string($connect, $_POST['gen']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $date = mysqli_real_escape_string($connect, $_POST['date']);
        $occupation = mysqli_real_escape_string($connect, $_POST['occupation']);
        $status = mysqli_real_escape_string($connect, $_POST['status']);
        $blood = mysqli_real_escape_string($connect, $_POST['blood']);
        $kin = mysqli_real_escape_string($connect, $_POST['kin']);
        $kinphone = mysqli_real_escape_string($connect, $_POST['kphone']);

        if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)
         || empty($gender) || empty($phone) || empty($address) || empty($date) || empty($occupation) || empty($status) 
         || empty($blood) || empty($kin) || empty($kinphone)){
             
            header("Location:  ../manage_inpatient.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $first) || !preg_match("/^[a-zA-Z*S]/", $last)){
                header("Location: ../manage_inpatient.php?signup=invalid values");
                exit();
            }

            else {
                // CHECK IF EMAIL IS VALID
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../manage_inpatient.php?signup=invalid email");
                    exit();
                }
                
                else {
                    $sql = "SELECT * FROM t_inpatient WHERE InpatientID = '$user'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    //CHECKING FOR USERNAME ERRORS
                    if($resultcheck > 0){
                        header("Location: ../manage_inpatient.php?signup=username taken");
                        exit();
                    }
                        else {
                            //HASHING THE PASSWORD
                            $hashedpwd = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

                            //INSERTING USER INTO THE DATABASE

                            $sql = "INSERT INTO t_inpatient (inp_firstname, inp_lastname, inp_username, inp_password,
                             inp_email, inp_gender, inp_phoneno, inp_address, inp_birthdate, inp_occupation, inp_maritalstatus, 
                             inp_bloodgroup, inp_kin, inp_kinno) VALUES('$first', '$last', '$user', '$hashedpwd', '$email', '$gender',
                              '$phone', '$address', '$date', '$occupation', '$status', '$blood', '$kin', '$kinphone');";
                            //var_dump($sql);
                            // echo $sql;
                            mysqli_query($connect, $sql);
                            header("Location: ../manage_inpatient.php?signup=success");
                            exit();
                        }
                }
            }
        }
        
     }else{
        header("Location: ../manage_inpatient.php");
        exit();
    }

?>  