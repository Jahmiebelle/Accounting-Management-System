<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $currentMonth = date('Y-m');
  $getEmployeeQuery = "SELECT * FROM employee_table;";
  $getEmployeeResult = mysqli_query($conn, $getEmployeeQuery);
  
  while($empTableRow = mysqli_fetch_assoc($getEmployeeResult)){
    $employee_id = $empTableRow['employee_id'];
    $payslipRecordQuery = "SELECT * FROM payroll_history_table WHERE DATE_FORMAT(month_year, '%Y-%m') = '$currentMonth' AND employee_id = '$employee_id';";
    $payslipRecordResult = mysqli_query($conn, $payslipRecordQuery);
    $empWorkQuery = "SELECT * FROM employee_work_table WHERE employee_id = '$employee_id';";
    $empWorkResult = mysql_query($conn, $empWorkQuery);
    $empWorkRow = mysqli_fetch_assoc($empWorkResult);
    $empHourlyRate = $empWorkRow['hourly_rate'];
  
    
    //dito na pipili, if nag eexist na update nalang yung payroll history nya this month, and if not existing mag iinsert ng new record sa payroll history.
    if(mysqli_num_rows($payslipRecordResult) > 0){
      
    }
    else{
      
    }
  }
  
?>