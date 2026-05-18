<?php
include "database.php";
session_start();

$user_id = $_SESSION['user_id'];
$message = $_POST['message'];

$sql = "INSERT INTO chats (sender_id, message) VALUES ('$user_id', '$message')";
$conn->query($sql);

echo "sent";
?>