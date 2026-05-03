<?php
include 'DBConn.php';

echo "<h2>Pending Products</h2>";

$result = $conn->query("SELECT * FROM tblProducts WHERE approved=0");

while ($row = $result->fetch_assoc()) {
    echo "
    <p>
        {$row['name']} - R{$row['price']}
        <a href='approve_product.php?id={$row['product_id']}'>Approve</a>
    </p>
    ";
}
?>