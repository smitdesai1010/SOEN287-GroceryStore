<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mode = 'USER';
    $redirect = 'login';    //means added user from the Signup page

    if (isset($_POST['mode']))
    {
        $mode = $_POST['mode'];
        $redirect = 'admin';    //added user from the Admin page
    }

    echo $redirect;
    
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
        $user->addChild('ROLE',$mode);
    
        $myfile->asXML('../DataBase/user.xml');
    
        header('location: /Login/login.html');
        exit();
    }

?>