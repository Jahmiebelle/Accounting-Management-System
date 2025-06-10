<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockInId = $_POST['clock_in_id'];
  $clockInTime = $_POST['clock_in_curtime'];
  
  $clockInTimeObj = new DateTime($clockInTime);
  $clockInHour = $clockInTimeObj->modify('H');
  $clockInMin = $clockInTimeObj->modify('i');
  $clockInSecs = $clockInTimeObj->modify('s');
  $updateClockIn = "UPDATE admin_employee_attendance SET clock_in = '$clockInTime' WHERE employee_id = '$clockInId' AND employee_date = CURDATE();";
  $clockInResult = mysqli_query($conn, $updateClockIn);
  if($clockInResult){
    echo "You are now Clocked in!";
  }
  else{
    echo mysqli_error($conn);
  }
  
  $clockOutId = $_POST['clock_out_id'];
  $clockOutTime = $_POST['clock_out_curtime'];
  $updateClockOut = "UPDATE admin_employee_attendance SET clock_out = '$clockOutTime' WHERE employee_id = '$clockInId' AND employee_date = CURDATE();";
  $clockOutResult = mysqli_query($conn, $updateClockOut);
  if($clockOutResult){
    echo "Clocked out! Thanks for your hardwork!";
  }
  else{
    echo mysqli_error($conn);
  }
  $subtractInString = '-' . $clockInHour . " hours -" . $clockInMin . " minutes -" . $clockInSecs . " seconds";
  
  $endTime = new DateTime($clockOutTime);
  $endTime->modify($subtractInString);
  $todayWorkHours = $endTime->format('H:i:s');
  $todayOvertime = "00:00:00";
  if($endTime->format('H') > 8){
    $todayOvertime = $endTime->modify('-8 hours');
  }
  $updateTotalHours = "UPDATE admin_employee_attendance SET employee_overtime = '$todayOvertime', total_hours = '$todayWorkHours';";
  $updateHoursResult = mysqli_query($conn, $updateTotalHours);
  if($updateHoursResult){
    echo "Updated Total & Overtime Hours.";
  }
  else{
    echo mysqli_error($conn);
  }
?>