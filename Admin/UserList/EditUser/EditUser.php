<?php

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$user_role = $_POST['mode'];




$myfile = simplexml_load_file('../../../DataBase/user.xml');
$ispresent = false;


//----------Check if the given record exists-----------
foreach ($myfile->USER as $user) {   
    if (trim($user->EMAIL) == $user_email) {
        $ispresent = true;

        $user->addChild('NAME', $user_name);
        $user->addChild('EMAIL', $user_email);
        $user->addChild('PASSWORD', $user_password);
        $user->addChild('ROLE', $user_role);
        $myfile->asXML('../../../DataBase/user.xml');
        header('location: /Admin/UserList/UserList.php');
        exit();
        break;
    }
}

//-----------------------------------------------------

// if (!$ispresent) {

//     $user = $myfile->$users->addChild('USER');
//     $user->addChild('NAME', $user_name);
//     $user->addChild('EMAIL', $user_email);
//     $user->addChild('PASSWORD', $user_password);
//     $user->addChild('ROLE', $user_role);

//     $myfile->asXML('../../../DataBase/user.xml');

//     header('location: /Admin/UserList/UserList.php');
//     exit();
// }
