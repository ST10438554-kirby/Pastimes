<?php
include 'DBConn.php';

$user_id = $_GET['user_id'];

echo "<h2>Inbox</h2>";

$stmt = $conn->prepare("
    SELECT m.*, u.name AS sender_name
    FROM tblMessages m
    JOIN tblUser u ON m.sender_id = u.user_id
    WHERE m.receiver_id = ?
");

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "
    <div>
        <p><b>From:</b> {$row['sender_name']}</p>
        <p>{$row['message']}</p>
        <small>{$row['sent_at']}</small>
    </div>
    <hr>
    ";
}
?>