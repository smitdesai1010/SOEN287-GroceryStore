<?php
    session_start();

    if ($_SESSION['role'] == 'ADMIN')
        echo readfile('administration.html');

    else if ($_SESSION['role'] == 'USER')
        echo "<script> 
                alert('Users are not allowed to access the admin page'); 
                history.back() 
              </script>";
    
    else if ($_SESSION['role'] == '')
        echo "<script> 
                alert('You must login'); 
                history.back() 
              </script>";
?>