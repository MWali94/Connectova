<?php

include "./db_connection.php";

header("Content-Type: application/json");

$sender_id = 2;
$receiver_id = 1;

$sql = "SELECT * FROM chats
        WHERE (sender_id=$sender_id AND receiver_id=$receiver_id)
        OR (sender_id=$receiver_id AND receiver_id=$sender_id)
        ORDER BY created_at ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "success" => false,
        "error" => mysqli_error($conn)
    ]);
    exit;
}

$messages = [];

while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

echo json_encode($messages);