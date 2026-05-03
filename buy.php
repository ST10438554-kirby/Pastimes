<?php
include 'DBConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if ($user_id > 0 && $product_id > 0 && $quantity > 0) {

        $stmt = $conn->prepare("
            INSERT INTO tblOrders (user_id, product_id, quantity)
            VALUES (?, ?, ?)
        ");
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);

        if ($stmt->execute()) {
            echo "<h2 style='color:green;'>Purchase successful!</h2>";
            echo "<a href='index.php'>Back to Products</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

    } else {
        echo "Invalid input.";
    }
}
?>