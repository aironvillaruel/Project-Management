<?php
	
		require("db.php");
		
		@$id 			= $_POST['salary_id'];
		@$salary		= $_POST['salary_rate'];


		$sql = mysqli_query($connection,"UPDATE salary SET Salary_Rate='$salary' WHERE ID='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Salary rate has been updated!');
		            window.location.href='payroll.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong, Please try again!"; 
		}
 ?>