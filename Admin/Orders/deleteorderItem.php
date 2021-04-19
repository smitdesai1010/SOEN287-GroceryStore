<?php

    $post = file_get_contents('php://input');
    $json = json_decode($post,true);
    $deleteId = trim($json['orderId']);                                                                             
    $prodname = trim($json['productName']);
    
    $xml = new DOMDocument;
    $xml->load('../../DataBase/orders.xml');

    $database = $xml->documentElement;
    $OrderId = $database->getElementsByTagName("ID");
    $amountOfOrderId = $OrderId->length;
    $elementsToDelete = null;
    $priceTobeDeduced = 0;

    //first find the order using ID and
    //then find the product using title
    //then find price to be subtracted from the total price after removing this item
    //set the total price
    //delete this product
    for ($i = 0; $i < $amountOfOrderId; $i++)
    {  
        if (trim($OrderId[$i]->textContent) == $deleteId) 
        {
            $items = $OrderId[$i]->parentNode->getElementsByTagName("PRODUCTNAME");
            $itemLength = $items->length;
            
            for ($j = 0; $j < $itemLength; $j++)
                if ( trim($items[$j]->textContent) == $prodname )
                {
                    $elementToDelete = $items[$j]->parentNode;   
                    
                    $price = trim($elementToDelete->getElementsByTagName("PRICE")->item(0)->textContent);
                    $qty = trim($elementToDelete->getElementsByTagName("QUANTITY")->item(0)->textContent);
                    $priceTobeDeduced = $price * $qty;
                    break;
                }
              
                //if contains zero items after deletion, then delete the whole order
                if ($itemLength == 1)
                    $elementToDelete = $OrderId[$i]->parentNode;
                
                $totalOrderPrice = trim($OrderId[$i]->parentNode->getElementsByTagName("TOTAL")->item(0)->textContent);
                $OrderId[$i]->parentNode->getElementsByTagName("TOTAL")->item(0)->nodeValue = $totalOrderPrice - $priceTobeDeduced;
                
                break;
        }    
    }    
    
    $elementToDelete->parentNode->removeChild($elementToDelete);
    $xml->save('../../DataBase/orders.xml'); 

?>