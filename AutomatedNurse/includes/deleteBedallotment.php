<?php

    require('connect.php');
    
    $query = "DELETE FROM t_bedallotment WHERE BedallotmentID ='".$_POST['bedallot_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"Bed Allotment deleted Successfully!";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>