<?php
require_once('connect.php');

if(isset($_POST['allot_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_bed WHERE BedallotmentID=".$_POST['allot_id'].""));
    echo json_encode($fetch, true);
}

?>