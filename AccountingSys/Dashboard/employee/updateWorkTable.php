<?php  
  include '../../Login/db.php';
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $currentEmpId = $_SESSION['employee_id'];
  $thisMonth = date('Y-m');
  
  $getTotalHoursQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(total_hours))) AS total_hours FROM admin_employee_attendance WHERE employee_id = $currentEmpId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  $getTotalOvertimeQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(employee_overtime))) AS total_overtime FROM admin_employee_attendance WHERE employee_id = $currentEmpId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  $countDaysQuery = "SELECT COUNT(attendance_id) AS days_of_work FROM admin_employee_attendance WHERE employee_id = $currentEmpId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  
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
  $updateWorkHoursQuery = "UPDATE employee_work_table SET total_hours_worked = $totalHours, total_overtime_hours = $totalOvertime, total_working_days = $totalDayCount WHERE employee_id = $currentEmpId;";
  $workHoursResult = mysqli_query($conn, $updateWorkHoursQuery);
?>