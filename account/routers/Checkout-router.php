<?php

session_start();

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

  $msg = "";
  

  // If upload button is clicked ...
  if (isset($_POST['check-out'])) {
  	// Get image name
    // $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $payment = $_POST['paymentMethod'];
  	// image file directory
  	$sql = "INSERT INTO orders(product_name, product_desc, product_price, image_url) VALUES('$name', '$description', '$price', '$image')";
  	// execute query
  	mysqli_query($db, $sql);
  }
  ?>