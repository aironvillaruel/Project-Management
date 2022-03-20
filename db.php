<?php
	$connection = mysqli_connect('localhost', 'root', 'agentairon03');

	if (!$connection)
	{
		die("Database Connection Failed" . mysql_error());
	}

	$select_db = mysqli_select_db($connection,'digi_pay');
	if (!$select_db)
	{
		die("Database Selection Failed" . mysqli_error($connection));
	}
?>