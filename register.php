<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);
			header("Location: login.php");
      echo "Congratulations! Registration Completed!!";

			die;
		}else
		{
			echo "Please enter some valid information!";

		}
	}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta
        name="viewport"
        content="width= device-width, initial-scale=1.0"
      />
      <title>Registration</title>
      <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
      <main id="main-holder">
        <h1 id="login-header">Register</h1>
        <h5>Please enter rquired credentials to Register</h5>

      <form action="" method="POST">
        <input
          type="text"
          name="user_name"
          id="username-field"
          class="login-form-field"
          placeholder="Username" 
          required
        />
        <br>
        <input
          type="password"
          name="password"
          id="password-field"
          class="login-form-field"
          placeholder="Password"
          required
        />
        <br>
        <input        
          type="submit"
          name="submit"
          value="Register"
          id="login-form-submit"
        />
        <br>
        <p class="register-text">Alredy have an Account? <br> <a href="login.php"><strong>Click to Login</strong></a></p>
        </form>

      </main>
    </body>

    </html>