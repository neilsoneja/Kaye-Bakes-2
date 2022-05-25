<?php
session_start();
$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kaye Bakes</title>

    <!---Main CSS--->
	<link rel="stylesheet" type ="text/css" href="css/custom.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!---Nav Bar--->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/0f30674e5a.js" crossorigin="anonymous"></script>
   
    
</head>

<body>
<div class="wrapper">
  <div class="sidebar">
    <h2>Kaye Bakes</h2>
    <ul>
      <li><a href="from_menu.php"><i class="fas fa-cake-candles"></i>Menu</a></li>
      <li><a href="cart.php"><i class="fas fa-cart-shopping"></i></i>Orders</a></li>
      <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
      <li><a href="upload.php"><i class="fas fa-project-diagram"></i>Custom</a></li>
    </ul> 
    <div class="social_media">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </div>

  <div class="main_content">
    <div class="row">
      <div class="header">Cart</div> 
        <div class="text-center">
            <?php

                $total = 0;
                $output = "";
                $output .= "
                    <table class='table table-bordered table-stripped'>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    ";

                    if (!empty($_SESSION['cart'])) {

                        foreach ($_SESSION['cart'] as $key => $value) {

                            $output .= "
                                <tr>
                                    <td>
                                      <img src='product_images/".$value['image_url']."' style='height: 250px'>
                                    </td>
                                    <td>".$value['product_name']."</td>
                                    <td>".$value['product_desc']."</td>
                                    <td>".$value['price']."</td>
                                    <td>".$value['quantity']."</td>
                                    <td>Php  ".number_format($value['price'] * $value['quantity'])."</td>
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
                            </a>
                          </td>
                        </tr>
                        ";

                    }
                  echo $output
                  ?>
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