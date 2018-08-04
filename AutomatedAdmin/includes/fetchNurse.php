<?php
require_once('connect.php');

if(isset($_POST['nu_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_nurse WHERE NurseID=".$_POST['nu_id'].""));
    echo json_encode($fetch, true);
}

?>