<?php
require_once('connect.php');

if(isset($_POST['inp_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_inpatient WHERE InpatientID=".$_POST['inp_id'].""));
    echo json_encode($fetch, true);
}

?>