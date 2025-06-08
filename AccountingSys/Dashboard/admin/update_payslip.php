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
    $emp_fn = $empTableRow['first_name'];
    $emp_ln = $empTableRow['last_name'];
    $taxRatesQuery = "SELECT * FROM admin_taxation_table;";
    $taxRatesResult = mysqli_query($conn, $taxRatesQuery);
    $taxRatesRow = mysqli_fetch_assoc($taxRatesResult);
    $sssRate = $taxRatesRow['sss_tax'];
    $philhealthRate = $taxRatesRow['philhealth_tax'];
    $pagibigRate = $taxRatesRow['pagibig_tax'];
    $basicRate = $taxRatesRow['income_tax'];
    $payslipRecordQuery = "SELECT * FROM payroll_history_table WHERE DATE_FORMAT(month_year, '%Y-%m') = '$currentMonth' AND employee_id = '$employee_id';";
    $payslipRecordResult = mysqli_query($conn, $payslipRecordQuery);
    $empWorkQuery = "SELECT * FROM employee_work_table WHERE employee_id = '$employee_id';";
    $empWorkResult = mysqli_query($conn, $empWorkQuery);
    $empWorkRow = mysqli_fetch_assoc($empWorkResult);
    if(!$empWorkRow){
      continue;
    }
    $empHourlyRate = $empWorkRow['hourly_rate'];
    $empTotalHours = $empWorkRow['total_hours_worked'];
    $empTotalOvertime = $empWorkRow['total_overtime_hours'];
    $empBasicSalary = $empHourlyRate * $empTotalHours;
    $empOvertimePay = $empTotalOvertime * ($empHourlyRate * 1.2);
    $empGrossPay = $empBasicSalary + $empOvertimePay;
    $incomeTax = $basicRate * $empGrossPay;
    $sssTax = $sssRate * $empGrossPay;
    $philhealthTax = $philhealthRate * $empGrossPay;
    $pagibigTax = $pagibigRate * $empGrossPay;
    $totalDeductions = $incomeTax + $sssTax + $philhealthTax + $pagibigTax;
    $empNetPay = $empGrossPay - $totalDeductions;
    
    
    //dito na pipili, if nag eexist na update nalang yung payroll history nya this month, and if not existing mag iinsert ng new record sa payroll history.
    if(mysqli_num_rows($payslipRecordResult) > 0){
      $updatePayslipQuery = "UPDATE payroll_history_table SET employee_id = $employee_id, first_name = '$emp_fn', last_name = '$emp_ln', basic_salary = $empBasicSalary, overtime_pay = $empOvertimePay, gross_pay = $empGrossPay, income_tax = $incomeTax, sss = $sssTax, philhealth = $philhealthTax, pagibig = $pagibigTax, total_deductions = $totalDeductions, net_pay = $empNetPay WHERE employee_id = $employee_id AND is_complete = 0;";
      if(mysqli_query($conn, $updatePayslipQuery)){
        //edi nice
      }
      else{
        echo "SQL Error: " . mysqli_error($conn);
      }
    }
    else{
      $insertPayslipQuery = "INSERT INTO payroll_history_table (month_year, employee_id, first_name, last_name, basic_salary, overtime_pay, gross_pay, income_tax, sss, philhealth, pagibig, total_deductions, net_pay) VALUES (CURDATE(), '$employee_id', '$emp_fn', '$emp_ln', $empBasicSalary, $empOvertimePay, $empGrossPay, $incomeTax, $sssTax, $philhealthTax, $pagibigTax, $totalDeductions, $empNetPay);";
      if(mysqli_query($conn, $insertPayslipQuery)){
        //nice
      }
      else{
        echo "SQL Error: " . mysqli_error($conn);
      }
    }
  }
  
?>