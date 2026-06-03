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
  renderRecent();
}

function renderRecent() {
  const recentRow = document.getElementById("recentRow");
  if (!recentRow) return;

  recentRow.innerHTML = "";

  recentEmojis.forEach((e) => {
    const btn = document.createElement("button");
    btn.className = "emoji";
    btn.type = "button";
    btn.textContent = e;

    btn.addEventListener("click", () => {
      messageInput.value += e;
      messageInput.focus();
    });

    recentRow.appendChild(btn);
  });
}

// ======================
// SKIN TONES
// ======================
const skinTones = ["🏻", "🏼", "🏽", "🏾", "🏿"];

const skinBaseEmojis = {
  "👍": true,
  "👎": true,
  "👋": true,
  "🙏": true,
  "💪": true,
  "✌️": true,
  "🤞": true,
  "👏": true,
  "🙌": true,
};

// ======================
// RECEIVE MESSAGE
// ======================
socket.on("receive_message", (data) => {
  const div = document.createElement("div");
  div.classList.add("message");
  div.innerText = data.message;
  chatBox.appendChild(div);
});

// ======================
// SEND MESSAGE
// ======================
sendBtn.addEventListener("click", () => {
  const message = messageInput.value;
  if (!message.trim()) return;

  socket.emit("send_message", { message });

  fetch("api/save_message.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message }),
  })
    .then((res) => res.json())
    .then((data) => console.log("DB RESPONSE:", data))
    .catch((err) => console.log("FETCH ERROR:", err));

  messageInput.value = "";
});

// ======================
// EMOJI PICKER INIT
// ======================
initInlineEmojiPicker();

