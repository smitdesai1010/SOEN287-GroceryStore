<?php

    $name = "\t<NAME>" .$_POST['name'] ."</NAME>\n";
    $email = "\t<EMAIL>" .$_POST['email'] ."</EMAIL>\n";
    $password = "\t<PASSWORD>" .$_POST['password'] ."</PASSWORD>\n";
    
    $user = "<USER>\n" .$name .$email .$password ."</USER>";

    $myfile = fopen("../DataBase/user.xml", "a") or die("Unable to open file!");
    fwrite($myfile, "\n\n". $user);
    fclose($myfile);

    header('location: /Signup/Signup.html');
    //echo $user;
?>