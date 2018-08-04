<?php
require_once('connect.php');    
    if (isset($_POST['update-medcat'])) {

        $name = mysqli_real_escape_string($connect, $_POST['medicatname']);
        $desc = mysqli_real_escape_string($connect, $_POST['meddescription']);

        if(empty($name) || empty($desc)){
            header("Location:  ../medicine_category.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $name) || !preg_match("/^[a-zA-Z*S]/", $desc)){
                header("Location: ../medicine_category.php?signup=invalid values");
                exit();
            }

            else {

                //INSERTING USER INTO THE DATABASE

                $sql = "UPDATE t_medicine_category SET m_medicine_category_name = '$name', m_medicine_description = '$desc'
                WHERE  	medicine_categoryID = '".$_POST['medcat_id']."'";
                //var_dump($sql);
                //echo $sql;
                mysqli_query($connect, $sql);
                header("Location: ../medicine_category.php?sigphp=success");
                exit();
            }
          
        
            }

    } 
     else{
        header("Location: ../medicine_category.php");
        exit();
    }

?>   