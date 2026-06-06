<!DOCTYPE html>
<html>
<head>
    <title>Connectova Chat</title>
    <link rel="stylesheet" href="chat.css">
</head>

<body>

<div class="chat-container">

    <h2>Connectova Chat</h2>

    <div id="chatBox"></div>

    <div class="input-area">

        <input
            type="text"
            id="messageInput"
            placeholder="Type message"
        >

        <!-- Emoji Button -->
        <div class="emoji-container">
            <button type="button" id="emojiBtn">😊</button>

            <!-- Hidden Emoji Picker -->
            <div id="emojiWrapper"
                 style="display:none; position:absolute; bottom:60px; right:10px; z-index:9999;">
                <emoji-picker id="emojiPicker"></emoji-picker>
            </div>
        </div>

        <button type="button" id="sendBtn">Send</button>

    </div>

</div>

<!-- Socket.IO -->
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<!-- Emoji Picker Element (IMPORTANT) -->
<script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>

<!-- Chat JS -->
<script src="chat.js"></script>

</body>
</html>