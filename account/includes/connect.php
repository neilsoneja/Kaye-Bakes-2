<?php
session_start();
$servername = "localhost";
$server_user = "root";
$server_pass = "";
$dbname = "kaye-bakes-2";
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$con = new mysqli($servername, $server_user, $server_pass, $dbname);
?>