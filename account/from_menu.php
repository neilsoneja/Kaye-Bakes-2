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
        <form method="post" action="routers/add-to-cart.php?product_id=<?php$row['product_id'];?>">
          <div class="product-container">
            <div class="card">
              <?php
                $sql = "SELECT * FROM products WHERE customized = 0";
                $result = mysqli_query($conn, $sql);
                $query_results = mysqli_fetch_array($result);
    
                if ($query_results > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='product.php?title=".$row['product_name']."&image=".$row['image_url']."'><div class='product-box'>
                    <img src='product_images/".$row['image_url']."' >
                    <p hidden>".$row['product_id']."</p>
                    <h3>".$row['product_name']."</h3>
                    <p hidden>".$row['product_desc']."</p>
                    <p>Php ".number_format($row['price'])."</p>
                    <button type='submit' name='add-to-cart'>Add to Cart</button>
                  </div></a>";
                  }
                }
              ?>
            </div>
          </div> 
          </form>
        </div>
      </div> 
    </div>        
  </div>

</body>
</html>