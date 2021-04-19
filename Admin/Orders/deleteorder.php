<?php

    $post = file_get_contents('php://input');
    $json = json_decode($post,true);
    $deleteId = trim($json['orderId']);                                                                             
    
    $xml = new DOMDocument;
    $xml->load('../../DataBase/orders.xml');
    
    $database = $xml->documentElement;
    $OrderId = $database->getElementsByTagName("ID");
    $amountOfOrderId = $OrderId->length;
    $elementsToDelete = null;

    for ($i = 0; $i < $amountOfOrderId; $i++)
    {  
        if (trim($OrderId[$i]->textContent) == $deleteId) 
        {
            $elementToDelete = $OrderId[$i]->parentNode;   
            break;
        }    
    }    
    
    $elementToDelete->parentNode->removeChild($elementToDelete);
    $xml->save('../../DataBase/orders.xml'); 

?>