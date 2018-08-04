<?php

    require_once('connect.php');
    
    $query = "DELETE FROM t_noticeboard WHERE NoticeboardID ='".$_POST['notice_id']."'";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo"User deleted Successfully!";
    }
else{
    echo "error deleting user".mysqli_error($connect);
}

mysqli_close($connect);
?>