function initInlineEmojiPicker() {
  const picker = document.getElementById("emojiPicker");
  const button = document.getElementById("emojiBtn");
  const input = messageInput;
  const grid = document.getElementById("emojiGrid");
  const tabs = document.querySelectorAll(".emoji-tabs .tab");

  if (!picker || !button || !input || !grid) return;
  let activeSkinMenu = null;

  function closeSkinMenu() {
    if (activeSkinMenu) {
      activeSkinMenu.remove();
      activeSkinMenu = null;
    }

    document.addEventListener("click", (e) => {
      const clickedPicker = picker.contains(e.target);
      const clickedButton = button.contains(e.target);

      const clickedSkin = activeSkinMenu && activeSkinMenu.contains(e.target);

      if (!clickedPicker && !clickedButton && !clickedSkin) {
        picker.classList.remove("show");
        picker.setAttribute("aria-hidden", "true");
        removePreview();
      }
    });
  }

  // AUTO RESIZE
  function adjustPickerHeight() {
    picker.style.maxHeight = window.innerHeight * 0.45 + "px";
  }
  window.addEventListener("resize", adjustPickerHeight);

  document.addEventListener("click", (e) => {
    if (activeSkinMenu && !activeSkinMenu.contains(e.target)) {
      closeSkinMenu();
    }
  });

  // SHORTCUT INPUT
  input.addEventListener("input", () => {
    let text = input.value;

    Object.keys(emojiShortcuts).forEach((key) => {
      if (text.includes(key)) {
        text = text.replaceAll(key, emojiShortcuts[key]);
      }
    });

    input.value = text;
  });

  // ======================
  // EMOJI DATA
  // ======================
  const emojiData = {
    smileys: [
      "😀",
      "😁",
      "😂",
      "🤣",
      "😃",
      "😄",
      "😅",
      "😆",
      "😉",
      "😊",
      "🙂",
      "🙃",
      "😋",
      "😎",
      "🤓",
      "🥸",
      "🤩",
      "🥳",
      "😇",
      "🤗",
      "😍",
      "🥰",
      "😘",
      "😗",
      "😙",
      "😚",
      "😜",
      "🤪",
      "😝",
      "🤔",
      "🫣",
      "🤭",
      "🫢",
      "😴",
      "🥱",
      "😏",
      "😒",
      "🙄",
      "😬",
      "😐",
    ],
    love: [
      "❤️",
      "🧡",
      "💛",
      "💚",
      "💙",
      "💜",
      "🖤",
      "🤍",
      "🤎",
      "💕",
      "💞",
      "💓",
      "💗",
      "💖",
      "💘",
      "💝",
      "💟",
      "❣️",
      "💔",
      "💑",
      "💏",
      "💋",
    ],
    gestures: [
      "👍",
      "👎",
      "👌",
      "✌️",
      "🤞",
      "🤟",
      "🤘",
      "🤙",
      "👏",
      "🙌",
      "👐",
      "🤲",
      "🙏",
      "💪",
      "✊",
      "👊",
      "🤛",
      "🤜",
      "🫶",
      "🤝",
      "👋",
      "☝️",
      "👇",
      "👈",
      "👉",
    ],
    food: [
      "🍎",
      "🍊",
      "🍉",
      "🍓",
      "🍒",
      "🍍",
      "🍌",
      "🥭",
      "🍇",
      "🥝",
      "🍔",
      "🍟",
      "🍕",
      "🌭",
      "🌮",
      "🌯",
      "🍗",
      "🍖",
      "🥪",
      "🍿",
      "🍩",
      "🍪",
      "🍰",
      "🎂",
      "🍫",
      "🍬",
      "☕",
      "🥤",
      "🍺",
    ],
    animals: [
      "🐶",
      "🐱",
      "🐭",
      "🐹",
      "🐰",
      "🦊",
      "🐻",
      "🐼",
      "🐨",
      "🐯",
      "🦁",
      "🐸",
      "🐵",
      "🙈",
      "🙉",
      "🙊",
      "🐧",
      "🐦",
      "🐤",
      "🦄",
      "🐝",
      "🦋",
      "🐢",
      "🐍",
      "🐬",
      "🦈",
    ],
    objects: [
      "🔥",
      "✨",
      "⚡",
      "💥",
      "💫",
      "⭐",
      "🌟",
      "💯",
      "🎉",
      "🎊",
      "🎈",
      "🎁",
      "🎮",
      "🕹️",
      "🎯",
      "🎲",
      "🎵",
      "🎶",
      "🎧",
      "📱",
      "💻",
      "⌚",
      "📷",
      "💡",
      "🔔",
      "📢",
      "🚀",
      "🌈",
    ],
  };

  let currentCategory = "smileys";

  // ======================
  // iOS STYLE PREVIEW
  // ======================
  let previewBox = null;

  function showPreview(emoji, x, y) {
    removePreview();

    previewBox = document.createElement("div");
    previewBox.textContent = emoji;
    previewBox.style.position = "fixed";
    previewBox.style.left = x + "px";
    previewBox.style.top = y + "px";
    previewBox.style.fontSize = "50px";
    previewBox.style.padding = "10px";
    previewBox.style.borderRadius = "12px";
    previewBox.style.background = "rgba(0,0,0,0.75)";
    previewBox.style.color = "#fff";
    previewBox.style.zIndex = "9999";
    previewBox.style.transform = "translate(-50%, -120%)";

    document.body.appendChild(previewBox);
  }

  function removePreview() {
    if (previewBox) {
      previewBox.remove();
      previewBox = null;
    }
  }

  // ======================
  // RENDER EMOJIS
  // ======================
  function render(category) {
    grid.innerHTML = "";

    emojiData[category].forEach((e) => {
      const btn = document.createElement("button");
      btn.className = "emoji";
      btn.type = "button";
      btn.textContent = e;

      // CLICK
      btn.addEventListener("click", () => {
        input.value += e;
        input.focus();

        updateRecent(e);
      });

      // SKIN TONE
      let pressTimer;
      let skinMenu;
      let isSkinOpen = false;

      btn.addEventListener("pointerdown", (ev) => {
        if (!skinBaseEmojis[e]) return;

        pressTimer = setTimeout(() => {
          if (isSkinOpen) return;
          isSkinOpen = true;

          document.querySelectorAll(".skin-menu").forEach((m) => m.remove());
          closeSkinMenu();

          closeSkinMenu();

          activeSkinMenu = document.createElement("div");
          skinMenu = activeSkinMenu;
          skinMenu.className = "skin-menu";

          skinMenu.className = "skin-menu";

          const base = e.replace(/[\u{1F3FB}-\u{1F3FF}]/gu, "");

          skinTones.forEach((tone) => {
            const option = document.createElement("button");
            option.type = "button";
            option.className = "skin-option";

            const finalEmoji = base + tone;
            option.textContent = finalEmoji;

            option.addEventListener("click", (ev) => {
              ev.preventDefault();
              ev.stopPropagation();

              input.value += finalEmoji;
              input.focus();

              updateRecent(finalEmoji);

              closeSkinMenu();
            });

            skinMenu.appendChild(option);
          });

          document.body.appendChild(skinMenu);

          const rect = btn.getBoundingClientRect();

          skinMenu.style.position = "fixed";
          skinMenu.style.left = rect.left + "px";
          skinMenu.style.top = rect.top - 50 + "px";
        }, 500);
      });

      btn.addEventListener("pointerup", () => clearTimeout(pressTimer));
      btn.addEventListener("pointercancel", () => clearTimeout(pressTimer));

      // close ONLY when clicking outside
      document.addEventListener("pointerdown", (e) => {
        if (skinMenu && !skinMenu.contains(e.target)) {
          closeSkinMenu();
        }
      });

      // cancel long press only if pointer fully leaves button + menu
      btn.addEventListener("mouseup", () => clearTimeout(pressTimer));

      // close when clicking anywhere outside
      document.addEventListener("click", (e) => {
        if (skinMenu && !skinMenu.contains(e.target) && e.target !== btn) {
          closeSkinMenu();
        }
      });

      // ======================
      // iOS LONG PRESS PREVIEW
      // ======================
      let previewTimer;

      btn.addEventListener("touchstart", (ev) => {
        previewTimer = setTimeout(() => {
          const t = ev.touches[0];
          showPreview(e, t.clientX, t.clientY);
        }, 400);
      });

      btn.addEventListener("touchend", () => {
        clearTimeout(previewTimer);
        removePreview();
      });

      btn.addEventListener("touchmove", () => {
        clearTimeout(previewTimer);
        removePreview();
      });

      grid.appendChild(btn);
    });
  }

  render(currentCategory);
  renderRecent();

  // ======================
  // TAB SWITCH
  // ======================
  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      currentCategory = tab.dataset.cat;
      render(currentCategory);
    });
  });

  // ======================
  // TOGGLE PICKER
  // ======================
  button.addEventListener("click", (e) => {
    e.preventDefault();

    picker.classList.toggle("show");

    picker.setAttribute(
      "aria-hidden",
      picker.classList.contains("show") ? "false" : "true",
    );

    if (picker.classList.contains("show")) adjustPickerHeight();
  });

  // ======================
  // OUTSIDE CLICK CLOSE
  // ======================
  document.addEventListener("click", (e) => {
    if (!picker.contains(e.target) && e.target !== button) {
      picker.classList.remove("show");
      picker.setAttribute("aria-hidden", "true");
      removePreview();
    }
  });
}
option.addEventListener("click", (ev) => {
  console.log("SKIN CLICKED");
});
