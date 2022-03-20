<?php
  require('db.php');
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $username = mysqli_real_escape_string($connection,$username);

        $password = stripslashes($password);
        $password = mysqli_real_escape_string($connection,$password);

        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($connection,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: home.php");
        }
        else
        {
          ?>
          <script>
            alert('Login Invalid, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	 <form action="" method="post">
	<div class="loginbox">
		<img src="css/money.png" class="logo">
		<h1 style="font-family:Courier New">Login Here</h1>
		<form>
			<p style="font-family:Courier New">Username:</p>
			<input type="text" name="username" placeholder="Enter Username">
			<p style="font-family:Courier New">Password:</p>
			<input type="password" name="password" placeholder="Enter Password">
			<input type="submit" name="submit" value="Login">
			<p>Don't have an account?  <a href="register.php">Register Here</a></p>
	</div>

   <script src="asset/jquery.min.js"></script>
    <script src="asset/bootstrap.min.js"></script>
</body>
</html>