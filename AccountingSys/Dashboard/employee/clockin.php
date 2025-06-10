<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockInId = (int)$_POST['clock_in_id'];
  $empName = $_POST['emp_name'];
  $clockInDate = new DateTime();
  $clockInTimeFormatted = $clockInDate->format('H:i:s');
  
  $updateClockInQuery = "UPDATE admin_employee_attendance SET clock_in = '$clockInTimeFormatted' WHERE employee_id = $clockInId;";
  $clockInResult = mysqli_query($conn, $updateClockInQuery);
  if($clockInResult){
    echo "You've Clocked in! Welcome " . $empName;
  }
  else{
    echo mysqli_error($conn);
  }
  
?>