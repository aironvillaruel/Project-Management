<?php 
	require('db.php');
	
	$id=$_GET['Employee_ID'];
	$query = "DELETE FROM employee WHERE Employee_ID=$id"; 
	$result = mysqli_query($connection,$query) or die ( mysql_error());
	header("Location: employee.php"); 
 ?>