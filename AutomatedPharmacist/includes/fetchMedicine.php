<?php
require_once('connect.php');

if(isset($_POST['med_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_medicine WHERE medicineID=".$_POST['med_id'].""));
    echo json_encode($fetch, true);
}

?>