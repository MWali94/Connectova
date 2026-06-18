const socket = io("http://localhost:3000");

const chatBox = document.getElementById("chatBox");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.getElementById("sendBtn");
const emojiBtn = document.getElementById("emojiBtn");
const uploadBtn = document.getElementById("uploadBtn");
const fileInput = document.getElementById("fileInput");

console.log("Frontend loaded");

// ======================
// EMOJI PICKER
// ======================
window.addEventListener("load", () => {
  const wrapper = document.getElementById("emojiWrapper");
  const picker = document.getElementById("emojiPicker");
  const input = document.getElementById("messageInput");

  emojiBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    wrapper.classList.toggle("show");
  });

  picker.addEventListener("emoji-click", (event) => {
    input.value += event.detail.unicode;
    input.focus();
  });

  document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target) && !emojiBtn.contains(e.target)) {
      wrapper.classList.remove("show");
    }
  });
});

// ======================
// MESSAGE RENDER (IMPORTANT FIX)
// ======================
function renderMessage(msg) {
  const div = document.createElement("div");
  div.classList.add("message");

  // OUTGOING / INCOMING
  div.classList.add(msg.sender_id == 2 ? "outgoing" : "incoming");

  const content = document.createElement("div");
  content.classList.add("message-content");

  // TEXT MESSAGE
  if (msg.message_type === "text") {
    const p = document.createElement("p");
    p.innerText = msg.message;
    content.appendChild(p);
  }

  // IMAGE MESSAGE
  else if (msg.message_type === "image") {
    const img = document.createElement("img");
    img.src = msg.file_path;
    img.style.maxWidth = "200px";
    img.style.borderRadius = "10px";
    content.appendChild(img);
  }

  // DOCUMENT MESSAGE
  else if (msg.message_type === "document") {
    const a = document.createElement("a");
    a.href = msg.file_path;
    a.target = "_blank";
    a.innerText = "📄 Download File";
    content.appendChild(a);
  }

  div.appendChild(content);
  chatBox.appendChild(div);
  chatBox.scrollTop = chatBox.scrollHeight;
}

// ======================
// FETCH MESSAGES (IMPORTANT FIX)
// ======================
function loadMessages() {
  fetch("api/fetch_message.php")
    .then((res) => res.text())
    .then((text) => {
      console.log("RAW RESPONSE:", text);

      const data = JSON.parse(text); // convert manually

      chatBox.innerHTML = "";

      data.forEach((msg) => {
        renderMessage(msg);
      });
    })
    .catch((err) => console.error("FETCH ERROR:", err));
}

// call on load
loadMessages();

// ======================
// SEND TEXT MESSAGE
// ======================
sendBtn.addEventListener("click", sendMessage);

messageInput.addEventListener("keypress", (e) => {
  if (e.key === "Enter") sendMessage();
});

function sendMessage() {
  const message = messageInput.value.trim();
  if (!message) return;

  socket.emit("send_message", { message });

  fetch("api/save_message.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      message,
      message_type: "text",
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      console.log("DB RESPONSE:", data);
      loadMessages(); // refresh chat
    })
    .catch((err) => console.error(err));

  messageInput.value = "";
}

// ======================
// FILE UPLOAD
// ======================
uploadBtn.addEventListener("click", () => fileInput.click());

fileInput.addEventListener("change", () => {
  const file = fileInput.files[0];
  if (!file) return;

  const formData = new FormData();
  formData.append("file", file);

  fetch("api/upload_file.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log("UPLOAD RESPONSE:", data);

      if (!data.success) return;

      socket.emit("send_message", {
        message: data.filename,
        type: data.type,
        fileUrl: data.fileUrl,
      });

      return fetch("api/save_message.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          message: data.filename,
          message_type: data.type,
          file_name: data.filename,
          file_path: data.fileUrl,
        }),
      });
    })
    .then((res) => res?.json())
    .then((result) => {
      console.log("FILE SAVED:", result);
      loadMessages(); // refresh chat
    })
    .catch((err) => console.error("UPLOAD ERROR:", err));

  fileInput.value = "";
});
