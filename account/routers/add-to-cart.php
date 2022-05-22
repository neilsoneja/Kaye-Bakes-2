<?php

session_start();

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['add-to-cart'])) {
    if (isset($_SESSION['cart'])) {
        
    } else {
        $session_array = array(
            'product_id'=> $_GET['product_id'],
            'product_name' => $_POST['product_name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        );
        $_SESSION['cart'][] = $session_array;
    }
}
header("location: ../cart.php");
?>
