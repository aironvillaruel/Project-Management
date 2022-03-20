<?php 

  include("db.php");

  $id         = $_POST['id'];
  $lname      = $_POST['lname'];
  $fname      = $_POST['fname'];
  $gender     = $_POST['gender'];
  $dept   = $_POST['department'];
  $emp_type   = $_POST['emp_type'];
  $contact    = $_POST['contact'];
  $address    = $_POST['address'];
  $email    = $_POST['email'];

  $sql = mysqli_query($connection,"UPDATE employee SET Employee_Type='$emp_type', LastName='$lname', FirstName='$fname', Gender='$gender', Department='$dept', Contact='$contact', Address='$address' , Email='$email' WHERE Employee_ID='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Employee record has been updated');
      window.location.href='employee.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Something went wrong!');
      window.location.href='employee.php';
    </script>
    <?php 
  }
?>