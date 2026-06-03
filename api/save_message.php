<?php

header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "connectova");

if ($conn->connect_error) {
    echo json_encode(["status" => "db_error"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

// DEBUG check
if (!$data) {
    echo json_encode([
        "status" => "no_json_received"
    ]);
    exit;
}

if (!isset($data['message'])) {
    echo json_encode([
        "status" => "no_message"
    ]);
    exit;
}

$sender_id = 2;
$message = $data['message'];

$stmt = $conn->prepare("INSERT INTO chats (sender_id, message) VALUES (?, ?)");

if (!$stmt) {
    echo json_encode(["status" => "prepare_failed", "error" => $conn->error]);
    exit;
}

$stmt->bind_param("is", $sender_id, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "insert_failed", "error" => $stmt->error]);
}

?>