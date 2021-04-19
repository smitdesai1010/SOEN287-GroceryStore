<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderInfo</title>        
    <link rel="stylesheet" href="OrderList.css">
    
</head>

<body>

    <div class="container-fluid box wrapper">
        <div class="row flex-xl-nowrap">
            
            <main class="container col ml-4">
                <div class="main-header mt-5 mb-5">
                    <h3 class="d-inline">Orders</h3>
                </div>
               
                <div class="order-view mr-4 mb-5">
                   
                      <!--order list -->
                      <div class="product-table border rounded"></div>
                        <table class="order-list table ">
                            <thead>
                                <tr>
                                    <th scope="row">Order ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" >Product</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php     
                                        $myfile = simplexml_load_file('../../DataBase/orders.xml');
                                        $i = 0;
                                        $Orders=$myfile->ORDERS;
                                        $product="";
                                        $price="";
                                        $quantity="";

                                                 foreach ($Orders->ORDER as $o) {
                                                     
                                                     foreach ( $o->PRODUCTS->PRODUCT as $prod){
                                                        $product .= "<p>$prod->PRODUCTNAME</p>";
                                                        $price .= "<p>$prod->PRICE</p>";
                                                        $quantity .= "<p>$prod->QUANTITY</p>";  
                                                    }
                                                     echo "<tr>
                                                     <th scope='row'>$o->ID</td>
                                                     <td scope='col'>$o->NAME</td>
                                                     <td scope='col'>$o->EMAIL</td>
                                                     <td scope='col'>

                                                        <p align ='left'>
                                                            <button class='btn btn-success' type='button' data-toggle='collapse' data-target='#collapseExample$i' aria-expanded='false' aria-controls='collapseExample'>
                                                            Products
                                                            </button>
                                                        </p>
                                                        
                                                    <div class='container-fluid'>
                                                        <div class='collapse' id='collapseExample$i'>
                                                        
          
                                                            <table class='table'>
                                                                <thead>
                                                                    <tr>
                                                                   
                                                                    <th scope='col'>Products</th>
                                                                    <th scope='col'>Price</th>
                                                                    <th scope='col'>Quantity</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    
                                                                    <td>$product</td>
                                                                    <td>$price</td>
                                                                    <td>$quantity</td>
                                                                    </tr>
                                                                   
                                                                </tbody>
                                                            </table>                                                     
                                                                                                                   
                                                        </div>
                                                    </div>

                                                    </td>
                                                    <td scope='col'>$$o->TOTAL</td>   

                                                    <td scope='col'>
                                                        <a style='font-size:11px' class='btn btn-outline-danger btn-sm pl-3 pr-3'
                                                            onclick='deleteOrder($o->ID)' role='button'>Delete</a>
                                                    </td>
                                                   </tr>";
                                                
                                                   ++$i;
                                                   $product = "";
                                                   $price="";
                                                   $quantity="";                                                     
                                             }
                                    ?>
                                
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <script src="../../Navbar/navbar-admin.js" abspath="../../"></script>
    <script>
        function deleteOrder(OrderId)
        {
            
            var confirmDelete = confirm("Do you want to Order Id "+OrderId+"?");

            if ( !confirmDelete )
                return;

            fetch('deleteorder.php',{
                method:'POST',
                body: JSON.stringify({'orderId': OrderId})
            })
            .catch(error => console.log(error))
        }
    </script>
</body>

</html>
