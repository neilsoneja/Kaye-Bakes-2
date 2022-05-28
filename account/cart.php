<?php
session_start();
$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type ="text/css" href="css/custom.min.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      a {
        text-decoration: none;
        color: inherit;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .bgbrown{
        background: #31241b;
      }

      .bg-lt-brown{
        background: #423326;
      }

      .nav-link {
        font-size: 20px;
            color: #cbc289;
        }
 
        .nav-item>a:hover {
            color: #c6b485;
        }
 
        .navbar-nav>.active>a {
            background-color: #c6c185;
            color: #E7DA9A;
        }
      

    </style>
    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bgbrown flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="from_menu.php">
    <img src="images/logo1.png" alt="images/flavicon.png">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-lt-brown sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="from_menu.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="customize-order.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Custom Cakes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">
              <span data-feather="users" class="align-text-bottom"></span>
              Cart
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

  <div class="main_content">
    <div class="row">
      <div class="header">Cart</div> 
        <div class="text-center">
            <?php

                $total = 0;
                $cart_items = array('');
                $output = "";
                $output .= "
                    <table class='table table-bordered table-stripped'>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Dedications</th>
                            <th>Action</th>

                        </tr>
                    ";

                    if (!empty($_SESSION['cart'])) {

                        foreach ($_SESSION['cart'] as $key => $value) {

                            $output .= "
                                <tr>
                                    <td>".$value['product_id']."</td>
                                    <td>
                                      <img src='product_images/".$value['image_url']."' style='height: 250px'>
                                    </td>
                                    <td>".$value['product_name']."</td>
                                    <td>".$value['product_desc']."</td>
                                    <td>".$value['price']."</td>
                                    <td>".$value['quantity']."</td>
                                    <td>Php  ".number_format($value['price'] * $value['quantity'])."</td>
                                    <td><input type='text' name='dedications' value=''></td>
                                    <td>
                                        <a href='cart.php?action=remove&product_id=".$value['product_id']."'>
                                            <button>Remove</button>
                                        </a>
                                    </td>
                                </tr>
                            ";
                            $total = $total + $value['quantity'] * $value['price'];

                        }

                        $output .= "
                        <tr>
                          <td colspan='3'></td>
                          <td></b>Total Price</b></td>
                          <td>".number_format($total)."</td>
                          <td>
                            <a href='from_menu.php?action=clear_all'>
                            <button>Clear All</button>
                            <td>
                            </td>
                            </a>
                          </td>
                        </tr>
                        ";

                                          ?>
                            <div class="check-out">
                            <form action="post" action="routers/order-router-2.php?product_id=<?=$value['product_id']?>">
                            <input type="hidden" name="product_name" value="<?= $value['product_name']?>">
                            <input type="hidden" name="product_desc" value="<?= $value['product_desc']?>">
                            <input type="submit" name="check-out" value="Proceed to checkout">
                            </form>
                            </div>
                            <?php

                    }
                  echo $output

                  ?>
                  </form>
        </div>
      </div> 
    </div>        
  </div>

  <?php
    if(isset($_GET['action'])) {

      if ($_GET['action'] == "clear_all") {
        unset($_SESSION['cart']);
      }

      if ($_GET['action'] == "remove") {
        foreach($_SESSION['cart'] as $key => $value) {
          if ($value['product_id'] == $_GET['product_id']) {
            unset($_SESSION['cart'][$key]);
          }
        }
      }
    }
  ?>

</body>
</html>