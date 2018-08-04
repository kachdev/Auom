<?php

    require('connect.php');
    
    $query = "DELETE FROM t_inpatient WHERE InpatientID ='".$_POST['inp_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"user deleted";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>