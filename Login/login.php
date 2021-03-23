<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 1;

    header("Location: /Login/login.html?status=$status");
    exit();
?>