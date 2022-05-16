<?php
    $dbservername = "127.0.0.1";
    $dbUsername = "admin";
    $dbPassword = "admin";
    $dbName = "kaye-bakes";
    
    $db = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);
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
            <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = mysqli_query($db, "SELECT * FROM products");
                    while ($row = mysqli_fetch_array($result)) 
                    {
                    echo '<tr>
                            <td>'.$row["product_name"].'</td>
                            <td><img src="images/'.$row["image_url"].'" alt="Image" style="width: 100px height: 100px;">
                            <td>'.$row['product_desc'].'</td>
                            <td>'.$row["price"].'</td>';

                    echo '<td>
                            <div class="input-field col s12">
                            <label for='.$row["product_id"].' class="">Quantity</label>';

                    echo '<input id="'.$row["product_id"].'" name="'.$row['product_id'].'" type="text" data-error=".errorTxt">
                            <div class="errorTxt'.$row["product_id"].'">
                            </div>
                          </td>
                        </tr>';
                          }
                    ?>
                    </tbody>
                  </table>
    </div>
</div>
</div>


</body>
</html>


<script type="text/javascript">
    $(document).ready( function () {
    $('#data-table-customer').DataTable();
    } );
</script>

<script src="script.js"></script>
