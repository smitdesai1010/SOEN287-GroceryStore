<?php
$name = $_POST["name"];

$xml = new DOMDocument;
$xml->load('../../DataBase/user.xml');
$database = $xml->documentElement;

$users = $database->getElementsByTagName("NAME");
$amountOfUsers = $users->length;

$elementsToDelete = null;
for ($i = 0; $i < $amountOfUsers; $i++){
    if ($users[$i]->textContent == $name) 
    $elementToDelete = $users[$i]->parentNode;   
}

$elementToDelete->parentNode->removeChild($elementToDelete);

$xml->save('../../DataBase/user.xml');