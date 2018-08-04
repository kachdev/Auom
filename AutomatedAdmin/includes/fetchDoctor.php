<?php
require_once('connect.php');

if(isset($_POST['doc_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_doctor WHERE DoctorID=".$_POST['doc_id'].""));
    echo json_encode($fetch, true);
}

?>