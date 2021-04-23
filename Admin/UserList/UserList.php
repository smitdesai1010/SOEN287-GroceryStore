<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserList</title>
    <link rel="stylesheet" href="UserList.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        .box {
            display: flex;
            flex-flow: column;
            min-height: 75%;
        }
    </style>
</head>

<body>
    <div class="container-fluid box wrapper">
        <div class="row flex-xl-nowrap ">
            <main class="container col ml-sm-4">
                <!-- Header w/ Button -->
                <div class="main-header mt-5 mb-5">
                    <h3 class="d-inline">Users</h3>
                    <a class="d-inline btn btn-success float-right" href="EditUser/EditUser.html">Add User</a>
                </div>

                <hr>
                <div class="user-viewer border row rounded-bottom">
                    <!-- Search Bar -->
                    <div class="container-fluid search input-group mb-3 p-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-success dropdown-toggle" id="dropdownHeader" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" onclick="setfilter(this)" id="0" href="#">Name</a>
                                <a class="dropdown-item" onclick="setfilter(this)" id="1" href="#">Email</a>
                                <a class="dropdown-item" onclick="setfilter(this)" id="2"href="#">Role</a>
                            </div>
                        </div>
                        <input type="text" id="filtersearchbar" onkeyup="filter()" class="form-control" placeholder="Search" aria-label="Text input with dropdown button">
                    </div>
                    <!-- Table -->
                    <div class="user-table border rounded">
                        <table class="table" id="userlist">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">User Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $xml = simplexml_load_file('../../DataBase/user.xml');
                                $i = 0;
                                foreach ($xml->children() as $user) {
                                    echo "<th scope='row'>" . ++$i .  "</th>
                                                <td scope='col' class='name'>$user->NAME</td>
                                                <td scope='col'>$user->EMAIL</td>
                                                <td scope='col'>$user->ROLE</td>
                                                <td scope='col'><a style='font-size:11px'
                                                class='btn btn-outline-primary btn-sm pl-3 pr-3 mr-1' href='#'
                                                role='button' onclick='edit(this)'>Edit</a>
                                            <a style='font-size:11px' class='btn btn-outline-danger btn-sm pl-3 pr-3'
                                                href='#' role='button' onclick='remove(this)'>Delete</a></td>
                                            </tr>";
                                }
                                // }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="../../Navbar/navbar-admin.js" abspath="../../"></script>
    <script src="UserList.js"></script>
</body>

</html>