<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $empId = $_SESSION['employee_id'];
  $getEmployeeDataQuery = "SELECT * FROM employee_table WHERE employee_id = '$empId';";
  $employeeDataResult = mysqli_query($conn, $getEmployeeDataQuery);
  $employeeDataRow = mysqli_fetch_assoc($employeeDataResult);
  $company_id = $employeeDataRow['company_id'];
  $fname = $employeeDataRow['first_name'];
  $lname = $employeeDataRow['last_name'];
  $fullname = $fname . " " . $lname;
  $email = $employeeDataRow['email'];
  $status = $employeeDataRow['status'];
  $department = $employeeDataRow['department'];
  $gender = $employeeDataRow['gender'];
  $contact = $employeeDataRow['contact_number'];
  $emptype = $employeeDataRow['employment_type'];
  $position = $employeeDataRow['position'];
  $joindate = $employeeDataRow['join_date'];
  $birthdate = $employeeDataRow['birthdate'];
  $bank = $employeeDataRow['bank_number'];
  $sss = $employeeDataRow['sss_number'];
  $philhealth = $employeeDataRow['philhealth_number'];
  $pagibig = $employeeDataRow['pagibig_number'];
  $imageUrl = $employeeDataRow['image'];
?>