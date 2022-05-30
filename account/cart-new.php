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
    <title>Kaye Bakes - Cart</title>

    <link rel="stylesheet" type="text/css"  media="screen,projection" href="/Kaye-Bakes-2/account/css/new.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Kaye-Bakes-2/account/css/font-awesome.min.css">
 

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
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
    </style>


    
</head>

<body>
    <header>
        <div class="navbar navbar-dark ground-dark shadow-sm">
            <div class="container">
            <a href="/Kaye-Bakes-2/index.html" class="navbar-brand d-flex align-items-center"><img src="/Kaye-Bakes-2/account/images/materialize-logo.png" alt="logo"></a> <span class="logo-text"></span>

            </button>
            </div>
        </div>
    </header>

    <main>



            <div class="container">
                <div class="row p-5">
                    <div class="col">
                        <h5 class="">Cart</h5>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row">
                    
                    <div class="text-center">
                        <?php
                        $total = 0;
                        $cart_items = array();
                        $output = "";
                        $output .= "
                            <table class='table table-striped'>
                                <thead class=''>
                                    <tr>

                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                        <th scope='col'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     ";

                        if (!empty($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $output .= "
                                    
                                    <tr>
                                        <td>
                                            <img src='".$value['image_url']."' style='height: 100px'>
                                        </td>
                                        <th scope='row'>".$value['product_name']."</td>                                        
                                        <td><input type='number' id='quantity' name='quantity' min='1' value='".$value['quantity']."'></td>
                                        <td>".$value['product_desc']."</td>
                                        <td>Php  ".number_format($value['price'] * $value['quantity'])."</td>

                                        <td>
                                            <a href='cart-new.php?action=remove&product_id=".$value['product_id']."'>
                                                <button>Remove</button>
                                            </a>
                                        </td>
                                    </tr>
                                   
                                ";
                                $total = $total + $value['quantity'] * $value['price'];
                                $all_cart_items = $value['product_id'];
                            }

                            $output .= "
                            <tr >
                                <td colspan='3'></td>
                                <td></b>Total Price</b></td>
                                <td>".number_format($total)."</td>
                                <td>
                                <a href='cart-new.php?action=clear_all'>
                                <button>Clear All</button>
                                <td>
                                </td>
                                </a>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            <p>For customized cakes: Addional price will be added to base price based in customizations.</p> 
                            ";
                        }


                        if(isset($_GET['action'])) {

                            if ($_GET['action'] == "clear_all") {
                            $_SESSION['cart']=array();
                            }
                            
                
                            if ($_GET['action'] == "remove") {
                            foreach($_SESSION['cart'] as $key => $value) {
                                if ($value['product_id'] == $_GET['product_id']) {
                                unset($_SESSION['cart'][$key]);
                                }
                            }
                            
                            }
                            header("location: cart-new.php");
                            exit();
                        }

                        if (empty($_SESSION['cart']))
                        {
                            echo "No item in the shopping cart.";
                        }
                        else{
                            echo $output;    
                        }

                        
                        ?>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col">
                        <form method="post"
                            action="checkout-new.php?product_id=<?=$value['product_id']?>">
                            <input type="hidden" name="product_name" value="<?= $value['product_name']?>">
                            <input type="hidden" name="product_desc" value="<?= $value['product_desc']?>">
                            <input type="hidden" name="total-price" value="<?= $value ?>">
                            <button class="btn btn-primary" type="submit">Proceed to Checkout</button>  
                                                
                        </form>
                                               
                    </div>
                    <div class="col ">
                    <a href="/Kaye-Bakes-2/account/pre-order.php" class="btn btn-primary">Continue Shopping</a>  
                    </div>
                </div>
                                
                

            <?php
            if(isset($_GET['action'])) {

            if ($_GET['action'] == "clear_all") {
            $_SESSION['cart']=array();
            }
            

            if ($_GET['action'] == "remove") {
            foreach($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $_GET['product_id']) {
                unset($_SESSION['cart'][$key]);
                }
            }
            
            }
            header("location: cart-new.php");
            exit();
            }
            ?>
        </div>
    </main>

 <!--bootstrap-->
 <script type="text/javascript" src="js/bootstrap/bootstrap.bundle.min.js"></script>  

<!-- jQuery Library -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

<!--bootstrap-->
<script type="text/javascript" src="js/bootstrap/bootstrap-datepicker.min.js"></script>

<!--custom-->
<script type="text/javascript" src="js/own-script.js"></script>


</body>

</html>