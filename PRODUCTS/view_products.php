<?php
include 'DBConn.php';

$result = $conn->query("SELECT * FROM tblProducts");

echo "<h2>Products</h2>";

while ($row = $result->fetch_assoc()) {
    echo "
    <p>
        {$row['name']} | R{$row['price']} | Approved: {$row['approved']}

        <a href='edit_product.php?id={$row['product_id']}'>Edit</a> |
        <a href='delete_product.php?id={$row['product_id']}'>Delete</a>
    </p>
    <hr>
    ";
}
?>