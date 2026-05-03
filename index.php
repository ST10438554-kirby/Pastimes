<?php
include 'DBConn.php';

echo "<h2>Pastimes Products</h2>";

$result = $conn->query("SELECT * FROM tblProducts WHERE approved=1");

while ($row = $result->fetch_assoc()) {
    echo "
    <div>
        <h3>{$row['name']}</h3>
        <p>{$row['description']}</p>
        <p>Price: R{$row['price']}</p>

        <form action='buy.php' method='POST'>
            <input type='hidden' name='product_id' value='{$row['product_id']}'>
            <input type='number' name='user_id' placeholder='Your User ID' required>
            <input type='number' name='quantity' value='1' min='1' required>
            <button>Buy</button>
        </form>
    </div>
    <hr>
    ";
}
?>