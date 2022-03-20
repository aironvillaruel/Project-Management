<?php
include("db.php");

$sql = mysqli_query($connection,"SELECT * from deductions WHERE ID='1'");
  while($row = mysqli_fetch_array($sql))
  {
    $healthinsurance = $row['Health_Insurance'];
    $loans = $row['Loans'];
    $others = $row['Others'];

  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Account</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/deduction.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/3ccfe5001c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/dataTables.min.css">
</head>
<body>
  <br>
	<header>
	</div><h1 style="color: #39ca74; font-family: Courier New;">DIGI<span>PAY</span></h1>
	<nav>
		<ul>
      <br>
			<li><a href="home.php" style="font-family: Courier New;"><i class="fas fa-home"></i></i>Home</a></li>
			<li><a href="employee.php" style="font-family: Courier New;"><i class="fas fa-info-circle"></i>Employee Information</a></li>
			<li><a href="deduction.php" style="font-family: Courier New;"><i class="fas fa-chalkboard-teacher"></i>Salary Deduction</a></li>
			<li><a href="payroll.php" style="font-family: Courier New;"><i class="far fa-money-bill-alt"></i>Payroll</a></li>
			<li><a href="login.php" style="font-family: Courier New;"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul>
	</nav>
	</header>
	</div>
	 <?php
        $id=$_REQUEST['Employee_ID'];
        $query = "SELECT * from employee where Employee_ID='".$id."'";
        $result = mysqli_query($connection,$query) or die ( mysql_error());

        $query  = mysqli_query($connection,"SELECT * from overtime");
        while($row=mysqli_fetch_array($query))
        {
          $rate   = $row['Rate'];
        }

        $query  = mysqli_query($connection,"SELECT * from salary");
        while($row=mysqli_fetch_array($query))
        {
          $salary   = $row['Salary_Rate'];
        }

        while ($row = mysqli_fetch_assoc($result))
        {
            $overtime     = $row['Overtime'] * $rate;
            $bonus     = $row['Bonus'];
            $deduction  = $row['Deduction'];
            $income   = $overtime + $bonus + $salary;
            $netpay   = $income - $deduction;
          ?>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['Employee_ID'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                    	<br><br>
                      <h3><?php echo $row['LastName']; ?>, <?php echo $row['FirstName']; ?></h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Deduction/s  :</label>
                    <div class="col-sm-4">
                    <select name="deduction" class="form-control" required>
                      <option value=""><?php echo $row['Deduction'];?></option>
                      <option value="<?php echo $healthinsurance; ?>">Health-Insurance</option>
                      <option value="<?php echo $loans; ?>">Loans</option>
                      <option value="<?php echo $others; ?>">Others</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Overtime (hours)  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="overtime" class="form-control" value="<?php echo $row['Overtime'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Bonus Amount:</label>
                    <div class="col-sm-4">
                      <input type="text" name="bonus" class="form-control" value="<?php echo $row['Bonus'];?>" required="required">
                    </div>
                  </div><br>

                  <div class="form-group">
                    <label class="col-lg-6 control-label">Net Pay  : <?php echo $netpay;?>.00</label>
                    
                  </div><br><br>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" style="border-radius:0%" value="Update" class="btn btn-danger">
                      <a href="employee.php" style="border-radius:0%" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/jquery.min.js"></script>
    <script src="asset/bootstrap.min.js"></script>
    <script src="asset/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="asset/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>
</body>
</html>