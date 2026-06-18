<?php

header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "connectova");

if ($conn->connect_error) {
    echo json_encode([
        "success" => false,
        "error" => "Database connection failed"
    ]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

// DEBUG: no JSON received
if (!$data) {
    echo json_encode([
        "success" => false,
        "error" => "No JSON received"
    ]);
    exit;
}

// Required field check
if (!isset($data['message'])) {
    echo json_encode([
        "success" => false,
        "error" => "Message is required"
    ]);
    exit;
}

$sender_id = 2;
$message = $data['message'];
$message_type = $data['message_type'] ?? 'text';
$file_name = $data['file_name'] ?? null;
$file_path = $data['file_path'] ?? null;

// Prepare query
$stmt = $conn->prepare(
    "INSERT INTO chats
    (sender_id, message, message_type, file_name, file_path)
    VALUES (?, ?, ?, ?, ?)"
);

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "error" => "Prepare failed: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param(
    "issss",
    $sender_id,
    $message,
    $message_type,
    $file_name,
    $file_path
);

// Execute
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Message saved successfully",
        "insert_id" => $stmt->insert_id
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();