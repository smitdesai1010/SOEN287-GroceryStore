<?php 

$product_name = $_POST['ProductName'];
$description = $_POST['Description'];
$image_URL = $_POST['imageURL'];
$thumbnail_URL = $_POST['thumbnailURL'];
$category = $_POST['foodType'];
$price = $_POST['price'];
$specialPrice = $_POST['specialPrice'];
$onSpecial = $_POST['onSpecial'];

$myfile = simplexml_load_file('../../../DataBase/products.xml');
$ispresent = false;
#echo "Product type =: $category";

//----------Check if the given record exists-----------
foreach ($myfile->$category->PRODUCT as $product) {   #echo var_dump($product);
    if (trim($product->TITLE) == $product_name) {
        $ispresent = true;
        include('../deleteproduct.php');
        $product->addChild('TITLE', $product_name);
        $product->addChild('DESCRIPTION', $description);
        $product->addChild('IMAGE', $image_URL);
        $product->addChild('THUMBNAIL', $thumbnail_URL);
        $product->addChild('TYPE', $category);
        $product->addChild('PRICE', $price);
        $product->addChild('SPECIAL', $onSpecial);
        $product->addChild('SPECIALPRICE', $specialPrice);
        break;

        $myfile->asXML('../../../DataBase/products.xml');

        header('location: /Admin/ProductList/productlist.php');
        exit();
    }
}

//-----------------------------------------------------

if (!$ispresent) {
    echo "Creating!";
    $product = $myfile->$category->addChild('PRODUCT');
    $product->addChild('TITLE', $product_name);
    $product->addChild('DESCRIPTION', $description);
    $product->addChild('IMAGE', $image_URL);
    $product->addChild('THUMBNAIL', $thumbnail_URL);
    $product->addChild('TYPE', $category);
    $product->addChild('PRICE', $price);
    $product->addChild('SPECIAL', $onSpecial);
    $product->addChild('SPECIALPRICE', $specialPrice);

    $myfile->asXML('../../../DataBase/products.xml');

    header('location: /Admin/ProductList/productlist.php');
    exit();
}
