<?php
  include '../../Login/db.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $cid = $_POST['cid'];
  $id = $_POST['id'];
  $fn = $_POST['fn'];
  $ln = $_POST['ln'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $joindate = $_POST['joindate'];
  $dept = $_POST['dept'];
  $position = $_POST['position'];
  $emptype = $_POST['emptype'];
  $status = $_POST['status'];
  $bank = $_POST['bank'];
  $sss = $_POST['sss'];
  $philhealth = $_POST['philhealth'];
  $pagibig = $_POST['pagibig'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $is_active = $_POST['is_active'];
  
  $updateData = "UPDATE employee_table SET employee_id = '$id', first_name = '$fn', last_name = '$ln', gender = '$gender', birthdate = '$birthdate', join_date = '$joindate', department = '$dept', position = '$position', employment_type = '$emptype', status = '$status', bank_number = '$bank', sss_number = '$sss', philhealth_number = '$philhealth', pagibig_number = '$pagibig', email = '$email', contact_number = '$contact', is_active = '$is_active' WHERE company_id = '$cid'";
  
  $getPositionRate = "SELECT * FROM role_hourly_rate WHERE role_name = '$position';";
  $positionRateResult = mysqli_query($conn, $getPositionRate);
  $rateRow = mysqli_fetch_assoc($positionRateResult);
  $hourlyRate = (int)$rateRow['hourly_rate'];
  $updateWork = "UPDATE employee_work_table SET hourly_rate = $hourlyRate WHERE employee_id = '$id';";
  
  if (mysqli_query($conn, $updateData)) {
    mysqli_query($conn, $updateWork);
    echo "Data Saved Successfully!";
  } 
  else {
    echo "SQL Error: " . mysqli_error($conn);
  }
  
?>