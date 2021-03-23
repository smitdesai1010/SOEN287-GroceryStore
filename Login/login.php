<?php

    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 0;
    $name;
    $myfile = simplexml_load_file('../DataBase/user.xml');

    foreach ($myfile->USER as $user)
    {
      
      //because the string has extra characters. Spent 1 hour for this :(
      $str = trim($user->EMAIL);    

      if ( $str == $email )
      {
          $status = 1;
          $name = trim($user->NAME);

          if ( trim($user->PASSWORD) == $password )
            $status = 2;

          break;
      }  
    }    
    
    header("Location: /Login/login.html?status=$status&name=$name");
    exit();
?>