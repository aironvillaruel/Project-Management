<?php
  include("add_emp.php");
  $conn = mysqli_connect('localhost', 'root', 'agentairon03');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  $select_db = mysqli_select_db($conn,'digi_pay');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysql_error());
  }

  $query  = mysqli_query($conn,"SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id = $row['ID'];
    $healthinsurance = $row['Health_Insurance'];
    $loans = $row['Loans'];
    $others = $row['Others'];
    $total = $healthinsurance + $others + $loans;
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Salary Deduction</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/deduction.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/3ccfe5001c.js" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  <br>
	<header>
	  </div><h1 style="color: #39ca74;  font-family: Courier New;" >DIGI<span>PAY</span></h1>
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
            <br> <br> <br>
              <form class="form-horizontal" action="#" name="form">
                <table id="center">
               	<thead>
               <tr>
          		<th><center>Health Insurance</center></th>
          		<th><center>Loans</center></th>
          		<th><center>Others</center></th>
               </tr>
               </thead>
               <tbody>
               <tr>
                      <td align="center"><?php echo $healthinsurance; ?>.00</td>
                      <td align="center"><?php echo $loans; ?>.00</td>
                      <td align="center"><?php echo $others; ?>.00</td>                          
                </tr>
              </tbody>
                </table>
                <br><br>
                <div class="form-group">
               <center><h4><label class="text">Total Deductions : <?php echo $total; ?>.00</label></h4></center> 
                </div>	

                <div class="form-group">
                 <center>  <label class="textbtn"><button type="button" data-toggle="modal" data-target="#deductions" class="btn" style="border-radius:0%"> <i class="fa fa-edit"></i> Update Deduction Details</button></label></center> 
                </div>
              </form>  
          <!-- Modal -->
  	<div class="modal fade" id="deductions" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Payroll Deduction List</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_deduc.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Health Insurance</label>
                  <div class="col-sm-8">
                    <input type="text" name="healthinsurance" class="form-control" required="required" value="<?php echo $healthinsurance; ?>">
                  </div>
                </div>
                       <div class="form-group">
                  <label class="col-sm-4 control-label">Loans</label>
                  <div class="col-sm-8">
                    <input type="text" name="loans" class="form-control" value="<?php echo $loans; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Others</label>
                  <div class="col-sm-8">
                    <input type="text" name="others" class="form-control" value="<?php echo $others; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-primary" style="border-radius:0%" value="Make Changes">
                  </div>
                </div>
              </form>

            </div>
          </div>
  </div>
  
</div>
		
               <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/jquery.min.js"></script>
    <script src="asset/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
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