<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectova - UI/UX Design</title>
    <style>
        body { font-family: 'Arial', sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        h2 { color: #1877f2; margin-bottom: 1.5rem; }
        input { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #1877f2; border: none; border-radius: 6px; color: white; font-weight: bold; cursor: pointer; font-size: 16px; }
        button:hover { background: #166fe5; }
        .footer { margin-top: 1rem; font-size: 14px; color: #606770; }
    </style>
</head>
<body>

<div class="card">
    <h2>Connectova</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <div class="footer">
        <a href="#">Forgot password?</a> · <a href="#">Sign up</a>
    </div>
</div>

<?php
if(isset($_POST['login'])){
    $user = $_POST['username'];
    echo "<script>alert('Welcome to Connectova, ' + '$user');</script>";
}
?>

</body>
</html>