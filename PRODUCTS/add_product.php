<?php
include 'DBConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $seller_id = $_POST['seller_id'];

    $stmt = $conn->prepare("
        INSERT INTO tblProducts (name, description, price, seller_id)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->bind_param("ssdi", $name, $desc, $price, $seller_id);
    $stmt->execute();

    echo "Product added!";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" step="0.01" name="price" required>
    <input type="number" name="seller_id" required>
    <button>Add</button>
</form>