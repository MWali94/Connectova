<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectova Messenger</title>

    <link rel="stylesheet" href="chat.css">

    <!-- Icons -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>

<div class="main-container">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo-area">
            <h2>Connectova</h2>
            <button class="new-chat-btn">
                <i class="fa-solid fa-pen"></i>
            </button>
        </div>

        <!-- SEARCH -->
        <div class="search-box">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search conversations">
        </div>

        <!-- FILTERS -->
        <div class="chat-filters">
            <button class="active">All</button>
            <button>Unread</button>
            <button>Groups</button>
        </div>

        <!-- USER LIST -->
        <div class="chat-list">

            <div class="chat-card active-chat">

                <div class="avatar-wrapper">
                    <img src="https://i.pravatar.cc/100?img=11">
                    <span class="online-dot"></span>
                </div>

                <div class="chat-info">
                    <div class="top-row">
                        <h4>Sana Malik</h4>
                        <span>10:30 AM</span>
                    </div>

                    <div class="bottom-row">
                        <p>Working on Connectova UI 🔥</p>
                        <span class="unread-badge">2</span>
                    </div>
                </div>

            </div>

            <div class="chat-card">

                <div class="avatar-wrapper">
                    <img src="https://i.pravatar.cc/100?img=32">
                </div>

                <div class="chat-info">
                    <div class="top-row">
                        <h4>Team Dev</h4>
                        <span>9:15 AM</span>
                    </div>

                    <div class="bottom-row">
                        <p>Database schema completed.</p>
                    </div>
                </div>

            </div>

            <div class="chat-card">

                <div class="avatar-wrapper">
                    <img src="https://i.pravatar.cc/100?img=25">
                    <span class="online-dot"></span>
                </div>

                <div class="chat-info">
                    <div class="top-row">
                        <h4>Usman Tariq</h4>
                        <span>Yesterday</span>
                    </div>

                    <div class="bottom-row">
                        <p>Let's deploy tomorrow.</p>
                    </div>
                </div>

            </div>

        </div>

    </aside>

    <!-- CHAT SECTION -->
    <section class="chat-section">

        <!-- HEADER -->
        <div class="chat-header">

            <div class="header-left">

                <img src="https://i.pravatar.cc/100?img=11">

                <div>
                    <h3>Sana Malik</h3>
                    <span>Online now</span>
                </div>

            </div>

            <div class="header-icons">
                <i class="fa-solid fa-phone"></i>
                <i class="fa-solid fa-video"></i>
                <i class="fa-solid fa-image"></i>
                <i class="fa-solid fa-circle-info"></i>
            </div>

        </div>

        <!-- CHAT BODY -->
        <div class="chat-body">

            <div class="message incoming">

                <img src="https://i.pravatar.cc/100?img=11">

                <div class="message-content">
                    <p>
                        Hey! Have you completed the messaging module?
                    </p>
                    <span>10:22 AM</span>
                </div>

            </div>

            <div class="message outgoing">

                <div class="message-content">
                    <p>
                        Almost done. Adding realtime AJAX functionality now 🚀
                    </p>
                    <span>10:25 AM</span>
                </div>

            </div>

            <div class="message incoming">

                <img src="https://i.pravatar.cc/100?img=11">

                <div class="message-content">
                    <p>
                        Nice! The UI looks modern 🔥
                    </p>
                    <span>10:26 AM</span>
                </div>

            </div>

        </div>

        <!-- TYPING -->
        <div class="typing-area">
            <span></span>
            <span></span>
            <span></span>
            <p>Sana is typing...</p>
        </div>

        <!-- INPUT -->
        <div class="chat-input">

            <button>
                <i class="fa-regular fa-face-smile"></i>
            </button>

            <button>
                <i class="fa-solid fa-paperclip"></i>
            </button>

            <input type="text" placeholder="Type your message...">

            <button class="send-btn">
                <i class="fa-solid fa-paper-plane"></i>
            </button>

        </div>

    </section>

</div>

<script src="chat.js"></script>

</body>
</html>