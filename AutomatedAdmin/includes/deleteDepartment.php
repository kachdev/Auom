<?php

    require('connect.php');
    
    $query = "DELETE FROM t_department WHERE DepartmentID ='".$_POST['dep_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Department deleted Successfully!!";
    }
else{
    echo "error deleting department".mysqli_error($connect);
}

mysqli_close($connect);
?>