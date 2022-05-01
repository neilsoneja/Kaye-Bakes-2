<?php
include '../includes/connect.php';

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$sql = "INSERT INTO items (name, price, image, description) VALUES ('$name', $price,'$image','$description')";
$con->query($sql);
header("location: ../admin-page.php");
?>