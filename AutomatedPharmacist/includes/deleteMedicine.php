<?php

    require('connect.php');
    
    $query = "DELETE FROM t_medicine WHERE medicineID ='".$_POST['med_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"User deleted Successfully";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>