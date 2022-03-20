<?php
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

  if(isset($_POST['submit'])!="")
  {
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];
    $contact    = $_POST['contact'];
    $address    = $_POST['address'];
    $email    = $_POST['email'];
    
    $sql="insert into employee(FirstName, LastName, Gender, Employee_Type, Department, Contact, Address, Email) values('$fname','$lname','$gender', '$type', '$division', '$contact', '$address', '$email')";
    $run=mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if($sql)
    {
      ?>
        <script>
            alert('Employee has been added!');
            window.location.href='employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('An Error Occured');
            window.location.href='home.php';
        </script>
      <?php 
    }
  }
?>