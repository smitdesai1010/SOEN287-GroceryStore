<?php
    session_start();

    if ($_SESSION['role'] == 'ADMIN')
        echo readfile('administration.html');

    else if ($_SESSION['role'] == 'USER')
        echo "Users are not allowed to access the admin page";
    
    else if ($_SESSION['role'] == '')
        echo "You must login";
?>