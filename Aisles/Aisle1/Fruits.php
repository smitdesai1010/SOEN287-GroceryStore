<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits</title>
</head>


<body class="white">
    <h3 class="title display-5 p-4">FRUITS</h3>
    
    <section class="px-4">
        <div class="container">
        
            <?php

                $title = 'Fruits';
                $myfile = simplexml_load_file('../../DataBase/products.xml');
                $ctr = 0;
                $row = "<div class='row d-flex justify-content-center'>";

                echo $row;

                foreach ($myfile->FRUITS->PRODUCT as $fruit)
                {
                    if ( $ctr!=0 && $ctr%3 == 0 )
                    {
                        echo "</div>";
                        echo $row;
                    }

                    echo "
                    <div class='column m-4' >
                        <div class='cardwidth card'>
                            <img class='crdimagesize card-img-top' src=$fruit->THUMBNAIL alt='Card image cap'>
                            <div class='card-body'>
                                <h5 class='card-title'>$fruit->TITLE</h5>
                                
                                <span class='card-text d-flex justify-content-between'>
                                    <p> $$fruit->PRICE/lb </p>
                                    <input price=$fruit->PRICE placeholder='Quantity' id='demoInput' type='number' min='0' max='20' style='text-align: center;width: 40%; height: 75%'>            
                                </span>

                                <a id='add' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>Add to cart</a><!-- add reference to cart? --> 
                                <a href='apple.html' style='background-color: #46B510 !important; border-color: #46B510 !important;' class='btn btn-primary'>More details</a>
                            </div>
                        </div>
                    </div>        
                    ";
                    
                    ++$ctr;
                }

                echo "</div>";
            
            ?>


            

        </div>
    </section>

<script src="../../Navbar/navbar.js" abspath="../../"></script>
<script src="../../Orders/aisle-prod.js"></script>
</body>



</html>