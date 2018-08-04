<?php
    
    if (isset($_POST['submit'])) {
        include_once 'connect.php';

        $deptname = mysqli_real_escape_string($connect, $_POST['deptname']);
        $deptdesc = mysqli_real_escape_string($connect, $_POST['deptdesc']);

        if(empty($deptname) || empty($deptdesc)){
            header("Location:  ../manage_department.php?signup=empty values");
            exit();
        }
        else {
            
            if(!preg_match("/^[a-zA-Z*S]/", $deptname) || !preg_match("/^[a-zA-Z*S]/", $deptdesc)){
                header("Location: ../manage_department.php?signup=invalid values");
                exit();
            }
            else{
                $sql = "INSERT INTO t_department (dep_name, dep_description) VALUES('$deptname', '$deptdesc');";
                mysqli_query($connect, $sql);
                header("Location: ../manage_department.php?signup=success");
                exit();
            }
        }
        


    }else{
        header("Location: ../manage_department.php");
        exit();
    }

//     require_once 'connect.php';
    
//     $name = $_POST['deptname'];
//     $desc = $_POST['deptdesc'];

//     if (empty($name) || empty($desc)) {
//        header("Location: ../manage_department.php?signup=empty");
//        exit();
//    }
//     $query = "INSERT INTO t_department (dep_name, dep_description) VALUES('$name', '$desc')";

//     $result = mysqli_query($connect, $query);
    
//     if ($result) {
//         header("Location: ../manage_department.php?signup=success");
//         exit();
//     }
//     else {
//         echo "Error inserting record: " .mysqli_error($connect);
//     }
// mysqli_close($connect);
?>  