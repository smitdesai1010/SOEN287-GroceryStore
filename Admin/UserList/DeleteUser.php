<?php
$email = $_POST["email"];;
$xml = new DOMDocument;
$xml->load('../../DataBase/user.xml');
$database = $xml->documentElement;

$users = $database->getElementsByTagName("EMAIL");
$amountOfUsers = $users->length;

$elementsToDelete = null;
for ($i = 0; $i < $amountOfUsers; $i++){
    
    if (trim($users[$i]->textContent)== $email) 
    
    $elementToDelete = $users[$i]->parentNode;   
}

$elementToDelete->parentNode->removeChild($elementToDelete);

$xml->save('../../DataBase/user.xml');