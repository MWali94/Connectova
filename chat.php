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
        <input type="text" id="messageInput" placeholder="Type message">

       
        <button id="emojiBtn">😊</button>
        <div id="emojiPicker" class="emoji-picker hidden" aria-hidden="true"></div>
       
        <button id="sendBtn">Send</button>
    </div>

</div>



   <!-- Socket.IO MUST load first -->
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<!-- Emoji library (with fallback to unpkg if jsDelivr is blocked) -->
<script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@4.6.2/dist/index.min.js" onerror="this.onerror=null;this.src='https://unpkg.com/@joeattardi/emoji-button@4.6.2/dist/index.min.js'"></script>


<!-- Your app -->
<script src="chat.js"></script>



</body>
</html>