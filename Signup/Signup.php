<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $myfile = simplexml_load_file('../DataBase/user.xml');

    $user = $myfile->addChild('USER');
    $user->addChild('NAME',$name);
    $user->addChild('EMAIL',$email);
    $user->addChild('PASSWORD',$password);

    $myfile->asXML('../DataBase/user.xml');

    header('location: /Signup/Signup.html');
    exit();
?>