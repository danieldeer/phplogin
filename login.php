<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	// Connect to users table in database
	$servername = "localhost";
	$username = "root";
	$db_password = "";
	$dbname = "mydb";
	$conn = new mysqli($servername, $username, $db_password, $dbname);
	$sql = "SELECT email, password FROM users WHERE email='" . $email . "'";

	$result = $conn->query($sql);

	$_SESSION["logged_in"] = false;
	if($result->num_rows > 0)
	{
		$row = $result->fetch_assoc();

		$expected_email = $row["email"];
		$expected_password = $row["password"];

		if($email == $expected_email && $password == $expected_password)
		{
			echo "Login successful. Redirecting ...";
			$_SESSION["logged_in"] = true;
			$_SESSION["user_id"] = $email;
			header("Location: member.php");
		}
	}

	if($_SESSION["logged_in"] == false)
	{
		echo "Login failed. Try again ...";
	}
}


?>


<html>
<body>

<form method="post" action="login.php">
Email: <input type="email" name="email"><br>
Password: <input type="password" name="password"><br>
<input type="submit">

<a href="register.php">Register</a>

</form>

</body>
</html>
