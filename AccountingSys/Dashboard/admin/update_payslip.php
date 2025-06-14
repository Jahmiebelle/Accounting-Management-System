<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $currentMonth = date('Y-m');
  $firstDayInMonth = date('Y-m-01');
  $getEmployeeQuery = "SELECT * FROM employee_table;";
  $getEmployeeResult = mysqli_query($conn, $getEmployeeQuery);
  
  while($empTableRow = mysqli_fetch_assoc($getEmployeeResult)){
    $employee_id = (int)$empTableRow['employee_id'];
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
    $empBasicSalary = $empHourlyRate * ($empTotalHours - $empTotalOvertime);
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
      //auto complete past payslips tsaka rereset yung work table
      $completePreviousQuery = "UPDATE payroll_history_table SET is_complete = 1 WHERE month_year < '$firstDayInMonth';";
      $completePreviousResult = mysqli_query($conn, $completePreviousQuery);
      $resetWorkTableQuery = "UPDATE employee_work_table SET total_hours_worked = 0, total_overtime_hours = 0, total_working_days = 0 WHERE employee_id = $employee_id;";
      $resetWorkTableResult = mysqli_query($conn, $resetWorkTableQuery);
      //icheck yung current value ng attendance for this month then rerecompute work table, kahit walang attendance, for accidental purposes lng
      $getTotalHoursQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(total_hours))) AS total_hours FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      $getTotalOvertimeQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(employee_overtime))) AS total_overtime FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      $countDaysQuery = "SELECT COUNT(attendance_id) AS days_of_work FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      
      $totalHoursResult = mysqli_query($conn, $getTotalHoursQuery);
      $totalOvertimeResult = mysqli_query($conn, $getTotalOvertimeQuery);
      $countDaysResult = mysqli_query($conn, $countDaysQuery);
      
      $totalHoursRow = mysqli_fetch_assoc($totalHoursResult);
      $totalOvertimeRow = mysqli_fetch_assoc($totalOvertimeResult);
      $totalDaysRow = mysqli_fetch_assoc($countDaysResult);
      
      $totalHoursTime = $totalHoursRow['total_hours'];
      $totalOvertimeTime = $totalOvertimeRow['total_overtime'];
      $totalDayCount = (int)$totalDaysRow['days_of_work'];
      
      //seperate yung time into 3parts like this 12:01:00 into ['12', '01', '00'] then acces yung index zero para makuha yung hours, then yun yung ilalagay sa employee_work_table hehe
      $totalHoursArray = explode(':', $totalHoursTime);
      $totalHours = (int)$totalHoursArray[0];
      $totalOvertimeArray = explode(':', $totalOvertimeTime);
      $totalOvertime = (int)$totalOvertimeArray[0];
      
      //now update na natin employee_work_table
      $updateWorkHoursQuery = "UPDATE employee_work_table SET total_hours_worked = $totalHours, total_overtime_hours = $totalOvertime, total_working_days = $totalDayCount WHERE employee_id = $clockOutId;";
      $workHoursResult = mysqli_query($conn, $updateWorkHoursQuery);
      if($workHoursResult){
        echo $overtimeHoursWorked;
      }
      else{
        echo mysqli_error($conn);
      }
          
      
      //after i complete at mag reset.. I rerecompute na yung payslips this month
      $empWorkQuery = "SELECT * FROM employee_work_table WHERE employee_id = '$employee_id';";
      $empWorkResult = mysqli_query($conn, $empWorkQuery);
      $empWorkRow = mysqli_fetch_assoc($empWorkResult);
      if(!$empWorkRow){
        continue;
      }
      $empHourlyRate = $empWorkRow['hourly_rate'];
      $empTotalHours = $empWorkRow['total_hours_worked'];
      $empTotalOvertime = $empWorkRow['total_overtime_hours'];
      $empBasicSalary = $empHourlyRate * ($empTotalHours - $empTotalOvertime);
      $empOvertimePay = $empTotalOvertime * ($empHourlyRate * 1.2);
      $empGrossPay = $empBasicSalary + $empOvertimePay;
      $incomeTax = $basicRate * $empGrossPay;
      $sssTax = $sssRate * $empGrossPay;
      $philhealthTax = $philhealthRate * $empGrossPay;
      $pagibigTax = $pagibigRate * $empGrossPay;
      $totalDeductions = $incomeTax + $sssTax + $philhealthTax + $pagibigTax;
      $empNetPay = $empGrossPay - $totalDeductions;
      $updatePayslipQuery = "UPDATE payroll_history_table SET employee_id = $employee_id, first_name = '$emp_fn', last_name = '$emp_ln', basic_salary = $empBasicSalary, overtime_pay = $empOvertimePay, gross_pay = $empGrossPay, income_tax = $incomeTax, sss = $sssTax, philhealth = $philhealthTax, pagibig = $pagibigTax, total_deductions = $totalDeductions, net_pay = $empNetPay WHERE employee_id = $employee_id AND is_complete = 0;";
      if(mysqli_query($conn, $updatePayslipQuery)){
        //edi nice
      }
      else{
        echo "SQL Error: " . mysqli_error($conn);
      }
      
    }
  }
  
?>