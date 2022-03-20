 <?php
 include("add_emp.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
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
  <h1 style="color: #39ca74; font-family: Courier New;">DIGI<span>PAY</span></h1>
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
  <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="button"><i class="fa fa-user-plus"></i> Add Employee Records</button>
                <p align="center"><big><b>Employee Records </b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table align="center" class="table table-hover table-condensed" id="myTable">
                      <thead>
                        <tr>
                          <th><p align="center">Fullname</p></th>
                          <th><p align="center">Contact</p></th>
                          <th><p align="center">Email</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = mysqli_connect('localhost', 'root', 'agentairon03');
                          if (!$conn)
                          {
                            die("Database Connection Failed" . mysql_error());
                          }

                          $select_db = mysqli_select_db($conn,'digi_pay');
                          if (!$select_db)
                          {
                            die("Database Selection Failed" . mysql_error($conn));
                          }
                          
                          $query=mysqli_query($conn,"select * from employee ORDER BY Employee_ID asc")or die(mysql_error());
                          while($row=mysqli_fetch_array($query))
                          {
                     
                            $id     =$row['Employee_ID'];
                            $fname  =$row['FirstName'];
                            $lname  =$row['LastName'];
                            $type   =$row['Employee_Type'];
                            $deduction   =$row['Deduction'];
                            $overtime   =$row['Overtime'];
                            $bonus   =$row['Bonus'];
                        ?>

                        <tr align="center">
                          <td align="center"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php echo $row['LastName'] ?>  <?php echo $row['FirstName'] ?></a></td>
                          <td align="center"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php echo $row['Contact'] ?></td>
                          <td align="center"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php echo $row['Email'] ?></td>
                          <td align="center"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php if ($row['Gender'] == 'Male') { echo '<i class="fas fa-male"></i> M'; } else { echo '<i class="fas fa-female"></i> F'; } ?></a></td>
                          <td align="center" class="emp"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php if ($row['Employee_Type'] == 'Shiftworker') { echo '<span class="label label-primary">'.$row["Employee_Type"].'</span>'; } else if ($row['Employee_Type'] == 'Full-Time') { echo '<span class="label label-danger">'.$row["Employee_Type"].'</span>'; } else if ($row['Employee_Type'] == 'Part-Time') { echo '<span class="label label-warning">'.$row["Employee_Type"].'</span>'; } else { echo '<span class="label label-success">'.$row["Employee_Type"].'</span>'; } ?></a></td>
                          <td align="center"><a href="view_employee.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>" style="text-decoration:none; color: #001a00;" title="Update"><?php echo $row['Department'] ?></a></td>
                          <td align="center" class="emote">
                            <a class="btn btn-warning" style="border-radius:60px; color: #001a00;" href="view_account.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>"><i class="fa fa-file-invoice"></i></a>
                            <a class="btn btn-danger" style="border-radius:60px; color: #001a00;" href="delete.php?Employee_ID=<?php echo $row["Employee_ID"]; ?>"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                       </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

  
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add New Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
              <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" required="required">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">Contact</label>
                  <div class="col-sm-8">
                    <input type="number" name="contact" class="form-control" placeholder="Contact Number" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label">Residential Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" placeholder="Residential Address" required>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-4 control-label">Employee Type</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control" placeholder="Employee Type" required>
                      <option value="">Employee Type</option>
                      <option value="Part-Time">Part-Time</option>
                      <option value="Full-Time">Full-Time</option>
                      <option value="Shiftworker">Shiftworker</option>
                      <option value="Casual">Casual</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Department</label>
                  <div class="col-sm-8">
                    <select name="division" class="form-control" placeholder="Division" required>
                      <option value="">Please Select...</option>
                      <option value="Finance">Finance</option>
                      <option value="Marketing">Marketing</option>
                      <option value="Purchase">Purchase</option>
                      <option value="Personnel">Personnel</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Control">Control</option>
                      <option value="Admin">Admin</option>
                      <option value="Human Resource">Human Resource</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <button type="submit" name="submit" class="btn btn-success" style="border-radius:60px;"> <i class="fa fa-check "></i> Insert</button>
                    <button type="reset" name="" class="btn btn-danger" style="border-radius:60px;"> <i class="fa fa-times "></i> Reset</button>
                  </div>
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

    <!-- DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!--Modal -->
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