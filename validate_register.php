<?php
// error_reporting(0);
header('Content-Type: application/json');
include 'db.php';

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

// SELECT BEFORE INSERT

$sql = "INSERT into user (fullname, username, password) VALUES ('$fullname','$username','$password')";
// $result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    // echo "Success insert into database";
    echo json_encode(array("status"=> "success", "message"=>"Success insert into database"));
} else {
    // echo "Failed to insert";
    echo json_encode(array("status"=> "failed", "message"=>"Failed to insert"));
    // echo json_encode("Failed to insert");
}


?>