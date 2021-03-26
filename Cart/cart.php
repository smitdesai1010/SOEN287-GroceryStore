<?php
    $post = file_get_contents('php://input');
    $json = json_decode($post);

    echo var_dump($json);
?>