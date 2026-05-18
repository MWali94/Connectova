<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reactions</title>
</head>

<body>

    <h1>React to this Poll</h1>

    <div class="reactions">
        <button onclick="react('fire', pollId)">Fire 🔥 <span id="count-fire">0</span></button>
        <button onclick="react('slay', pollId)">Slay ✨ <span id="count-slay">0</span></button>
        <button onclick="react('ate', pollId)">Ate 🍽️ <span id="count-ate">0</span></button>
        <button onclick="react('hellnah', pollId)">Hell Nahhh 💀 <span id="count-hellnah">0</span></button>
        <button onclick="react('cooked', pollId)">Cooked 🍳 <span id="count-cooked">0</span></button>
        <button onclick="react('bruh', pollId)">Bruh 🙄 <span id="count-bruh">0</span></button>
        <button onclick="react('canon', pollId)">Canon 📖 <span id="count-canon">0</span></button>
        <button onclick="react('peak', pollId)">Peak ⬆️ <span id="count-peak">0</span></button>
        <button onclick="react('valid', pollId)">Valid ✔️ <span id="count-valid">0</span></button>
        <button onclick="react('insane', pollId)">Insane ⚠️ <span id="count-insane">0</span></button>
        <button onclick="react('realll', pollId)">Realll ☁️ <span id="count-realll">0</span></button>
        <button onclick="react('wild', pollId)">Wild ⚡ <span id="count-wild">0</span></button>
        <button onclick="react('hits', pollId)">Hits <span id="count-hits">0</span></button>
    </div>

    <script>

        // pollId will be passed in dynamically by your PHP teammate
        function react(reactionType, pollId) {
            fetch('save_reaction.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ reaction: reactionType, poll_id: pollId })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('count-' + reactionType).textContent = data.new_count;
            })
            .catch(err => {
                console.error('Reaction failed:', err);
            });
        }

        // Load existing reaction counts when page opens
        function loadReactions(pollId) {
            fetch('get_reactions.php?poll_id=' + pollId)
            .then(res => res.json())
            .then(data => {
                Object.keys(data).forEach(reaction => {
                    let el = document.getElementById('count-' + reaction);
                    if (el) el.textContent = data[reaction];
                });
            })
            .catch(err => {
                console.error('Failed to load reactions:', err);
            });
        }

    </script>

</body>
</html>