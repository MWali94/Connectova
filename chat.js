// SEND MESSAGE
$("#sendBtn").click(function () {
  let message = $("#messageInput").val();
  let receiver_id = $("#receiver_id").val();

  $.ajax({
    url: "send_message.php",
    method: "POST",
    data: {
      message: message,
      receiver_id: receiver_id,
    },
    success: function () {
      $("#messageInput").val("");
      loadMessages();
    },
  });
});

// LOAD MESSAGES
function loadMessages() {
  let receiver_id = $("#receiver_id").val();

  $.ajax({
    url: "fetch_messages.php",
    method: "POST",
    data: {
      receiver_id: receiver_id,
    },
    success: function (data) {
      $("#chatBox").html(data);
    },
  });
}

// REALTIME POLLING
setInterval(loadMessages, 1000);

function loadMessages() {
  $.ajax({
    url: "fetch_messages.php",

    success: function (data) {
      $("#chat-box").html(data);
    },
  });
}

setInterval(loadMessages, 1000);
