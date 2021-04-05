<?php

    $product_name = $_POST['ProductName'];
    $description = $_POST['Description'];
    $image_URL = $_POST['imageURL'];
    $category = $_POST['foodType'];
    $vendor = $_POST['productVendor'];
    
    $myfile = simplexml_load_file('../../../DataBase/products.xml');
    $ispresent = false;
    #echo "Product type =: $category";
    
    //----------Check if the given record exists-----------
    foreach ($myfile->$category->PRODUCT as $product)
    {   #echo var_dump($product);
      if ( trim($product->TITLE) == $product_name )
      {
          $ispresent = true;
          echo "<h2>Record already exist</h2>";
          break;
      }  
    }    

    //-----------------------------------------------------
    
    if (!$ispresent)
    {
        $product = $myfile->$category->addChild('PRODUCT');
        $product->addChild('NAME', $product_name);
        $product->addChild('DESCRIPTION', $description);
        $product->addChild('IMAGE', $image_URL);
        $product->addChild('TYPE', $category);
        $product->addChild('VENDOR', $vendor);
    
        $myfile->asXML('../../../DataBase/products.xml');
    
        header('location: /Admin/ProductList/productlist.html');
        exit();
    }

?>