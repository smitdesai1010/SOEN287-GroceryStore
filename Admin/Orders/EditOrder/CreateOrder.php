<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EditOrder</title>

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
  <style>
    #inputState {
      padding: 7px;
      border: 1px solid rgb(201, 201, 201) !important;
      border-radius: 4px;
      margin-top: 30px;

    }
  </style>

</head>

<body>
  <!-- Main Container -->
  <div class="container-fluid">
    <div class="row flex-xl-nowrap">
      <main class="container col">

        <div class="main-header mt-5 mb-5">
          <div class="d-flex justify-content-between">
            <h3>Add Order</h3>

            <button class="btn btn-success">
              <a href="../order.php" style="color: white;">Back to Order List</a>
            </button>
          </div>

        </div>

        <form id="form" action="../../../Signup/Signup.php" method="POST" class="edit-user-information">
          <div class="container title-description border rounded p-4 pb-4 mb-4">
            <h5 class="mb-3">Order Details</h5>
            <hr>
            <div class="title-group mb-3 mr-6">
              <div class="row">
                <div class="col-md-12 mt-3">
                  <label for="id" class="form-label"> ID</label>
                  <input name="id" type="id" class="form-control" id="id" placeholder="ID of user">
                </div>
                <div class="col-md-12">
                  <label for="name" class="form-label">Name</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Enter name ">
                </div>
                <div class="col-md-12 mt-3">
                  <label for="email" class="form-label">Email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="someone@anywhere.ca">
                </div>

                <?php
                $myfile = simplexml_load_file('../../../DataBase/orders.xml');
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
                    echo "
                                    <div class='container-fluid'>
                                        
                                        

                                            <table class='table'>
                                                <thead>
                                                    <tr>
                                                   
                                                    <th scope='col'>Products</th>
                                                    <th scope='col'>Price</th>
                                                    <th scope='col'>Quantity</th>
                                                    </tr>
                                                </thead>
                                              
                                            </table>                                                     
                                                                                                   
                                        </div>
                                    

                                    ";
                                   

                    ++$i;
                    $order = "";
                    $price = "";
                    $quantity = "";
                    $delete = ""; 
                }
                ?>
              
                  
                  

              
            </div>
          </div>
      </main>




    </div>
  </div>
  <script src="../../../Navbar/navbar-admin.js" abspath="../../../"></script>

  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    if (message != null)
      alert(message);


    
  </script>
</body>

</html>