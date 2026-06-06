// ONLY ONE SOCKET HERE
const socket = io("http://localhost:3000");

const chatBox = document.getElementById("chatBox");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.getElementById("sendBtn");
const emojiBtn = document.getElementById("emojiBtn");

console.log("Frontend loaded");

// ======================
// RECENT EMOJIS SYSTEM
// ======================
let recentEmojis = JSON.parse(localStorage.getItem("recentEmojis") || "[]");

function updateRecent(emoji) {
  recentEmojis = [emoji, ...recentEmojis.filter((e) => e !== emoji)].slice(
    0,
    8,
  );
  localStorage.setItem("recentEmojis", JSON.stringify(recentEmojis));
}

// ======================
// SIMPLE EMOJI PICKER (STABLE VERSION)
// ======================

const emojis = [
  "😀",
  "😂",
  "🤣",
  "😊",
  "😍",
  "😎",
  "😭",
  "😡",
  "👍",
  "🙏",
  "🎉",
  "🔥",
  "💯",
  "❤️",
  "🥰",
  "😴",
  "🤔",
  "🙌",
  "👌",
  "👀",
  "😜",
  "😇",
  "😏",
  "😢",
  "🤝",
];

window.addEventListener("load", () => {
  const emojiBtn = document.getElementById("emojiBtn");
  const wrapper = document.getElementById("emojiWrapper");
  const picker = document.getElementById("emojiPicker");
  const input = document.getElementById("messageInput");

  // toggle picker
  emojiBtn.addEventListener("click", () => {
    wrapper.style.display =
      wrapper.style.display === "none" || wrapper.style.display === ""
        ? "block"
        : "none";
  });

  // emoji select
  picker.addEventListener("emoji-click", (event) => {
    input.value += event.detail.unicode;
    input.focus();
  });

  // close on outside click
  document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target) && e.target !== emojiBtn) {
      wrapper.classList.remove("show");
    }
  });
});

// ======================
// RECEIVE MESSAGE
// ======================
socket.on("receive_message", (data) => {
  const div = document.createElement("div");
  div.classList.add("message");
  div.innerText = data.message;

  chatBox.appendChild(div);
  chatBox.scrollTop = chatBox.scrollHeight;
});

// ======================
// SEND MESSAGE
// ======================
sendBtn.addEventListener("click", sendMessage);

messageInput.addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    sendMessage();
  }
});

function sendMessage() {
  const message = messageInput.value.trim();

  if (!message) return;

  socket.emit("send_message", { message });

  fetch("api/save_message.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ message }),
  })
    .then((res) => res.json())
    .then((data) => {
      console.log("DB RESPONSE:", data);
    })
    .catch((err) => {
      console.error("FETCH ERROR:", err);
    });

  messageInput.value = "";
}
