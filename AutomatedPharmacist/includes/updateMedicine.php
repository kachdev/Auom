<?php
require_once('connect.php');    
    if (isset($_POST['submit'])) {

        $medname = mysqli_real_escape_string($connect, $_POST['medname']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
        $desc = mysqli_real_escape_string($connect, $_POST['description']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $manufact = mysqli_real_escape_string($connect, $_POST['manufactcompany']);
        $status = mysqli_real_escape_string($connect, $_POST['status']);

        if(empty($medname) || empty($category) || empty($desc) || empty($price) || empty($manufact) || empty($status)){
            header("Location:  ../manage_medicine.php?signup=empty values");
            exit();
        }

        else {
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $medname) || !preg_match("/^[a-zA-Z*S]/", $category)){
                header("Location: ../manage_medicine.php?signup=invalid values");
                exit();
            }

            else {

                //INSERTING USER INTO THE DATABASE

                $sql = "UPDATE t_medicine SET me_medicine_name = '$medname', me_medicine_category = '$category',me_description = '$desc', me_price = '$price', 
                me_manufacturing_company = '$manufact', me_status = '$status' WHERE medicineID = '".$_POST['medicine_id']."'";
                var_dump($sql);
                mysqli_query($connect, $sql);
                echo $sql;
                header("Location: ../manage_medicine.php?update=success");
                exit();
            }
          
        
            }

    } 
     else{
        header("Location: ../manage_medicine.php");
        exit();
    }

?>  