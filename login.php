<?php
session_start();
include("db_connection.php");

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            OR username='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        if(password_verify(
            $password,
            $user['password']
        )){

            $_SESSION['id'] =
            $user['id'];

            $_SESSION['username'] =
            $user['username'];

            header(
            "Location: myprofile.php"
            );

            exit();

        }else{

            $error =
            "Wrong password";

        }

    }else{

        $error =
        "User not found";

    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Connectova Login
</title>

</head>

<body>

<div>

    <div>

        <img
        src="logo.png"
        alt="Connectova Logo">

        <h1>
            Connectova
        </h1>

        <p>
        Connect. Share. Inspire.
        </p>

    </div>


<?php

if($error != ""){

echo "<p>$error</p>";

}

?>


<form method="POST">

<label>
Email or Username
</label>

<input
type="text"
name="email"
placeholder="example@mail.com"
required>


<label>Password</label>

<input
type="password"
name="password"
required>


<a href="#">
Forgot password?
</a>


<button type="submit">

Sign In →

</button>

</form>



<p>
or continue with
</p>


<button>
Continue with Google
</button>


<button>
Continue with Apple
</button>


<p>

Don't have an account?

<a href="register.php">

Sign Up

</a>

</p>


</div>

</body>
</html>