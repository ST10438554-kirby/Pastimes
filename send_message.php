<?php
include 'DBConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sender_id = $_POST['sender_id'];
    $receiver_id = $_POST['receiver_id'];
    $message = $_POST['message'];

    if (!empty($sender_id) && !empty($receiver_id) && !empty($message)) {

        $stmt = $conn->prepare("
            INSERT INTO tblMessages (sender_id, receiver_id, message)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
        $stmt->execute();

        echo "<p style='color:green;'>Message sent successfully!</p>";
    } else {
        echo "<p style='color:red;'>All fields are required.</p>";
    }
}
?>

<h2>Send Message</h2>

<form method="POST">
    <input type="number" name="sender_id" placeholder="Your User ID" required>
    <input type="number" name="receiver_id" placeholder="Receiver User ID" required>
    <textarea name="message" placeholder="Type your message..." required></textarea>
    <button>Send</button>
</form>