<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $fullDeptMsg;
  $deptId = $_POST['add_dept_id'];
  $deptName = $_POST['add_dept_name'];
  $deptAbbr = $_POST['add_dept_abbr'];
  $existDeptMsg = [];
  $checkId = "SELECT * FROM department_table WHERE department_id = '$deptId';";
  if(mysqli_num_rows(mysqli_query($conn, $checkId)) > 0){
    $existDeptMsg = "id";
  }
  $checkName = "SELECT * FROM department_table WHERE department_name = '$deptName';";
  if(mysqli_num_rows(mysqli_query($conn, $checkName)) > 0){
    $existDeptMsg = "name";
  }  
  
  if(count($existDeptMsg) > 1){
    $fullDeptMsg = implode(' & ', $existDeptMsg);
  }
  else {
    $fullDeptMsg = implode('', $existDeptMsg);
  }
  
  $checkExist = "SELECT * FROM department_table WHERE department_id = '$deptId' OR department_name = '$deptName';";
  $deptExistResult = mysqli_query($conn, $checkExist);
  if(mysqli_num_rows($deptExistResult) > 0){
    echo "Department " . $fullDeptMsg . " already exists.";
  }
  else{
    $saveDeptQuery = "INSERT INTO department_table VALUES ('$deptId', '$deptName', '$deptAbbr');";
    $saveResult = mysqli_query($conn, $saveDeptQuery);
    if($saveResult){
      echo "Department created successfully!";
    }
    else{
      echo "Something's wrong in creating department.";
    }
  }
  
?>