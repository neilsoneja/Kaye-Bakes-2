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
    <link rel="stylesheet" type="text/css" href="css/custom.min.css">

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

    .bgbrown {
        background: #31241b;
    }

    .bg-lt-brown {
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
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Our Menu</h1>
                </div>


                <div class="menu">
                    <div class="product-container">
                        <div class="card">

                            <?php
                $sql = "SELECT * FROM products WHERE customized = 0";
                $result = mysqli_query($conn, $sql);
                $query_results = mysqli_fetch_array($result);
    
                if ($query_results > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {?>

                            <?php
                   
                    echo "<a href='product.php?title=".$row['product_name']."&image=".$row['image_url']."'>"
                    ?>
                            <div class='product-box'>
                                <form method="post" action="routers/add-to-cart.php?product_id=<?=$row['product_id']?>">
                                    <img src="product_images/<?=$row['image_url']?>" style='height: 250px'>
                                    <h3><?=$row['product_name'];?></h3>
                                    <p hidden><?=$row['product_desc'];?></p>
                                    <p>Php <?=number_format($row['price']);?></p>

                                    <input type="hidden" name="image_url" value="<?= $row['image_url']?>">
                                    <input type="hidden" name="product_name" value="<?= $row['product_name']?>">
                                    <input type="hidden" name="product_desc" value="<?= $row['product_desc']?>">
                                    <input type="hidden" name="price" value="<?= $row['price']?>">
                                    <input type="number" name="quantity" value="1" hidden>
                                    <input type="submit" name="add-to-cart" value="Add To Cart">
                                </form>
                            </div>
                            <?php }
                }
                

              ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>