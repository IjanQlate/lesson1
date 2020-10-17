<?php
include 'db.php';
header('Content-Type: application/json');
// die(); return false
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    if (password_verify($password ,$row['password'])) {
        echo json_encode(array("status"=>"success", "message"=>"Exist", "url"=>"AdminLTE-3.0.5/home.php"));
        session_start();
        $_SESSION['user'] = $row['fullname'];
    } else {
        echo json_encode(array("failed"=>"success", "message"=>"Invalid username or Password"));
    }

} else {
    echo json_encode(array("status"=>"failed", "message"=>"Your username not exist"));
}

$conn->close();

?>