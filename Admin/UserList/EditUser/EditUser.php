<?php

$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$user_role = $_POST['mode'];


// $product_name = $_POST['ProductName'];
// $description = $_POST['Description'];
// $image_URL = $_POST['imageURL'];
// $thumbnail_URL = $_POST['thumbnailURL'];
// $category = $_POST['foodType'];
// $price = $_POST['price'];
// $specialPrice = $_POST['specialPrice'];
// $onSpecial = $_POST['onSpecial'];

$myfile = simplexml_load_file('../../../DataBase/user.xml');
$ispresent = false;
#echo "Product type =: $category";

//----------Check if the given record exists-----------
foreach ($myfile->$users->USER as $user) {   #echo var_dump($product);
    if (trim($user->NAME) == $user_name) {
        $ispresent = true;

        $user->addChild('EMAIL', $user_email);
        $user->addChild('PASSWORD', $user_password);
        $user->addChild('ROLE', $user_role);

        // $product->addChild('DESCRIPTION', $description);
        // $product->addChild('IMAGE', $image_URL);
        // $product->addChild('THUMBNAIL', $thumbnail_URL);
        // $product->addChild('TYPE', $category);
        // $product->addChild('PRICE', $price);
        // $product->addChild('SPECIAL', $onSpecial);
        // $product->addChild('SPECIALPRICE', $specialPrice);
        break;
    }
}

//-----------------------------------------------------

if (!$ispresent) {

    $user = $myfile->$users->addChild('USER');
    $user->addChild('NAME', $user_name);
    $user->addChild('EMAIL', $user_email);
    $user->addChild('PASSWORD', $user_password);
    $user->addChild('ROLE', $user_role);

    // $product = $myfile->$category->addChild('PRODUCT');
    // $product->addChild('NAME', $product_name);
    // $product->addChild('DESCRIPTION', $description);
    // $product->addChild('IMAGE', $image_URL);
    // $product->addChild('THUMBNAIL', $thumbnail_URL);
    // $product->addChild('TYPE', $category);
    // $product->addChild('PRICE', $price);
    // $product->addChild('SPECIAL', $onSpecial);
    // $product->addChild('SPECIALPRICE', $specialPrice);

    $myfile->asXML('../../../DataBase/user.xml');

    header('location: /Admin/UserList/UserList.php');
    exit();
}
