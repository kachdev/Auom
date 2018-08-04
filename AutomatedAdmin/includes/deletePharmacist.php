<?php

    require_once('connect.php');
    
    $query = "DELETE FROM t_pharmacist WHERE PharmacistID ='".$_POST['pharma_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"User deleted Successfully!";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>