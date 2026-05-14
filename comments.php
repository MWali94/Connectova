<?php
// Connectova Comments Section

include('db_connection.php'); 

echo "<h2>Post Comments</h2>";


echo '
<form action="comments.php" method="POST">
    <textarea name="comment_text" placeholder="Write a comment..." required></textarea><br>
    <button type="submit" name="submit_comment">Post Comment</button>
</form>
';


if(isset($_POST['submit_comment'])){
    $comment = $_POST['comment_text'];
    
    echo "<p style='color:green;'>Your comment has been posted!</p>";
}


echo "
<div style='margin-top:20px; border:1px solid #ccc; padding:10px;'>
    <p>Sample Comment: Yeh Connectova ka pehla comment hai!</p>
    <button>👍 Like</button>
    <button>👎 Dislike</button>
</div>
";
?>