<html>
<body>
Register a new account:

<form method="post" action="register.php">
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	if(user_exists($email))
	{
		echo "Email already registered.";
		return;
	}

	// Connect to users table in database
	$servername = "localhost";
	$username = "root";
	$db_password = "";
	$dbname = "mydb";
	$conn = new mysqli($servername, $username, $db_password, $dbname);
	$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
	$result = $conn->query($sql);

	if($result === TRUE)
	{
		echo "Registration successful. Try to login now.";
	}
	else
	{
		echo "Registration failed. Try again.";
	}
}

function user_exists($email)
{	
	// Connect to users table in database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM users WHERE email='$email'";

	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		// User already exists
		return true;
	}
	return false;
}

?>

<p>Go to <a href="login.php">Login</a>.</p>

</body>
</html>
