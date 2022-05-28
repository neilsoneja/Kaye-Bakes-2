<?php

session_start();

$dbservername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "kaye-bakes";
$conn = mysqli_connect($dbservername,$dbUsername,$dbPassword,$dbName);

if (isset($_POST['check-out'])) {

    if (isset($_SESSION['cart-2'])) {
        
        $session_array_id = array_column($_SESSION['cart-2'], "product_id");

        if(!in_array($_GET['product_id'], $session_array_id)) {
            $session_array = array (
                'product_id'=> $_GET['product_id'],
                "image_url" => $_POST['image_url'],
                "product_name" => $_POST['product_name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']
            );
            $_SESSION['cart-2'][] = $session_array;

        }

    } else {
        $session_array = array (
            'product_id'=> $_GET['product_id'],
            "image_url" => $_POST['image_url'],
            "product_name" => $_POST['product_name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']
        );
        $_SESSION['cart-2'][] = $session_array;
    }
}
header("location: ../check-out.php");
?>