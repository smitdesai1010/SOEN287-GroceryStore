<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 1;

    $xml = simplexml_load_file('../DataBase/user.xml');

    echo var_dump($xml);

    // header("Location: /Login/login.html?status=$status");
    // exit();
?>