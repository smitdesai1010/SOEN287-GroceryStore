<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 0;
    $name;
    $role;
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
          {
            $status = 2;
            $role = trim($user->ROLE);

            //Setting the sessions variable once a user logs in
            $_SESSION['user'] = trim( (string)$user->NAME );
            $_SESSION['role'] = trim( (string)$user->ROLE );
          }

          break;
      }  
    }    
    
    header("Location: /Login/login.html?status=$status&name=$name&role=$role");
    exit();
?>