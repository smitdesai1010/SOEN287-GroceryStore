<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderInfo</title>
    <link rel="stylesheet" href="OrderList.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
</head>

<body>

    <div class="container-fluid box wrapper">
        <div class="row flex-xl-nowrap">

            <main class="container col ml-4">
                <div class="main-header mt-5 mb-5">
                    <h3 class="d-inline">Orders</h3>
                </div>

                <div class="order-view mr-4 mb-5">
                    <div class="border row rounded-bottom">
                        <div class="filter-search container-fluid input-group p-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success dropdown-toggle" id="dropdownHeader" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="0" onclick="setfilter(this)" href="#">ID </a>
                                    <a class="dropdown-item" id="1" onclick="setfilter(this)" href="#">Name</a>


                                </div>
                            </div>
                            <input type="text" class="form-control" id="filtersearchbar" aria-label="Text input with dropdown button" onkeyup="filter()" placeholder="Enter order to search">
                        </div>


                        <!--order list -->
                        <div class="order-table border rounded"></div>
                        <table class="order-list table " id="order-list">
                            <thead>
                                <tr>
                                    <th scope="row">Order ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $myfile = simplexml_load_file('../../DataBase/orders.xml');
                                $i = 0;
                                $Orders = $myfile->ORDERS;
                                $order = "";
                                $price = "";
                                $quantity = "";
                                $delete = "";

                                foreach ($Orders->ORDER as $o) {

                                    foreach ($o->PRODUCTS->PRODUCT as $prod) {
                                        $order .= "<p>$prod->PRODUCTNAME</p>";
                                        $price .= "<p>$prod->PRICE</p>";
                                        $quantity .= "<p>$prod->QUANTITY</p>";
                                        $delete .=  "<div class='cartSection removeWrap'>
                                                                        <a class='remove' onclick='deleteItem($o->ID,`$prod->PRODUCTNAME`)'>x</a>
                                                                    </div>";
                                    }
                                    echo "<tr>
                                                     <td scope='row'><b id='ID$o->ID'>$o->ID</b></td>
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
                                                                    
                                                                    <td>$order</td>
                                                                    <td>$price</td>
                                                                    <td>$quantity</td>
                                                                    <td>$delete</td>
                                                                    </tr>
                                                                   
                                                                </tbody>
                                                            </table>                                                     
                                                                                                                   
                                                        </div>
                                                    </div>

                                                    </td>
                                                    <td scope='col'>$$o->TOTAL</td>   

                                                    <td scope='col'>
                                                    <a style='font-size:11px'
                                                        class='btn btn-outline-primary btn-sm pl-3 pr-3 mr-1' href='#'
                                                        role='button' onclick='edit(this)'>Edit</a>
                                                        <a style='font-size:11px' class='btn btn-outline-danger btn-sm pl-3 pr-3'
                                                            onclick='deleteOrder($o->ID)' role='button'>Delete</a>
                                                    </td>
                                                   </tr>";

                                    ++$i;
                                    $order = "";
                                    $price = "";
                                    $quantity = "";
                                    $delete = "";
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
        function deleteOrder(OrderId) {
            var confirmDelete = confirm("Do you want to Order Id " + OrderId + "?");

            if (!confirmDelete)
                return;

            fetch('deleteorder.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'orderId': OrderId
                    })
                })
                .then(res => window.location.reload())
                .catch(error => console.log(error))
        }


        function deleteItem(OrderId, ProductName) {
            var confirmDelete = confirm("Do you want to Item: " + ProductName.trim() + "?");

            if (!confirmDelete)
                return;

            fetch('deleteorderItem.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        'orderId': OrderId,
                        'productName': ProductName.trim()
                    })
                })
                .then(res => window.location.reload())
                .catch(error => console.log(error))
        }

        document.getElementById("filtersearchbar").setAttribute("column", "0");

        function setfilter(selector) {
            document.getElementById("filtersearchbar").setAttribute("column", `${selector.id}`);
            document.getElementById("dropdownHeader").innerHTML = selector.innerHTML;
        }


        

        function filter() {
            let input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filtersearchbar");
            filter = input.value.toUpperCase();
            table = document.getElementById("order-list");
            tr = table.getElementsByTagName("tr");
            column = input.getAttribute("column");


            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[column];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }



        function data(id) {
    const orderData = id.parentElement.parentElement.getElementsByTagName('td')[0].getElementsByTagName('b')[0].innerHTML;
   
    return orderData;
}
        

    function edit(id) {
    const order = data(id);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            redirectWithData(this, order.orderData);
        }
    };
    xhttp.open("GET", "../../DataBase/orders.xml", true);
    xhttp.send();
}





function redirectWithData(xml, orderData) 
{
    
    const orders = xml.responseXML.getElementsByTagName('ORDERS')[0];
    const order = orders.getElementsByTagName('ORDER');
    
    let i;
    console.log(orderData);
    for (i = 0; i < order.length; i++) {
        console.log(order[i].getElementsByTagName("ID")[0].innerHTML);
        if (order[i].getElementsByTagName("ID")[0].innerHTML.trim() == orderData) {

            let originalID = order[i].getElementsByTagName("ID")[0].innerHTML;
            let originalNAME = order[i].getElementsByTagName("NAME")[0].innerHTML;
            let originalEmail = order[i].getElementsByTagName("EMAIL")[0].innerHTML;
            let originalProduct = order[i].getElementsByTagName("PRODUCT")[0].innerHTML;
            const prods= order[i].getElementsByTagName('PRODUCT');
            let j, productname = "", originalprice = "", originalquantity = "";
            for(j=0;j<prods.length;j++)
            { 
            let productname=+ "&n" + i + "=" + order[i].getElementByTagName("PRODUCTNAME")[j].innerHTML;
            let originalprice=+ "&p" + i + "=" + order[i].getElementsByTagName("PRICE")[j].innerHTML;
            let originalquantity=+ "&q" + i + "=" + order[i].getElementsByTagName("QUANTITY")[j].innerHTML;


            }
            let originalTAX = order[i].getElementsByTagName("TAX")[0].innerHTML;
            let originalTotal = order[i].getElementsByTagName("TOTAL")[0].innerHTML;

            window.open(`CreateOrder.php?id=${originalID}&name=${originalNAME}&email=${originalEmail}&prod=${originalProduct}
            ${productname}${originalprice}${originalquantity}&tax=${originalTax}&tot=${originalTotal}&len=${prods.length}`);
            break;
        }
        else
            console.log("Query failed");
    };
}


    </script>
</body>

</html>