<?php
	
		require("db.php");
		
		@$id 			= $_POST['ID'];
		@$healthinsurance 	= $_POST['healthinsurance'];
		@$others 			= $_POST['others'];
		@$loans 		= $_POST['loans'];


		$sql = mysqli_query($connection,"UPDATE deductions SET Others='$others', Loans='$loans', Health_Insurance='$healthinsurance' WHERE ID='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions updated!');
		            window.location.href='deduction.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong, Please try again!"; 
		}
 ?>