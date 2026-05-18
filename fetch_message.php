<?php

include "db.php";

$sender_id = 1;   // session user (later)
$receiver_id = 2; // selected chat user

$sql = "SELECT * FROM chats
        WHERE (sender_id=$sender_id AND receiver_id=$receiver_id)
        OR (sender_id=$receiver_id AND receiver_id=$sender_id)
        ORDER BY created_at ASC";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['sender_id'] == $sender_id) {

        // OUTGOING
        echo "
        <div class='message outgoing'>
            <div class='message-content'>
                <p>{$row['message']}</p>
                <span>{$row['created_at']}</span>
            </div>
        </div>";
    }
    else {

        // INCOMING
        echo "
        <div class='message incoming'>
            <div class='message-content'>
                <p>{$row['message']}</p>
                <span>{$row['created_at']}</span>
            </div>
        </div>";
    }
}

?>