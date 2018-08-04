<?php
require_once('connect.php');

if(isset($_POST['medcat_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_medicine_category WHERE medicine_categoryID=".$_POST['medcat_id'].""));
    echo json_encode($fetch, true);
}

?>