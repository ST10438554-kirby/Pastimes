<?php
include 'DBConn.php';

$id = $_GET['id'];

$conn->query("DELETE FROM tblProducts WHERE product_id=$id");

header("Location: view_products.php");
?>