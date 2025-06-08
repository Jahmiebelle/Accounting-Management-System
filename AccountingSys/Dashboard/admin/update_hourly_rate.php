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
  
  $selectInstructor = "SELECT * FROM employee_table WHERE position = 'instructor';";
  $selectProfessor = "SELECT * FROM employee_table WHERE position = 'professor';";
  $selectPartTime = "SELECT * FROM employee_table WHERE position = 'part_time_staff';";
  
  $getInstructorResult = mysqli_query($conn, $selectInstructor);
  $getProfessorResult = mysqli_query($conn, $selectProfessor);
  $getPartTimeResult = mysqli_query($conn, $selectPartTime);
  
  while($instructorRow = mysqli_fetch_assoc($getInstructorResult)){
    $instructor_id = $instructorRow['employee_id'];
    $updateInstructorRate = "UPDATE employee_work_table SET hourly_rate = '$instructorRate' WHERE employee_id = '$instructor_id';";
    mysqli_query($conn, $updateInstructorRate);
  }
  
  while($professorRow = mysqli_fetch_assoc($getProfessorResult)){
    $professor_id = $professorRow['employee_id'];
    $updateProfessorRate = "UPDATE employee_work_table SET hourly_rate = '$instructorRate' WHERE employee_id = '$professor_id';";
    mysqli_query($conn, $updateProfessorRate);
  }
  
  while($partTimeRow = mysqli_fetch_assoc($getPartTimeResult)){
    $part_time_id = $partTimeRow['employee_id'];
    $updatePartTimeRate = "UPDATE employee_work_table SET hourly_rate = '$partTimeRate' WHERE employee_id = '$part_time_id';";
    mysqli_query($conn, $updatePartTimeRate);
  }

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