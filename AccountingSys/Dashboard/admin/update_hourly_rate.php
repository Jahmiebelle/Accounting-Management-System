<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $professorRate = (int)$_POST['professor_rate'];
  $instructorRate = (int)$_POST['instructor_rate'];
  $partTimeRate = (int)$_POST['part_time_rate'];
  
  $instructorRateQuery = "UPDATE role_hourly_rate SET hourly_rate = '$instructorRate' WHERE role_name = 'instructor';";
  $professorRateQuery = "UPDATE role_hourly_rate SET hourly_rate = '$professorRate' WHERE role_name = 'professor';";
  $partTimeRateQuery = "UPDATE role_hourly_rate SET hourly_rate = '$partTimeRate' WHERE role_name = 'part_time_staff';";
  
  $instructorResult = mysqli_query($conn, $instructorRateQuery);
  $professorResult = mysqli_query($conn, $professorRateQuery);
  $partTimeResult = mysqli_query($conn, $partTimeRateQuery);
  
  if($instructorResult && $professorResult && $partTimeResult){
    echo "tax updated successfully";
  }
  else{
    echo "can't update the tax";
  }
  header("Location: admin_payroll.php");
?>