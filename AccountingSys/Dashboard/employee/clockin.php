<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockInId = (int)$_POST['clock_in_id'];
  $clockInDate = new DateTime();
  $thisDay = $clockInDate->format('Y-m-d');
  $clockInTimeFormatted = $clockInDate->format('H:i:s');
  
  $updateClockInQuery = "UPDATE admin_employee_attendance SET clock_in = '$clockInTimeFormatted' WHERE employee_id = $clockInId AND DATE_FORMAT(employee_date, '%Y-%m-%d') = '$thisDay';";
  $clockInResult = mysqli_query($conn, $updateClockInQuery);
  if($clockInResult){
    echo "You've Clocked in! " . $clockInTimeFormatted;
  }
  else{
    echo mysqli_error($conn);
  }
  
?>