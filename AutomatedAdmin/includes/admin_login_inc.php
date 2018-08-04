<?php

    require_once('connect.php');
    if(isset($_POST['submit'])){

        $user = mysqli_real_escape_string($connect,$_POST['user']);
        $pass = mysqli_real_escape_string($connect, $_POST['pwd']);


        if(empty($user) || empty($pass)){
            header("Location: ../admin.php?Login field empty = empty");
            exit();

        }else{
            $sql = "SELECT * FROM admin WHERE username = '$user'";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);


            if($resultcheck < 1){
                header("Location: ../admin.php?Login = error");
                exit();
                

            }else{
                if($row = mysqli_fetch_assoc($result)){

                   $hashedpwdcheck = password_verify($pass, $row['password']);


                    if($pass == false){
                        header("Location: ../admin.php?Password Login = error");
                        exit();

                    }elseif($pass == true){

                        $_SESSION['ad_id'] = $row['adminid'];
                        $_SESSION['ad_first'] = $row['firstname'];
                        $_SESSION['ad_last'] = $row['lastname'];


                        header("Location: ../admin.php");
                        exit();
                    }
                }
            }
        }


    }
    else{
        header("Location: adminlogin.php?Login=login error");
        exit();
    }