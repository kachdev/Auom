<?php

    require('connect.php');
    
    $query = "DELETE FROM t_outpatient WHERE OutpatientID ='".$_POST['outp_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"user deleted";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>