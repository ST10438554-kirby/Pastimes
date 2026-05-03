<?php
include 'DBConn.php';

$id = $_GET['id'];

$conn->query("UPDATE tblProducts SET approved=1 WHERE product_id=$id");

header("Location: admin_products.php");
?>