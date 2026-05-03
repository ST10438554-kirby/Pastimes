<?php
include 'DBConn.php';

echo "<h2>Order History</h2>";

$result = $conn->query("
    SELECT tblOrders.*, tblProducts.name 
    FROM tblOrders
    JOIN tblProducts ON tblOrders.product_id = tblProducts.product_id
");

while ($row = $result->fetch_assoc()) {
    echo "
    <p>
        Product: {$row['name']} |
        Quantity: {$row['quantity']} |
        Date: {$row['order_date']}
    </p>
    ";
}
?>