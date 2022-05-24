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
    

    <!---Nav Bar---> 
    <script src="https://kit.fontawesome.com/0f30674e5a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   
    
</head>

<body>
<div class="wrapper">
  <div class="sidebar">
    <h2>Kaye Bakes</h2>
    <ul>
      <li><a href="index.php"><i class="fas fa-cake-candles"></i>Menu</a></li>
      <li><a href="#"><i class="fas fa-cart-shopping"></i></i>Orders</a></li>
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
      <div class="header">Our Menu</div> 

      <div class="search">
      <form action="routers/search.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name="submit-search"></button>
      </form>
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
                    
                    <form method="post" action="routers/add-to-cart.php?product_id=<?=$row['product_id']?>">
                    <img src="product_images/<?=$row['image_url']?>" style='height: 250px'>
                    <p class="text-center"><?=$row['product_name'];?></p>
                    <p hidden><?=$row['product_desc'];?></p>
                    <p class="text-center">Php  <?=number_format($row['price']);?></p>

                    <input type="hidden" name="product_name" value="<?= $row['product_name']?>">
                    <input type="hidden" name="product_desc" value="<?= $row['product_desc']?>">
                    <input type="hidden" name="price" value="<?= $row['price']?>">
                    <input type="number" name="quantity" value="1" hidden>
                    <input type="submit" name="add-to-cart" value="Add To Cart">
                    </form>
                    <?php }
                }
                

              ?>
            </div>
          </div> 

        </div>
      </div> 
    </div>        
  </div>

</body>
</html>