<?php
  include("db.php")
?>

<?php
  $query  = mysqli_query($connection,"SELECT * from overtime");
  while($row=mysqli_fetch_array($query))
  {
    @$rate           = $row['Rate'];
  }

  $query  = mysqli_query($connection,"SELECT * from salary");
  while($row=mysqli_fetch_array($query))
  {
    @$salary           = $row['Salary_Rate'];
  }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Payroll</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/deduction.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/3ccfe5001c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/dataTables.min.css">
	<link href="css/search.css" rel="stylesheet">
</head>
<body>
	<br>
	<header>
	</div><h1 style="color: #39ca74; font-family: Courier New;">DIGI<span>PAY</span></h1>
	<nav>
		<ul>
			<br>
			<li><a href="home.php" style="font-family: Courier New;"><i class="fas fa-home"></i></i>Home</a></li>
			<li><a href="employee.php"style="font-family: Courier New;"><i class="fas fa-info-circle"></i>Employee Information</a></li>
			<li><a href="deduction.php" style="font-family: Courier New;"><i class="fas fa-chalkboard-teacher"></i>Salary Deduction</a></li>
			<li><a href="payroll.php" style="font-family: Courier New;"><i class="far fa-money-bill-alt"></i>Payroll</a></li>
			<li><a href="login.php" style="font-family: Courier New;"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
		</ul>
	</nav>
	</header>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#overtime" class="btn btn-warning" style="border-radius:0%"> <i class="fa fa-hourglass-half"></i> Update Overtime Rate</button>
                <button type="button" data-toggle="modal" data-target="#salary" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-money-bill-alt"></i> Update Salary Rate</button>
                <p align="right">Overtime Rate (Per Hour): <big><b><?php echo $rate; ?>.00</b></big></p>
                <p align="right">Salary Rate:<big><b><?php echo $salary; ?>.00</b></big></p>
                <p align="center" style="font-size: 20px; font-family:Courier New"><big><b>Payroll</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-hover table-condensed table-responsive" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr>
                          <th><p align="center">Fullname</p></th>
                          <th><p align="center">Overtime</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Deductions</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query  = mysqli_query($connection,"SELECT * from overtime");
                          while($row=mysqli_fetch_array($query))
                          {
                            $rate   = $row['Rate'];
                          }

                          $query  = mysqli_query($connection,"SELECT * from salary");
                          while($row=mysqli_fetch_array($query))
                          {
                            $salary_rate   = $row['Salary_Rate'];
                          }

                          $query  = mysqli_query($connection,"SELECT * from employee");
                          while($row=mysqli_fetch_array($query))
                          {
                            $lname           = $row['LastName'];
                            $fname           = $row['FirstName'];
                            $deduction       = $row['Deduction'];
                            $overtime        = $row['Overtime'];
                            $bonus           = $row['Bonus'];

                            $over     = $row['Overtime'] * $rate;
                            $bonus     = $row['Bonus'];
                            $deduction  = $row['Deduction'];
                            $income   = $over + $bonus + $salary_rate;
                            $netpay   = $income - $deduction;
                        ?>
                        <tr>
                          <td align="center"><?php echo $fname?> <?php echo $lname?></td>
                          <td align="center"><big><b><?php echo $overtime?></b></big> hrs</td>
                          <td align="center"><big><b><?php echo $bonus?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $deduction?></b></big>.00</td>
                          <td align="center"><big><b><?php echo 'Php. ' .$netpay. ''?></b></big>.00</td>
                        </tr>
                        <?php } ?>
                      </tbody>      
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

           <!-- this modal is for OT-->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">        
          <!-- content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter <big><b>Overtime</b></big> rate (per hour):</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_ot.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit"  style="border-radius:0%">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
        <!-- this modal is for SAL -->
      <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter <big><b>Salary</b></big> rate:</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_sal.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit" style="border-radius:0%">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

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