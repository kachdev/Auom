<?php
require_once('connect.php');

if(isset($_POST['dep_id'])){
    $fetch = mysqli_fetch_assoc($connect->query("SELECT * FROM t_department WHERE DepartmentID=".$_POST['dep_id'].""));
    echo json_encode($fetch, true);
}

?>