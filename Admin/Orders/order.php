<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderInfo</title>
    
    <!--Bootstrap Imports-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="OrderInfo.css">
        <style>
            .box {
                display: flex;
                flex-flow: column;
                min-height: 70.7%;     
                }
        </style>
    
</head>

<body>

    <div class="container-fluid box wrapper">
        <div class="row flex-xl-nowrap">
            
            <main class="container col ml-4">
                <div class="main-header mt-5 mb-5">
                    <h3 class="d-inline">Orders</h3>
                    <a href="CreateOrder.html" class="d-inline btn btn-success float-right text-white">Create New Order</a>
                </div>

               
                <div class="order-view mr-4 mb-5">
                    <div class="genres row border rounded-top">
                        <div class="col-2 text-center m-3"> <a href="">All</a></div>
                        <div class="col-2 text-center m-3"><a href="">Open</a></div>
                        <div class="col-2 text-center m-3"><a href="">Unpaid</a></div>
                        <div class="col-2 text-center m-3"><a href="">Unfulfilled</a></div>
                        <div class="col-2 text-center m-3"><a href="">Overdue</a></div>
                    </div>

                    
                    <div class="border row rounded-bottom">
                        <div class="filter-search container-fluid input-group p-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Order </a>
                                    <a class="dropdown-item" href="#">Customer ID</a>
                                    <a class="dropdown-item" href="#">Price</a>
                                   
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="search-input"
                                placeholder="Enter order to search">
                        </div>

                      <!--order list -->
                      <div class="product-table border rounded"></div>
                        <table class="order-list table ">
                            <thead>
                                <tr>
                                    <th scope="row">Order ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Product</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--<tr>
                                    <td scope="row">#201</td>
                                    <td scope="col">Denis Villeneuve</td>
                                    <td scope="col">denisVill@gmail.com</td>
                                    <td scope="col">
                                        <a href="Orders\CreateOrder.html" style="font-size:11px"
                                            class="btn btn-outline-success btn-sm pl-3 pr-3 mr-1" href="#"
                                            role="button">Products</a>
                                            </td>
                                    <td scope="col">
                                        <a href="CreateOrder.html" style="font-size:11px"
                                            class="btn btn-outline-primary btn-sm pl-3 pr-3 mr-1" href="#"
                                            role="button">Edit</a>
                                        <a style="font-size:11px" class="btn btn-outline-danger btn-sm pl-3 pr-3"
                                            href="#" role="button">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">#245</td>
                                    <td scope="col">Alfonso Cuaron</td>
                                    <td scope="col">Ac@yahoo.com</td>
                                    <td scope="col"> <a href="Orders\CreateOrder.html" style="font-size:11px"
                                        class="btn btn-outline-success btn-sm pl-3 pr-3 mr-1" href="#"
                                        role="button">Products</a></td>
                                    <td scope="col">
                                        <a href="CreateOrder.html" style="font-size:11px"
                                            class="btn btn-outline-primary btn-sm pl-3 pr-3 mr-1" href="#"
                                            role="button">Edit</a>
                                        <a style="font-size:11px" class="btn btn-outline-danger btn-sm pl-3 pr-3"
                                            href="#" role="button">Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                  <td scope="row">#17</td>
                                  <td>Inarritu</td>
                                  <td>inarit1997@gmail.com</td>
                                  <td> <a href="Orders\CreateOrder.html" style="font-size:11px"
                                    class="btn btn-outline-success btn-sm pl-3 pr-3 mr-1" href="#"
                                    role="button">Products</a></td>
                                  <td scope="col">
                                    <a href="CreateOrder.html" style="font-size:11px"
                                        class="btn btn-outline-primary btn-sm pl-3 pr-3 mr-1" href="#"
                                        role="button">Edit</a>
                                    <a style="font-size:11px" class="btn btn-outline-danger btn-sm pl-3 pr-3"
                                        href="#" role="button">Delete</a>
                                </td>
                                </tr>-->
                                <?php
                                        $myfile = simplexml_load_file('../../DataBase/orders.xml');
                                        $i = 0;
                                        $Orders=$myfile->ORDERS;
                                        
                                                 foreach ($Orders->ORDER as $o) {
                                                    
                                                     echo "<tr>
                                                     <th scope='row'>" . ++$i . "</td>
                                                     <td scope='col'>$o->NAME</td>
                                                     <td scope='col'>$o->EMAIL</td>
                                                     <td scope='col'>
                                                     <a href='CreateOrder.html' style='font-size:11px'
                                                     class='btn btn-outline-primary btn-sm pl-3 pr-3 mr-1' href='#'
                                                     role='button'>Products</a>
                                                     </td>
                                                     <td scope='col'>
                                                     <a href='CreateOrder.html' style='font-size:11px'
                                                         class='btn btn-outline-primary btn-sm pl-3 pr-3 mr-1' href='#'
                                                         role='button'>Edit</a>
                                                     <a style='font-size:11px' class='btn btn-outline-danger btn-sm pl-3 pr-3'
                                                         href='#' role='button'>Delete</a>
                                                     </td>
                                                   </tr>";
                                                
                                             }
                                    ?>
                                
                            </tbody>

                        </table>
                    </div>
                    </div>

                </div>

            </main>
        </div>
    </div>
    <script src="../../Navbar/navbar-admin.js" abspath="../../"></script>
</body>

</html>