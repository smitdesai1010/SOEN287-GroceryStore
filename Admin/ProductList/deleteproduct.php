<?php
$title = $_POST["title"];

$xml = new DOMDocument;
$xml->load('../../DataBase/products.xml');
$database = $xml->documentElement;

$products = $database->getElementsByTagName("TITLE");
$amountOfProducts = $products->length;

$elementsToDelete = null;
for ($i = 0; $i < $amountOfProducts; $i++){
    if ($products[$i]->textContent == $title) 
    $elementToDelete = $products[$i]->parentNode;   
}

$elementToDelete->parentNode->removeChild($elementToDelete);

$xml->save('../../DataBase/products.xml');