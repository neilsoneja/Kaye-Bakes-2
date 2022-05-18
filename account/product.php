<?php
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
      
      <div class="product">
          <div class="product-page-container">
            <div class="card">
              <?php
                $title = mysqli_real_escape_string($conn, $_GET['title']);
                $image = mysqli_real_escape_string($conn, $_GET['image']);

                $sql = "SELECT * FROM products WHERE product_name='$title' and image_url='$image'";
                $result = mysqli_query($conn, $sql);
                $query_results = mysqli_num_rows($result);
    
                if ($query_results > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='product-box'>
                            <table>
                              <tr>
                                <td class='image'>
                                  <img src='product_images/".$row['image_url']."' >
                                </td>
                                
                                <td class='text'>
                                  <h3>".$row['product_name']."</h3>
                                  <p>".$row['product_desc']."</p>
                                  <p>Php ".$row['price']."</p>
                                  <button type='submit' name='add-to-cart'>Add to Cart</button>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>";
                  }
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