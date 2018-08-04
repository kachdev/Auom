<?php

    require('connect.php');
    
    $query = "DELETE FROM t_medicine_category WHERE medicine_categoryID ='".$_POST['medcat_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"user deleted";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>