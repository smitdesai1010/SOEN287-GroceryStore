<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <!--SAMPLE CHANGE-->
    <!--Bootstrap Imports-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!--Our Imports-->
    <link rel="stylesheet" href="productlist.css">
    <style>
        .box {
            display: flex;
            flex-flow: column;
            min-height: 80%;
        }
    </style>
</head>

<body>

    <div class="box container-fluid wrapper">
        <div class="row flex-xl-nowrap">
            <!--Main Content-->
            <main class="container col ml-sm-4 ml-3">
                <div class="main-header mt-5 mb-5">
                    <h3 class="d-inline">Products</h3>
                    <a href="AddProduct/addproduct.html" class="d-inline btn btn-success float-right text-white">Add
                        Product</a>
                </div>
                <div class="border row rounded-bottom">
                    <!--Search Bar-->
                    <div class="filter-search container-fluid input-group p-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-success dropdown-toggle" id="dropdownHeader" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="0" onclick="setfilter(this)" href="#">Products</a>
                                <a class="dropdown-item" id="1" onclick="setfilter(this)" href="#">Food Type</a>
                                <a class="dropdown-item" id="2" onclick="setfilter(this)" href="#">Price</a>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="filtersearchbar" aria-label="Text input with dropdown button" onkeyup="filter()"  placeholder="Search...">
                    </div>

                    <!--Product Table-->
                    <div class="product-table border rounded">
                        <table class="table products" id="product-list">
                            <thead>
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">
                                        <!-- resolves header background color problem-->
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                        <a  onclick="edit(event)" style="font-size:11px"
                                                class="btn btn-outline-primary btn-sm pl-3 pr-3 mr-1" href="#"
                                                role="button">Edit</a>

                                        edit(event)
                                        {
                                            var parent = event.target.parentElement
                                            parent will refer to the tr tags

                                            var children = parent.Children;
                                            
                                        }
                                    -->
                                <?php
                                $myfile = simplexml_load_file('../../DataBase/products.xml');
                                $i = 0;
                                foreach ($myfile->children() as $categoryName => $categoryProducts) {
                                    foreach ($categoryProducts->PRODUCT as $prod) {
                                        echo "<tr>
                                                    <th scope='row'>" . ++$i . "</td>
                                                    <td scope='col'>$prod->TITLE</td>
                                                    <td scope='col'>$categoryName</td>
                                                    <td scope='col'>$prod->PRICE</td>
                                                    <td scope='col'>
                                                    <a style='font-size:11px'
                                                        class='btn btn-outline-primary btn-sm pl-3 pr-3 mr-1' href='#'
                                                        role='button' onclick='edit(this)'>Edit</a>
                                                    <a style='font-size:11px' class='btn btn-outline-danger btn-sm pl-3 pr-3'
                                                        href='#' role='button' onclick='remove(this)'>Delete</a>
                                                    </td>
                                                  </tr>";
                                    }
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
    <script src="productlist.js"></script>
</body>

</html>