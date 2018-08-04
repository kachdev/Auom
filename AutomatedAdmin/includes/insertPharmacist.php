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
        $dept = mysqli_real_escape_string($connect, $_POST['dept']);

        if(empty($first) || empty($last) || empty($user) || empty($pass) || empty($email)
         || empty($gender) || empty($phone) || empty($address)){
            header("Location:  ../manage_pharmacist.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $first) || !preg_match("/^[a-zA-Z*S]/", $last)){
                header("Location: ../manage_pharmacist.php?signup=invalid values");
                exit();
            }

            else {
                // CHECK IF EMAIL IS VALID
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: ../manage_pharmacist.php?signup=invalid email");
                    exit();
                }
                
                else {
                    $sql = "SELECT * FROM t_pharmacist WHERE PharmacistID = '$user'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);
                    //CHECKING FOR USERNAME ERRORS
                    if($resultcheck > 0){
                        header("Location: ../manage_pharmacist.php?signup=username taken");
                        exit();
                    }
                        else {
                            //HASHING THE PASSWORD
                            $hashedpwd = password_hash($pass, PASSWORD_DEFAULT, ['cost'=>10]);

                            //INSERTING USER INTO THE DATABASE

                            $sql = "INSERT INTO t_pharmacist (ph_firstname, ph_lastname, ph_username, ph_password, ph_email, ph_gender, ph_phoneno, ph_address) 
                            VALUES('$first', '$last', '$user', '$hashedpwd', '$email', '$gender', '$phone', '$address');";
                            var_dump($sql);
                            mysqli_query($connect, $sql);
                            header("Location: ../manage_pharmacist.php?sigphp=success");
                            exit();
                        }
                }
            }
        }
        
     }else{
        header("Location: ../manage_pharmacist.php");
        exit();
    }

?>  