<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SOEN287</title>
    <link rel="stylesheet" href="assets/css/mycss.css">
</head>


<body>
    <div class="carousel slide" data-ride="carousel" id="carousel-1" style="max-width: 100%;">
        <div class="carousel-inner d-xl-flex" style="height: 85vh;">
            <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/Carousel/three.jpg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Carousel/two.jpeg" alt="Slide Image"></div>
            <div class="carousel-item"><img class="w-100 d-block" src="assets/img/Carousel/one.jpg" alt="Slide Image"></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
    </div>

    <div class="jumbotron" style="padding-left: 10vw;margin-bottom: 0px;">
        <div>
            <h1 style="color: #FF0000; text-align: center;"> S  P  E  C  I  A  L  S </h1>
                <div class="container">
                    <?php
                        $myfile = simplexml_load_file('DataBase\products.xml');
                        $ctr = 0;
                        $row = "<div class='row d-flex justify-content-center'>";

                        echo $row;
                            foreach($myfile->children() as $categoryName => $categoryProducts)
                                foreach ($categoryProducts->PRODUCT as $prod) {
                                    if ( $ctr!=0 && $ctr%3 == 0 ){
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
        </div>

        <h1 style="color: #4bda52;border-color: var(--green);">ABOUT US</h1>
        <div style="padding: 0px;padding-right: 20vw;height: 100%;">
            <p style="color: var(--dark);"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pellentesque nec nisi sed blandit. Quisque viverra justo nulla, nec hendrerit mi posuere sed. Vivamus ut iaculis est, non ullamcorper odio. Vestibulum eu suscipit eros. Pellentesque in finibus augue. Suspendisse dolor orci, consequat ac nunc ac, euismod pellentesque orci. Etiam in erat pretium odio condimentum ornare in vitae leo. Donec pellentesque a nisi id dapibus. Suspendisse tristique quam massa, et rutrum neque vestibulum at<br></p>
            <p style="color: var(--dark);">Vestibulum porta risus nulla, ut aliquam purus lobortis id. Aenean vestibulum nunc ut interdum facilisis. Fusce et elit elementum, elementum mi nec, eleifend augue. Aliquam dignissim, turpis in commodo gravida, quam tellus finibus nunc, in accumsan dolor neque nec sapien. Nullam bibendum porttitor dolor, sit amet commodo tellus pulvinar at. Suspendisse pulvinar condimentum feugiat. Fusce varius suscipit justo, sed euismod enim lacinia ac. Nam iaculis eleifend risus, ac mollis diam venenatis eu. Nullam finibus vitae erat vulputate lacinia. Proin nec ante tristique, pretium elit at, ultricies nulla. Sed aliquam viverra mollis. Cras at hendrerit elit, et posuere velit. Pellentesque id ante eu magna ultricies commodo. Donec eu nisl id nisl efficitur porttitor. Phasellus scelerisque lectus non urna malesuada, eget gravida magna ornare.<br><br><br></p>
        </div>
    </div>
    <script src="Navbar/navbar.js" abspath=""></script>
    <script src="Orders/aisle-order.js"></script>   
</body>

</html>
