<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
  
  $empId = $_SESSION['employee_id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $emp_gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $updateEmployeePersonal = "UPDATE employee_table SET first_name = '$fname', last_name = '$lname', gender = '$emp_gender', birthdate = '$birthdate', email = '$email', contact_number = '$contact';";
  $updateEmployeeResult = mysqli_query($conn, $updateEmployeePersonal);
  
  header("Location: employee_profile.php");
  
?>