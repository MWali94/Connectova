<?php
// Connectova - Public Feed with Likes & Comments Feature
// Developer: Hassan Arif

include('db_connection.php');

echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>";
echo "<h1 style='color: #333; text-align: center;'>Connectova Public Feed</h1>";
echo "<hr>";

// ==========================================
// 1. SAMPLE POST DISPLAY AREA
// ==========================================
echo "
<div style='border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 8px; background-color: #f9f9f9;'>
    <h3 style='margin-top: 0; color: #007bff;'>📌 Team Project Announcement</h3>
    <p>Welcome to Connectova! We are testing the core features of our social media platform. Feel free to interact below.</p>
    
    <div style='margin-top: 15px;'>
        <form action='feed.php' method='POST' style='display: inline;'>
            <button type='submit' name='action_like' style='background-color: #28a745; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; margin-right: 5px;'>👍 Like</button>
        </form>
        <form action='feed.php' method='POST' style='display: inline;'>
            <button type='submit' name='action_dislike' style='background-color: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;'>👎 Dislike</button>
        </form>
    </div>
</div>
";

// Backend Logic for Likes
if (isset($_POST['action_like'])) {
    echo "<p style='color: green; font-size: 14px;'><b>Notification:</b> You liked this post!</p>";
}
if (isset($_POST['action_dislike'])) {
    echo "<p style='color: red; font-size: 14px;'><b>Notification:</b> You disliked this post!</p>";
}

// ==========================================
// 2. COMMENTS SECTION INTERACTIVE FORM
// ==========================================
echo "<h3 style='color: #555;'>Discussion & Comments</h3>";
echo '
<form action="feed.php" method="POST" style="margin-bottom: 20px;">
    <textarea name="user_comment" placeholder="Write a professional comment..." rows="3" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; resize: none;" required></textarea>
    <br style="margin-bottom: 10px;">
    <button type="submit" name="submit_comment" style="background-color: #007bff; color: white; border: none; padding: 8px 20px; border-radius: 4px; cursor: pointer;">Post Comment</button>
</form>
';

// ==========================================
// 3. BACKEND LOGIC: HANDLE COMMENT SUBMISSION
// ==========================================
if (isset($_POST['submit_comment'])) {
    // Trim space to avoid empty submissions
    $comment_text = trim($_POST['user_comment']); 
    
    if (!empty($comment_text)) {
        echo "<div style='border-left: 4px solid #28a745; background-color: #e8f5e9; padding: 10px; margin-top: 10px; border-radius: 4px;'>";
        echo "<p style='margin: 0; color: #2e7d32;'><b>Hassan (You):</b> " . htmlspecialchars($comment_text) . "</p>";
        echo "<small style='color: #777;'>Posted just now</small>";
        echo "</div>";
    }
}

echo "</div>"; // Main container close
?>