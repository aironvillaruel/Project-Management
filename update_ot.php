<?php
	
		require("db.php");
		
		@$id 			= $_POST['ot_id'];
		@$overtime		= $_POST['rate'];


		$sql = mysqli_query($connection,"UPDATE overtime SET Rate='$overtime' WHERE ID='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime Rate has been updated!');
		            window.location.href='payroll.php';
		        </script>
		    <?php 
		}
		else {
			echo "Something went wrong!"; 
		}
 ?>