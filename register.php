
<?php
    $server="localhost";
    $username="root";
    $password="agentairon03";
    $dbname="digi_pay";


    $connection=mysqli_connect($server,$username,$password,$dbname);

    if(isset($_POST['submit'])){

        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['fullname']) && !empty($_POST['email']))
        {
            $uname=$_POST['username'];
            $pass=$_POST['password'];
            $name=$_POST['fullname'];
            $email=$_POST['email'];

            $sql="insert into user(UserName,Password,Fullname,Email) values('$uname' , '$pass' , '$name', '$email')";

            $run=mysqli_query($connection,$sql) or die(mysqli_error());

            if($run){
                echo '<script>alert("Information Submitted")</script>';

            }
            else {
               echo '<script>alert("Failed to Submit")</script>';
            }
        }
    else{
        echo '<script>alert("Please provide Information")</script>';
    }
    }

   ?>



<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/3ccfe5001c.js" crossorigin="anonymous"></script>
</head>
<body>
	<br>
	 <form action="" method="post">
	<div class="loginbox">
		<img src="css/money.png" class="logo">
		<h1 style="font-family:Courier New">Register Here</h1>
		<form>
			<p style="font-family:Courier New">Username:</p>
			<input type="text" name="username" placeholder="Enter Username">
			<p style="font-family:Courier New">Password:</p>
			<input type="password" name="password" placeholder="Enter Password">
			<p style="font-family:Courier New">Full Name:</p>
			<input type="text" name="fullname" placeholder="Enter Fullname">
			<p style="font-family:Courier New">Email:</p>
			<input type="email" name="email" placeholder="Enter Email">
			<input type="submit" name="submit" value="Login">
			<p>Already have an account? <a href="login.php">Click Here</a></p>
	</div>
</body>
</html>