// ONLY ONE SOCKET HERE
const socket = io("http://localhost:3000");

const chatBox = document.getElementById("chatBox");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.getElementById("sendBtn");
const emojiBtn = document.getElementById("emojiBtn");

console.log("Frontend loaded");

// receive message
socket.on("receive_message", (data) => {
  const div = document.createElement("div");
  div.classList.add("message");
  div.innerText = data.message;
  chatBox.appendChild(div);
});

// send message
sendBtn.addEventListener("click", () => {
  const message = messageInput.value;
  if (!message.trim()) return;

  const data = { message };

  socket.emit("send_message", data);

  fetch("api/save_message.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  });

  messageInput.value = "";
});

// Emoji picker initialization
function initEmojiPicker() {
  if (typeof EmojiButton === "undefined") {
    console.warn("EmojiButton still undefined after load.");
    return;
  }

  const picker = new EmojiButton({ position: "top-end" });
  const button = document.getElementById("emojiBtn");
  const input = document.getElementById("messageInput");

  if (button) {
    button.addEventListener("click", () => {
      picker.togglePicker(button);
    });
  }

  if (input) {
    picker.on("emoji", (emoji) => {
      input.value += emoji;
    });
  }
}

if (typeof EmojiButton !== "undefined") {
  initEmojiPicker();
} else {
  // Try loading a fallback script dynamically (unpkg)
  const s = document.createElement("script");
  s.src = "https://unpkg.com/@joeattardi/emoji-button@4.6.2/dist/index.min.js";
  s.async = true;
  s.onload = () => {
    console.log("Fallback emoji script loaded.");
    initEmojiPicker();
  };
  s.onerror = () => {
    console.warn(
      "Failed to load fallback emoji script. Emoji picker disabled.",
    );
    // initialize inline/simple emoji picker fallback
    initInlineEmojiPicker();
  };
  document.head.appendChild(s);
}

// Simple inline emoji picker fallback (no external library)
function initInlineEmojiPicker() {
  const picker = document.getElementById("emojiPicker");
  const button = document.getElementById("emojiBtn");
  const input = document.getElementById("messageInput");
  if (!picker || !button || !input) return;

  const emojis = [
    "😀",
    "😁",
    "😂",
    "🤣",
    "😊",
    "😍",
    "😘",
    "😜",
    "🤔",
    "😎",
    "😢",
    "😭",
    "😡",
    "👍",
    "👎",
    "🙏",
    "🎉",
    "❤️",
    "🔥",
    "🙌",
    "✨",
    "🥳",
    "🤖",
    "🤩",
  ];

  picker.innerHTML = "";
  emojis.forEach((e) => {
    const b = document.createElement("button");
    b.type = "button";
    b.className = "emoji";
    b.textContent = e;
    b.addEventListener("click", () => {
      input.value += e;
      input.focus();
      picker.classList.add("hidden");
      picker.setAttribute("aria-hidden", "true");
    });
    picker.appendChild(b);
  });

  button.addEventListener("click", (ev) => {
    ev.preventDefault();
    picker.classList.toggle("hidden");
    const hidden = picker.classList.contains("hidden");
    picker.setAttribute("aria-hidden", hidden ? "true" : "false");
  });
}
