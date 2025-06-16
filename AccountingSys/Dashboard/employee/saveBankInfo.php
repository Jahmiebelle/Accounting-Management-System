<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  
  $empId = $_SESSION['employee_id'];
  $bank = $_POST['bank'];
  $sss = $_POST['sss'];
  $philhealth = $_POST['philhealth'];
  $pagibig = $_POST['pagibig'];
  
  $updateEmployeeBank = "UPDATE employee_table SET bank_number = '$bank', sss_number = '$sss', philhealth_number = '$philhealth', pagibig_number = '$pagibig' WHERE employee_id = '$empId';";
  $employeeBankResult =  mysqli_query($conn, $updateEmployeeBank);
  
  header("Location: employee_profile.php");
  
?>