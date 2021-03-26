<?php
    session_start();

    $post = file_get_contents('php://input');
    $json = json_decode($post,true);

    $myfile = simplexml_load_file('../DataBase/orders.xml');

    //Create a new order file
    $order = $myfile->ORDERS->addChild('ORDER');
    
    //set the order ID and increment the unique ID for next order
    $ID = $myfile->ID;
    $order->addChild('ID',$ID);
    $myfile->ID = $ID + 1;

    //Writing the user info
    $order->addChild('NAME',$_SESSION['user']);
    $order->addChild('EMAIL',$_SESSION['email']);

    //total amount considering $9 fixed tax  
    $total = 9; 

    //Adding products
    $products = $order->addChild('PRODUCTS');

    foreach ($json as  $key => $value)
    {   
        $prod = $products->addChild('PRODUCT');

        $prod->addChild('PRODUCTNAME',$key);
        $prod->addChild('PRICE',$value['price']);
        $prod->addChild('QUANTITY',$value['qty']);

        $total += $value['price']*$value['qty'];
    }

    $order->addChild('TAX',9);
    $order->addChild('TOTAL',$total);

    //Saving info to file
    $myfile->asXML('../DataBase/orders.xml');
?>