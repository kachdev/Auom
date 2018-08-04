<?php
require_once('connect.php');

if(isset($_POST['bed_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_bed WHERE BedID=".$_POST['bed_id'].""));
    echo json_encode($fetch, true);
}

?>