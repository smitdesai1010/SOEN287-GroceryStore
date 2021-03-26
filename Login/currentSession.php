<?php
    
    session_start();

    if ($_GET['action'] == 'logout')
        session_destroy();

    else if ($_GET['action'] == 'profile')
    {   
        if ( $_SESSION['user'] == '')
            echo "You are not logged in";

        else
            echo 'Name: '.$_SESSION['user'] .'  Role: '. $_SESSION['role'];  
    }    
?>