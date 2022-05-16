<?php
    include_once 'db.php';

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
      <div class="header">Welcome!!</div> 

      <div class="menu">
        <h1>Our Menu</h1>
        <form action="cart.php" method="post" id=cart>
          <div class="product-container">
            <div class="card">
              <?php
                $sql = "SELECT * FROM products WHERE customized = 0";
                $result = mysqli_query($conn, $sql);
                $query_results = mysqli_fetch_array($result);
    
                if ($query_results > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='product.php?title=".$row['product_name']."&image=".$row['image_url']."'><div class='product-box'>
                    <img src='images/".$row['image_url']."' >
                    <h3>".$row['product_name']."</h3>
                    <p hidden>".$row['product_desc']."</p>
                    <p>Php ".$row['product_price']."</p>
                    <button type='submit' form='cart' value='add-to-cart'>Add to Cart</button>
                  </div></a>";
                  }
                }
              ?>
              </form>
            </div>
          </div> 
        </div>
      </div> 
    </div>        
  </div>

</body>
</html>
