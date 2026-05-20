<?php

$conn = new mysqli("localhost", "root", "", "connectova");

if ($conn->connect_error) {
    die("Connection failed");
}

// get JSON data
$data = json_decode(file_get_contents("php://input"), true);

$sender_id = 1; // temporary user id
$message = $data['message'];

// insert message
$stmt = $conn->prepare("INSERT INTO chats (sender_id, message) VALUES (?, ?)");

$stmt->bind_param("is", $sender_id, $message);

$stmt->execute();

echo json_encode([
    "status" => "success"
]);

?>