//admin can approve users
<?php
include 'DBConn.php';

$result = $conn->query("SELECT * FROM tblUser WHERE verified=0");

while ($row = $result->fetch_assoc()) {
    echo $row['name'] . " 
    <a href='approve.php?id={$row['user_id']}'>Approve</a><br>";
}
?>