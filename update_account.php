<?php 

  include("db.php");

  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];
  $bonus        = $_POST['bonus'];

  $sql = mysqli_query($connection,"UPDATE employee SET Deduction='$deduction', Overtime='$overtime', Bonus='$bonus' WHERE Employee_ID='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Account has been updated!');
      window.location.href='employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Something went wrong, Please try again!";
  }
?>