<?php

    if (isset($_POST['submit'])) {
        session_destroy();
        header("Location: ../doctorlogin.php");
        exit();
    }