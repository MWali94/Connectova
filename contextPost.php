<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Context Post</title>
</head>

<body>

    <h1>Drop Your Context 📖</h1>
    <p>Turn your everyday moment into lore.</p>

    <!-- Context Post Form -->
    <form method="POST" action="save_context_post.php">

        <input type="text" name="username" placeholder="Your username">
        <br><br>

        <textarea name="context" placeholder="What happened? Keep it short and real... 👀" maxlength="280"></textarea>
        <br><br>

        <span id="char-count">280 characters remaining</span>
        <br><br>

        <button type="submit" onclick="return validateContextForm()">Post Your Context</button>

    </form>

    <!-- Posted Contexts Feed -->
    <div id="context-feed">
        <h2>Recent Lore 🗂️</h2>

        <!-- Posts will be loaded here dynamically -->
        <div id="posts-container"></div>

    </div>

    <!-- Reaction Button Template (used per post) -->
    <template id="reaction-template">
        <div class="post-reactions">
            <button onclick="reactToPost('fire', postId)">Fire 🔥 <span class="count" id="count-fire">0</span></button>
            <button onclick="reactToPost('slay', postId)">Slay ✨ <span class="count" id="count-slay">0</span></button>
            <button onclick="reactToPost('ate', postId)">Ate 🍽️ <span class="count" id="count-ate">0</span></button>
            <button onclick="reactToPost('hellnah', postId)">Hell Nahhh 💀 <span class="count" id="count-hellnah">0</span></button>
            <button onclick="reactToPost('cooked', postId)">Cooked 🍳 <span class="count" id="count-cooked">0</span></button>
            <button onclick="reactToPost('bruh', postId)">Bruh 🙄 <span class="count" id="count-bruh">0</span></button>
            <button onclick="reactToPost('canon', postId)">Canon 📖 <span class="count" id="count-canon">0</span></button>
            <button onclick="reactToPost('peak', postId)">Peak ⬆️ <span class="count" id="count-peak">0</span></button>
            <button onclick="reactToPost('valid', postId)">Valid ✔️ <span class="count" id="count-valid">0</span></button>
            <button onclick="reactToPost('insane', postId)">Insane ⚠️ <span class="count" id="count-insane">0</span></button>
            <button onclick="reactToPost('realll', postId)">Realll ☁️ <span class="count" id="count-realll">0</span></button>
            <button onclick="reactToPost('wild', postId)">Wild ⚡ <span class="count" id="count-wild">0</span></button>
        </div>
    </template>

    <script>

        // Character countdown for context box
        let textarea = document.querySelector('textarea[name="context"]');
        let charCount = document.getElementById('char-count');

        textarea.addEventListener('input', function() {
            let remaining = 280 - textarea.value.length;
            charCount.textContent = remaining + ' characters remaining';
        });

        // Validate before submitting
        function validateContextForm() {
            let username = document.querySelector('input[name="username"]').value.trim();
            let context = document.querySelector('textarea[name="context"]').value.trim();

            if (!username) {
                alert("Please enter your username.");
                return false;
            }

            if (!context) {
                alert("Please write your context before posting.");
                return false;
            }

            return true;
        }

        // Load posts from backend
        function loadPosts() {
            fetch('get_context_posts.php')
            .then(res => res.json())
            .then(posts => {
                let container = document.getElementById('posts-container');
                container.innerHTML = '';

                posts.forEach(post => {
                    let div = document.createElement('div');
                    div.classList.add('context-post');
                    div.innerHTML = `
                        <p><strong>@${post.username}</strong></p>
                        <p>${post.context}</p>
                        <div class="post-reactions" id="reactions-${post.id}">
                            <button onclick="reactToPost('fire', ${post.id})">Fire 🔥 <span id="count-fire-${post.id}">${post.reactions.fire || 0}</span></button>
                            <button onclick="reactToPost('slay', ${post.id})">Slay ✨ <span id="count-slay-${post.id}">${post.reactions.slay || 0}</span></button>
                            <button onclick="reactToPost('ate', ${post.id})">Ate 🍽️ <span id="count-ate-${post.id}">${post.reactions.ate || 0}</span></button>
                            <button onclick="reactToPost('hellnah', ${post.id})">Hell Nahhh 💀 <span id="count-hellnah-${post.id}">${post.reactions.hellnah || 0}</span></button>
                            <button onclick="reactToPost('cooked', ${post.id})">Cooked 🍳 <span id="count-cooked-${post.id}">${post.reactions.cooked || 0}</span></button>
                            <button onclick="reactToPost('bruh', ${post.id})">Bruh 🙄 <span id="count-bruh-${post.id}">${post.reactions.bruh || 0}</span></button>
                            <button onclick="reactToPost('canon', ${post.id})">Canon 📖 <span id="count-canon-${post.id}">${post.reactions.canon || 0}</span></button>
                            <button onclick="reactToPost('peak', ${post.id})">Peak ⬆️ <span id="count-peak-${post.id}">${post.reactions.peak || 0}</span></button>
                            <button onclick="reactToPost('valid', ${post.id})">Valid ✔️ <span id="count-valid-${post.id}">${post.reactions.valid || 0}</span></button>
                            <button onclick="reactToPost('insane', ${post.id})">Insane ⚠️ <span id="count-insane-${post.id}">${post.reactions.insane || 0}</span></button>
                            <button onclick="reactToPost('realll', ${post.id})">Realll ☁️ <span id="count-realll-${post.id}">${post.reactions.realll || 0}</span></button>
                            <button onclick="reactToPost('wild', ${post.id})">Wild ⚡ <span id="count-wild-${post.id}">${post.reactions.wild || 0}</span></button>
                        </div>
                    `;
                    container.appendChild(div);
                });
            })
            .catch(err => {
                console.error('Failed to load posts:', err);
            });
        }

        // Send reaction to backend
        function reactToPost(reactionType, postId) {
            fetch('save_context_reaction.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ reaction: reactionType, post_id: postId })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('count-' + reactionType + '-' + postId).textContent = data.new_count;
            })
            .catch(err => {
                console.error('Reaction failed:', err);
            });
        }

        // Load posts when page opens
        loadPosts();

    </script>

</body>
</html>