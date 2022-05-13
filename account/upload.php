<?php
    include_once 'db.php';
    $db = mysqli_connect("localhost", "root", "", "kaye_bakes_2");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kaye Bakes</title>

    <!---Main CSS--->
	<link rel="stylesheet" type ="text/css" href="account/css/custom.min.css">
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
            <li><a href="#"><i class="fas fa-cake-candles"></i>Menu</a></li>
            <li><a href="#"><i class="fas fa-cart-shopping"></i></i>Orders</a></li>
            <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
            <li><a href="upload.php"><i class="fas fa-project-diagram"></i>portfolio</a></li>
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
                            <td>'.$row["product_price"].'</td>';

                    echo '<td>
                            <div class="input-field col s12">
                            <label for='.$row["product_code"].' class="">Quantity</label>';

                    echo '<input id="'.$row["product_code"].'" name="'.$row['product_code'].'" type="text" data-error=".errorTxt">
                            <div class="errorTxt'.$row["product_code"].'">
                            </div>
                          </td>
                        </tr>';
                          }
                    ?>
                    


                    </tbody>
                  </table>
                  <div class="input-field col s12">
                <i class="mdi-editor-mode-edit prefix"></i>
                <textarea id="description" name="description" class="materialize-textarea"></textarea>
                <label for="description" class="">Any note(optional)</label>
			        </div>
			        <div>
			          <div class="input-field col s12">
                  <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order
                    <i class="mdi-content-send right"></i>
                  </button>
                </div>

            </form>
    </div>
</div>
</div>


</body>
</html>

    <!-- jQuery Library -->
<script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
<script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
<script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
<script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- data-tables -->
<script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/data-tables/data-tables-script.js"></script>
	
<script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
<script type="text/javascript" src="js/custom-script.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#data-table-customer').DataTable();
    } );
</script>

<script src="script.js"></script>
