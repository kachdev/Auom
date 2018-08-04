<?php

    require('connect.php');
    
    $query = "DELETE FROM t_bed WHERE BedID ='".$_POST['bed_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"Bed  deleted Successfully!";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>