<?php
include 'DBConn.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // hashing

    $stmt = $conn->prepare("SELECT * FROM tblUser WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['verified'] == 0) {
            $message = "Account pending admin approval.";
        } elseif ($user['password'] == $password) {
            echo "User " . $user['name'] . " is logged in";
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "User not found. Please register.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required value="<?= $_POST['email'] ?? '' ?>">
    <input type="password" name="password" placeholder="Password" required>
    <button>Login</button>
</form>

<p style="color:red;"><?= $message ?></p>