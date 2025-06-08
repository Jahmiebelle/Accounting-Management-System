<?php
  include '../../Login/db.php';

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $deptId = $_POST['id'];
  $deptName = $_POST['name'];
  
  $deleteDepartment = "DELETE FROM department_table WHERE department_id = '$deptId'";
  $checkDeptQuery = "SELECT * FROM employee_table WHERE department = '$deptName';";
  $checkDeptResult = mysqli_query($conn, $checkDeptQuery);
  
  if(mysqli_num_rows($checkDeptResult) > 0){
    echo "Cannot Delete Department.\nThis Department Has Employees!";
  }
  else{
    if (mysqli_query($conn, $deleteDepartment)) {
      echo "Department Deleted Successfully!";
    } 
    else {
      echo "SQL Error: " . mysqli_error($conn);
    }
  }
?>