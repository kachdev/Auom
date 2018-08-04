<?php

    require('connect.php');
    
    $query = "DELETE FROM t_nurse WHERE NurseID ='".$_POST['nurse_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"User deleted Successfully!";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>