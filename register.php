<?php

include("db_connection.php");

$error = "";
$success = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$fullname =
$_POST['fullname'];

$username =
$_POST['username'];

$email =
$_POST['email'];

$password =
$_POST['password'];

$confirm =
$_POST['confirm_password'];

$birth =
$_POST['birth_date'];

$gender =
$_POST['gender'];


if($password != $confirm){

$error =
"Passwords do not match";

}
else{

$hashedPassword =
password_hash(
$password,
PASSWORD_DEFAULT
);

$sql =
"INSERT INTO users(

full_name,
username,
email,
password,
birth_date,
gender

)

VALUES(

'$fullname',
'$username',
'$email',
'$hashedPassword',
'$birth',
'$gender'

)";


if(mysqli_query(
$conn,
$sql
)){

header(
"Location: login.php"
);

exit();

}
else{

$error =
"Registration failed";

}

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
Create Account - Connectova
</title>

</head>

<body>

<div>

<button type="button">

←

</button>


<div>

<span>●</span>
<span>●</span>
<span>●</span>
<span>●</span>
<span>●</span>

</div>


<h1>

Create your account

</h1>

<p>

Join Connectova and start connecting with the world.

</p>



<?php

if($error!=""){

echo "<p>$error</p>";

}

?>


<form
method="POST">

<div>

<button type="button">

📷

</button>

<button type="button">

+

</button>

<p>Add Photo</p>

</div>



<input
type="text"
name="fullname"
placeholder="Full Name"
required>


<input
type="text"
name="username"
placeholder="Username"
required>



<input
type="email"
name="email"
placeholder="Email"
required>



<input
type="password"
name="password"
placeholder="Password"
required>



<input
type="password"
name="confirm_password"
placeholder="Confirm Password"
required>



<input
type="date"
name="birth_date"
required>



<select
name="gender">

<option>

Gender

</option>

<option>

Male

</option>

<option>

Female

</option>

<option>

Other

</option>

</select>






<button type="submit">

Create Account →

</button>

</form>



<p>

Already have account?

<a href="login.php">

Login

</a>

</p>

</div>

</body>
</html>