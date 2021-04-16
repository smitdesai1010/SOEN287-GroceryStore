<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SOEN287</title>
</head>


<body>
        <div>
            <h1 style="color: #FF0000; text-align: center;"> S  P  E  C  I  A  L  S </h1>
            
            <section class="px-4">
                <div class="container">
                    <?php
                        $myfile = simplexml_load_file('..\DataBase\products.xml');
                        $ctr = 0;
                        $row = "<div class='row d-flex justify-content-center'>";

                        echo $row;
                            foreach($myfile->children() as $categoryName => $categoryProducts)
                                foreach ($categoryProducts->PRODUCT as $prod) 
                                {
                                    if ( $ctr!=0 && $ctr%3 == 0 )
                                    {
                                        echo "</div>";
                                        echo $row;
                                    }

                                    if($prod->SPECIAL == 1) 
                                    {
                                        echo "
                                        <div class='column m-4' >
                                            <div class='cardwidth card'>
                                                <img class='crdimagesize card-img-top' src=$prod->THUMBNAIL alt='Card image cap'>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>$prod->TITLE</h5>
                                                    <span class='card-text d-flex justify-content-between'>
                                                        <p style='color: red'><b> $$prod->SPECIALPRICE/lb </b></p>
                                                        <input price=$prod->SPECIALPRICE placeholder='Quantity' id='demoInput' type='number' min='0' max='20' style='text-align: center;width: 40%; height: 75%'>            
                                                    </span>
                                                    <a id='add' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>Add to cart</a><!-- add reference to cart? --> 
                                                    <a href='/Aisles/product.php?category=$categoryName&name=$prod->TITLE' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>More details</a>
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
        </div>
    <script src="../Navbar/navbar.js" abspath="../"></script>
    <script src="../Orders/aisle-order.js"></script>   
</body>

</html>
