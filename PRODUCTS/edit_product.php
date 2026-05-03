<?php
include 'DBConn.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $approved = $_POST['approved'];

    $stmt = $conn->prepare("
        UPDATE tblProducts SET name=?, price=?, approved=? WHERE product_id=?
    ");

    $stmt->bind_param("sdii", $name, $price, $approved, $id);
    $stmt->execute();

    header("Location: view_products.php");
}

$result = $conn->query("SELECT * FROM tblProducts WHERE product_id=$id");
$product = $result->fetch_assoc();
?>

<form method="POST">
    <input type="text" name="name" value="<?= $product['name'] ?>" required>
    <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
    <input type="number" name="approved" value="<?= $product['approved'] ?>" required>
    <button>Update</button>
</form>