<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();

  $empId = $_SESSION['employee_id'];
  $newPassword = $_POST['new_pass'];
  $updatePassQuery = "UPDATE employee_table SET password = '$newPassword' WHERE employee_id = '$empId';";
  $updatePassResult = mysqli_query($conn, $updatePassQuery);
?>