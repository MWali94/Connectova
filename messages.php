<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectova - Messages</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="css/custom.css">
</head>
<body style="overflow: hidden;">

        <!-- Top Navbar -->
    <header class="top-navbar" data-aos="fade-down">
        <div style="width: 240px; display: flex; align-items: center;">
            <!-- Dummy spacer to center search bar -->
        </div>
        <div class="search-bar">
            <i class="fa-solid fa-search" style="color: var(--text-muted)"></i>
            <input type="text" placeholder="Search Connectova...">
        </div>
        <div class="nav-icons" style="gap: 16px;">
            <button class="theme-toggle-btn" title="Toggle Theme" onclick="alert('System theme is locked to dark mode')">
                <i class="fa-solid fa-sun"></i>
            </button>
        </div>
    </header>

    <div class="messenger-layout" data-aos="fade-in" data-aos-duration="600">
        <!-- Sidebar -->
        <div class="chat-sidebar">
            <div class="chat-sidebar-header">
                <h3 style="font-weight: 800; font-size: 24px;">Messages</h3>
                <div class="search-bar" style="background: #FFF; margin-top: 16px; width: 100%; border: 1px solid var(--border-color); border-radius: 50px; padding: 10px 16px; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-search" style="color: var(--text-muted); font-size: 14px;"></i>
                    <input type="text" placeholder="Search chats..." style="border: none; outline: none; background: transparent; width: 100%;">
                </div>
            </div>
            
            <div class="chat-list">
                <div class="chat-item active" onclick="alert('Select Chat')">
                    <img src="https://ui-avatars.com/api/?name=Sana+Malik&background=random" class="avatar">
                    <div class="info">
                        <h5>Sana Malik</h5>
                        <p>Are we still meeting tomorrow?</p>
                    </div>
                    <span class="time">10:30 AM</span>
                </div>
                <div class="chat-item" onclick="alert('Select Chat')">
                    <img src="https://ui-avatars.com/api/?name=Usman+Tariq&background=random" class="avatar">
                    <div class="info">
                        <h5>Usman Tariq</h5>
                        <p>I sent you the project files.</p>
                    </div>
                    <span class="time">Yesterday</span>
                </div>
                <div class="chat-item" onclick="alert('Select Chat')">
                    <img src="https://ui-avatars.com/api/?name=Rehma&background=random" class="avatar">
                    <div class="info">
                        <h5>Rehma</h5>
                        <p>Haha that's so funny! 😂</p>
                    </div>
                    <span class="time">Mon</span>
                </div>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="chat-main">
            <div class="chat-header">
                <div class="d-flex align-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=Sana+Malik&background=random" class="avatar">
                    <div>
                        <h4 style="margin: 0; font-size: 18px;">Sana Malik</h4>
                        <span style="font-size: 13px; color: #10b981; font-weight: 600;">Online</span>
                    </div>
                </div>
                <div class="nav-icons">
                    <i class="fa-solid fa-phone" onclick="alert('Starting voice call...')"></i>
                    <i class="fa-solid fa-video" onclick="alert('Starting video call...')"></i>
                    <i class="fa-solid fa-circle-info" onclick="alert('Chat info')"></i>
                </div>
            </div>
            
            <div class="chat-messages">
                <div class="msg msg-received">
                    Hey Ali! Are we still meeting tomorrow for the UI review?
                </div>
                <div class="msg msg-sent">
                    Hi Sana! Yes absolutely. Same time at the cafe?
                </div>
                <div class="msg msg-received">
                    Perfect. See you there! I have some new designs to show you.
                </div>
            </div>
            
            <div class="chat-input-area">
                <i class="fa-solid fa-paperclip" onclick="alert('Attach file')"></i>
                <i class="fa-regular fa-image" onclick="alert('Send image')"></i>
                <input type="text" class="form-control" placeholder="Type a message..." style="flex: 1;" onkeypress="if(event.key === 'Enter') alert('Message sent!')">
                <i class="fa-regular fa-face-smile" onclick="alert('Emoji picker')"></i>
                <button class="btn btn-primary" style="padding: 12px 20px;" onclick="alert('Message sent!')"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
