<?php
require_once('connect.php');

if(isset($_POST['outp_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_outpatient WHERE OutpatientID=".$_POST['outp_id'].""));
    echo json_encode($fetch, true);
}

?>