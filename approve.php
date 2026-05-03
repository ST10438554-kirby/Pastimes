<?php
include 'DBConn.php';

$id = $_GET['id'];

$conn->query("UPDATE tblUser SET verified=1 WHERE user_id=$id");

header("Location: admin.php");
?>