<?php

    $product_name = $_POST['ProductName'];
    $description = $_POST['Description'];
    $image_URL = $_POST['imageURL'];
    $food_type = $_POST['foodType'];
    $vendor = $_POST['productVendor'];
    
    $myfile = simplexml_load_file('../../../DataBase/products.xml');
    $ispresent = false;

    //----------Check if the given record exists-----------
    foreach ($myfile->PRODUCT as $product)
    {   
      if ( trim($product->IMAGE) == $image_URL )
      {
          $ispresent = true;
          echo "<h2>Record already exist</h2>";
          break;
      }  
    }    

    //-----------------------------------------------------
    
    if (!$ispresent)
    {
        $product = $myfile->addChild('PRODUCT');
        $product->addChild('NAME', $product_name);
        $product->addChild('DESCRIPTION', $description);
        $product->addChild('IMAGE', $image_URL);
        $product->addChild('TYPE', $food_type);
        $product->addChild('VENDOR', $vendor);
    
        $myfile->asXML('../../../DataBase/products.xml');
    
        header('location: /ProductList/productlist.html');
        exit();
    }

?>