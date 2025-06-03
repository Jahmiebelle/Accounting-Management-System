<?php
  include '../../Login/db.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $deptId = $_POST['id'];
  
  $deleteDepartment = "DELETE FROM department_table WHERE department_id = '$deptId'";
  if (mysqli_query($conn, $deleteDepartment)) {
  echo "Department Deleted Successfully!";
  } 
  else {
  echo "SQL Error: " . mysqli_error($conn);
  }
  

?>