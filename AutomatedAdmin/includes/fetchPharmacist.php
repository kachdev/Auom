<?php
require_once('connect.php');

if(isset($_POST['ph_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_pharmacist WHERE pharmacistID=".$_POST['ph_id'].""));
    echo json_encode($fetch, true);
}

?>