<?php
  include '../../Login/db.php';

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
  
  $updateData = "UPDATE employee_table SET employee_id = '$id', first_name = '$fn', last_name = '$ln', gender = '$gender', birthdate = '$birthdate', join_date = '$joindate', department = '$dept', position = '$position', employment_type = '$emptype', status = '$status', bank_number = '$bank', sss_number = '$sss', philhealth_number = '$philhealth', pagibig_number = '$pagibig', email = '$email', contact = '$contact' WHERE company_id = '$cid'";
  
  mysqli_query($conn, $updateData);
  
  echo "Data Saved Successfully!";

?>