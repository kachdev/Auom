<?php

    require('connect.php');
    
    $query = "DELETE FROM t_doctor WHERE DoctorID ='".$_POST['doc_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"user deleted";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>