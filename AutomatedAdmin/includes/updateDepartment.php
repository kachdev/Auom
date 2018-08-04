<?php
    require_once ('connect.php');
    if (isset($_POST['submit'])) {

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
            }else{
                $sql = "UPDATE t_department SET dep_name = '$deptname', dep_description = '$deptdesc' WHERE DepartmentID = '".$_SESSION['DepartmentID']."'";
                $query = mysqli_query($connect, $sql);
                var_dump($query);
                // header("Location: ../manage_department.php?signup=success");
                // exit();
            }
        }
        


    }else{
        header("Location: ../manage_department.php");
        exit();
    }

?>  