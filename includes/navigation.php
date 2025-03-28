<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grimsby and Clee Sells</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">


<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbardropdown"
            aria-controls="navbardropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbardropdown">
            <ul class="navbar-nav w-100 justify-content-around">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="index.php">Home Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="productlist.php">Products</a>
                </li>
                <?php
                    //checks if there is a user logged in, if so it won't display these two links on the nav bar
                    if (!isset($_SESSION['username'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link text-white" href="createuser.php">Register Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="login.php">Log In</a>
                            </li>';
                    }
                ?>
                <?php
                    //checks if the username is logged in the session, if so it will display the below contents on the nav bar
                    if (isset($_SESSION['username'])) {
                      echo '<li class="nav-item">
                              <a class="nav-link text-white" href="basket.php">My Basket</a>
                          </li>';
                  }
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="myaccount.php" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ' . $_SESSION['username'] . '
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item text-dark" href="myproduct.php">My Products</a></li>
                                    <li><a class="dropdown-item text-dark" href="account.php">Account</a></li>
                                    <li><a class="dropdown-item text-dark" href="mymessage.php">Messages</a></li>
                                    <li><a class="dropdown-item text-dark" href="logoutprocess.php">Log Out</a></li>
                                </ul>
                            </li>';
                    }
                ?>
                <!-- Add the name attribute to the input fields to distinguish them in PHP -->
                <form class="d-flex" action="searchbarprocess.php" method="post">
                    <input class="form-control me-2" type="search" name="search_name" placeholder="Search Products" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
