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
  
  
  $insertData = "INSERT INTO employee_table (employee_id, company_id, password, first_name, middle_name, last_name, email, status, department, gender, contact_number, employment_type, position, join_date, birthdate, bank_number, sss_number, philhealth_number, pagibig_number, is_active) VALUES($id, $cid, '$password', $fn', 'N/A', '$ln', '$email', '$status', '$dept', $gender', '$contact', '$emptype', '$position', '$joindate', '$birthdate', '$bank', '$sss', '$philhealth', '$pagibig', '1')";
  
  if(mysqli_query($conn, $insertData)){
    echo "Employee Created!";
  }
  else {
    echo "Cannot Create Employee";
  }

  ?>