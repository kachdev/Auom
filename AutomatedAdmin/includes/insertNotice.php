<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $notice = mysqli_real_escape_string($connect, $_POST['notice']);
        $date = mysqli_real_escape_string($connect, $_POST['date']);

        if(empty($title) || empty($notice) || empty($date)){
            header("Location:  ../manage_noticeboard.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $title) || !preg_match("/^[a-zA-Z*S]/", $notice)){
                header("Location: ../manage_noticeboard.php?signup=invalid values");
                exit();
            }

            else {

                //INSERTING USER INTO THE DATABASE

                $sql = "INSERT INTO t_noticeboard (no_title, no_notice, no_date) 
                VALUES('$title', '$notice', '$date');";
                var_dump($sql);
                mysqli_query($connect, $sql);
                header("Location: ../manage_noticeboard.php?sigphp=success");
                exit();
            }
          
        
            }

    } 
     else{
        header("Location: ../manage_noticeboard.php");
        exit();
    }

?>  