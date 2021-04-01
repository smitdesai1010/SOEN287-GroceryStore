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
    
    $myfile = simplexml_load_file('../DataBase/user.xml');

    //----------Check if the given record exists-----------
    foreach ($myfile->USER as $user)
    {   
      if ( trim($user->EMAIL) == $email )
      {
        if ($redirect == 'user')
        header('location: /Signup/Signup.html/message=Profile already exists');
    
        else 
            header('location: /Admin/UserList/EditUser/EditUser.html?message=Profile already exists');
        exit();
      }  
    }    

    //-----------------------------------------------------
    
    $user = $myfile->addChild('USER');
    $user->addChild('NAME',$name);
    $user->addChild('EMAIL',$email);
    $user->addChild('PASSWORD',$password);
    $user->addChild('ROLE',$mode);

    $myfile->asXML('../DataBase/user.xml');
    
    if ($redirect == 'user')
        header('location: /Login/login.html');
    
    else 
        header('location: /Admin/UserList/EditUser/EditUser.html?message=Successfully added user');
    exit();
    

?>