<?php
    $user = 'root';
    $localhost = 'localhost';
    $password = '';
    $database = 'autopatient';

    $connect = mysqli_connect($localhost, $user, $password, $database) or die('No connection');

    mysqli_select_db($connect,$database) or die('No connection');
?>