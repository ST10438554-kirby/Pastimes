<?php
include 'DBConn.php';

$user_id = $_GET['user_id'];

echo "<h2>Sent Messages</h2>";

$stmt = $conn->prepare("
    SELECT m.*, u.name AS receiver_name
    FROM tblMessages m
    JOIN tblUser u ON m.receiver_id = u.user_id
    WHERE m.sender_id = ?
");

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "
    <div>
        <p><b>To:</b> {$row['receiver_name']}</p>
        <p>{$row['message']}</p>
        <small>{$row['sent_at']}</small>
    </div>
    <hr>
    ";
}
?>