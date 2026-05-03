<?php
include 'DBConn.php';

// DROP TABLE
$conn->query("DROP TABLE IF EXISTS tblUser");

// CREATE TABLE
$conn->query("
CREATE TABLE tblUser (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    verified BOOLEAN DEFAULT 0
)
");

// LOAD DATA FROM TEXT FILE
$file = fopen("userData.txt", "r");

while (($line = fgets($file)) !== false) {
    $data = explode(",", trim($line));

    $stmt = $conn->prepare("INSERT INTO tblUser (name, email, password, verified) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $data[0], $data[1], $data[2], $data[3]);
    $stmt->execute();
}

fclose($file);

echo "Table created and data loaded!";
?>