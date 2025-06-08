<?php
  include '../../Login/db.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $cid = $_POST['add_cid'];
  $id = $_POST['add_id'];
  $password = $_POST['add_password'];
  $fn = $_POST['add_fn'];
  $ln = $_POST['add_ln'];
  $gender = $_POST['add_gender'];
  $birthdate = $_POST['add_birthdate'];
  $joindate = $_POST['add_joindate'];
  $dept = $_POST['add_dept'];
  $position = $_POST['add_position'];
  $emptype = $_POST['add_type'];
  $status = $_POST['add_status'];
  $bank = $_POST['add_bank'];
  $sss = $_POST['add_sss'];
  $philhealth = $_POST['add_philhealth'];
  $pagibig = $_POST['add_pagibig'];
  $email = $_POST['add_email'];
  $contact = $_POST['add_contact'];
  
  $checkQuery = "SELECT * FROM employee_table WHERE company_id = '$cid' OR employee_id = '$id';";
  $checkQueryResult = mysqli_query($conn, $checkQuery);
  if(mysqli_num_rows($checkQueryResult) > 0){
    echo "Company Id / Employee Id already Exist";
  }
  else {
    $insertData = "INSERT INTO employee_table VALUES('$id', '$cid', '$password', '$fn', 'N/A', '$ln', '$email', '$status', '$dept', '$gender', '$contact', '$emptype', '$position', '$joindate', '$birthdate', '$bank', '$sss', '$philhealth', '$pagibig', '1')";
    $getPositionRate = "SELECT * FROM role_hourly_rate WHERE role_name = '$position';";
    $positionRateResult = mysqli_query($conn, $getPositionRate);
    $rateRow = mysqli_fetch_assoc($positionRateResult);
    $hourlyRate = (int)$rateRow['hourly_rate'];
    $insertWork = "INSERT INTO employee_work_table VALUES('$id', '$hourlyRate', 0, 0, 0, 0);";
    
    if(mysqli_query($conn, $insertData)){
      mysqli_query($conn, $insertWork);
      echo "Employee Created!";
    }
    else {
      echo "Cannot Create Employee";
    }
  }
  ?>