<?php

session_start();

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['add-to-cart'])) {

    if (isset($_SESSION['cart'])) {
        
        $session_array_id = array_column($_SESSION['cart'], "product_id");

        if(!in_array($_GET['product_id'], $session_array_id)) {
            $session_array = array (
                'product_id'=> $_GET['product_id'],
                "image_url" => $_POST['image_url'],
                "product_name" => $_POST['product_name'],
                "product_desc" => $_POST['product_desc'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );
            $_SESSION['cart'][] = $session_array;

        }

    } else {
        $session_array = array (
            'product_id'=> $_GET['product_id'],
            "image_url" => $_POST['image_url'],
            "product_name" => $_POST['product_name'],
            "product_desc" => $_POST['product_desc'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']
        );
        $_SESSION['cart'][] = $session_array;
    }
}
header("location: ../cart.php");
?>
