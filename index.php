<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<main id="main-holder">
	<a class="link" href="logout.php">Logout</a>
	<h1>You have successfully Logged in!!</h1>

	<br>
	<p class="home"> Hello, <?php echo $user_data['user_name']; ?></p>
</body>
</html>