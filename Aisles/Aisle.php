<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $_GET['category']?>
    </title>
</head>


<body class="white">
    <h3 class="title display-5 p-4">
        <?php echo $_GET['category']?>
    </h3>
    
    <section class="px-4">
        <div class="container">
        
            <?php

                $category = $_GET['category'];
                $myfile = simplexml_load_file('../DataBase/products.xml');
                $ctr = 0;
                $row = "<div class='row d-flex justify-content-center'>";

                echo $row;
    
                foreach ($myfile->$category->PRODUCT as $prod)
                {
                    if ( $ctr!=0 && $ctr%3 == 0 )
                    {
                        echo "</div>";
                        echo $row;
                    }
                    if($prod->SPECIAL == 1) {
                        echo "
                        <div class='column m-4' >
                            <div class='cardwidth card'>
                                <img class='crdimagesize card-img-top' src=$prod->THUMBNAIL alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$prod->TITLE</h5>
                                    <span class='card-text d-flex justify-content-between'>
                                        <p> $$prod->SPECIALPRICE/lb </p>
                                        <input price=$prod->SPECIALPRICE placeholder='Quantity' id='demoInput' type='number' min='0' max='20' style='text-align: center;width: 40%; height: 75%'>            
                                    </span>
                                    <a id='add' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>Add to cart</a><!-- add reference to cart? --> 
                                    <a href='product.php?category=$category&name=$prod->TITLE' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>More details</a>
                                </div>
                            </div>
                        </div>        
                        ";
                        ++$ctr;     
                    }
                    else {
                      echo "
                    <div class='column m-4' >
                        <div class='cardwidth card'>
                            <img class='crdimagesize card-img-top' src=$prod->THUMBNAIL alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>$prod->TITLE</h5>
                                
                                <span class='card-text d-flex justify-content-between'>
                                    <p> $$prod->PRICE/lb </p>
                                    <input price=$prod->PRICE placeholder='Quantity' id='demoInput' type='number' min='0' max='20' style='text-align: center;width: 40%; height: 75%'>            
                                </span>

                                <a id='add' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>Add to cart</a><!-- add reference to cart? --> 
                                <a href='product.php?category=$category&name=$prod->TITLE' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>More details</a>
                            </div>
                        </div>
                    </div>        
                    ";
                    ++$ctr;  
                    }
                }

                echo "</div>";
            
            ?>

        </div>
    </section>

<script src="../Navbar/navbar.js" abspath="../"></script>
<script src="../Orders/aisle-order.js"></script>
</body>

</html>