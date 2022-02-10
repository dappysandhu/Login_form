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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
            echo "<script>alert(Successfully logged in!!)</script>";
						header("Location: index.php");
						die;
					}
				}
			}
			
			
			}else
		{
			echo "<script>alert(wrong username or password!)</script>";
			//echo "wrong username or password!";
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
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
      <main id="main-holder">
        <h1 id="login-header">Login</h1>
        <h5>Please enter Your username and password</h5>

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
          value="Login"
          id="login-form-submit"
        />
        <br>
        <p class="login-text">Don't have an Account? <br> <a href="register.php"><strong>Click to Register</strong></a></p>
        </form>

      </main>
</body>
</html>