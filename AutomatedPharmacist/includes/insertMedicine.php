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

                $sql = "INSERT INTO t_medicine (me_medicine_name, me_medicine_category, me_description, me_price, me_manufacturing_company, me_status) 
                VALUES('$medname','$category', '$desc', '$price', '$manufact', '$status');";
                var_dump($sql);
                mysqli_query($connect, $sql);
                header("Location: ../manage_medicine.php?insertion=success");
                exit();
            }
          
        
            }

    } 
     else{
        header("Location: ../manage_medicine.php");
        exit();
    }

?>  