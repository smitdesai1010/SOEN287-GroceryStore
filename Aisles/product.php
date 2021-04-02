<!DOCTYPE html>
<html lang='en'>

<?php

    $category = $_GET['category'];
    $name = $_GET['name'];
    $myfile = simplexml_load_file('../DataBase/products.xml');
    $PRODUCT;

    foreach ($myfile->$category->PRODUCT as $prod)
    {
        if (trim($prod->TITLE) == $name)
        {
            $PRODUCT = $prod;
            break;
        }
    }    

    
?>

<head>
    <link rel='stylesheet' type='text/css' href='style.css' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>
        <?php echo $PRODUCT->TITLE; ?>
    </title>
</head>


<body>
    <h3 class='title display-5 p-5'>
        <?php echo $category; ?>
    </h3>
    <section class='p-lg-5 m-5'>
        <div container>
            <div class='row'>
                <div class='column mx-4 py-5'>
                    <img src= <?php echo trim($PRODUCT->IMAGE); ?> class='imagecrd rounded img-fluid' alt='Responsive image'>
                </div>

                <div class='card py-5 col-12 col-md-8'>
                    <h3>
                        <b><?php echo $PRODUCT->TITLE; ?></b>
                    </h3>
                    
                    <div class='d-flex justify-content-between'>
                        <div>
                            <h5 class='green' id='price' p= <?php echo $PRODUCT->PRICE; ?>>
                                $<?php echo $PRODUCT->PRICE; ?>/lb
                            </h5>
                    
                            <div class='row mx-1'>
                                <button onclick='decrement()'>-</button>
                                <input id='demoInput' type='number' placeholder='1' min='0' max='20' style='text-align: center;'>            
                                <button onclick='increment()'>+</button> 
                    
                            </div>
                        </div>
                        
                        <div class='mr-4'>
                            <h5 class='green'>Sub-Total</h5>
                            <h5 class='d-flex justify-content-center' style='font-style: italic;'> 
                                $ <span id='subtot'>0</span>
                            </h5>
                        </div>
                    </div>
                

                    <br>
                    <p> <?php echo $PRODUCT->DESCRIPTION; ?> </p>                    
                    
                    <div class='d-flex'>
                        <a class='mr-4'><button id= 'add' type='button' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary btn-lg my-2'>ADD TO CART</button></a>
                        <a><button onclick='toggle(event)' type='button' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary btn-lg my-2'>More Info</button></a>
                    </div>
                
                    <div id='info' class='mt-3' style='display: none;'>
                        <p> <?php echo $PRODUCT->MOREINFO->P[0]; ?> </p>
                        <p> <?php echo $PRODUCT->MOREINFO->P[0]; ?> </p>
                    </div>
                </div>
            </div>
        </div> 
    </section>

<script src='script.js'></script>
<script src='../Navbar/navbar.js' abspath='../'></script>
<script src='../Orders/prod-order.js'></script>

</body>

</html>