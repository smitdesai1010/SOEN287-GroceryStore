<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $myfile = simplexml_load_file('../DataBase/user.xml');
    $ispresent = false;

    //----------Check if the given record exists-----------
    foreach ($myfile->USER as $user)
    {   
      if ( trim($user->EMAIL) == $email )
      {
          $ispresent = true;
          echo "<h2>Record already exist</h2>";
          break;
      }  
    }    

    //-----------------------------------------------------
    
    if (!$ispresent)
    {
        $user = $myfile->addChild('USER');
        $user->addChild('NAME',$name);
        $user->addChild('EMAIL',$email);
        $user->addChild('PASSWORD',$password);
    
        $myfile->asXML('../DataBase/user.xml');
    
        header('location: /Login/login.html');
        exit();
    }

?>