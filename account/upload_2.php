<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "kaye_bakes_2");

  // Initialize message variable
  $msg = "";
  

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
  	$image = $_FILES['image']['name'];
  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO products(product_name, product_desc, product_price, image_url) VALUES('$name', '$description', '$price', '$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>

</head>
<body>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='account/images/".$row['image_url']."' >";
      echo "</div>";
    }
  ?>
  <form method="POST" action="upload_2.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
      <input type="text" name="Name" placeholder="Product Name">
        <input type="text" name="Description" placeholder="Product Description">
        <input type="text" name="Price" placeholder="Product Price">
  	  <input type="file" name="image">
  	</div>

  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>