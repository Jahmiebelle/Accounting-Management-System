<?php
  include '../../Login/db.php';
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
  $clockOutId = (int)$_POST['clock_out_id'];
  
  $dateTimeNgayon = new DateTime();
  $thisMonth = $dateTimeNgayon->format('Y-m');
  $dateToday = $dateTimeNgayon->format('Y-m-d');
  $timeOutString = $dateTimeNgayon->format('H:i:s');
  $clockOutNgayon = clone $dateTimeNgayon;
  $updateClockOutQuery = "UPDATE admin_employee_attendance SET clock_out = '$timeOutString' WHERE employee_id = $clockOutId AND employee_date = '$dateToday';";
  $updateClockOutResult = mysqli_query($conn, $updateClockOutQuery);
  
  $getClockInQuery = "SELECT clock_in FROM admin_employee_attendance WHERE employee_id = $clockOutId AND employee_date = '$dateToday';";
  $clockInResult = mysqli_query($conn, $getClockInQuery);
  $clockInRow = mysqli_fetch_assoc($clockInResult);
  $clockInValue = $clockInRow['clock_in'];
  
  $clockInDateTime = new DateTime($clockInValue);
  $clockOutDateTime = new DateTime($timeOutString);

  $timeBetweenClock = $clockInDateTime->diff($clockOutDateTime);
  $totalHoursWorked = $timeBetweenClock->format('%H:%I:%S');
  $timeBetweenDateTime = new DateTime($totalHoursWorked);
  $totalHours = $timeBetweenClock->format('H');
  $overtimeHoursWorked;
  if ((int)$totalHours > 8) {
    $overtimeDateTime = $timeBetweenDateTime->modify('-8 hours');
    $overtimeHoursWorked = $overtimeDateTime->format('H:i:s');
  }
  else{
    $overtimeHoursWorked = '00:00:00';
  }
  $updateOvertimeAndTotal = "UPDATE admin_employee_attendance SET total_hours = '$totalHoursWorked', employee_overtime = '$overtimeHoursWorked' WHERE employee_id = $clockOutId AND employee_date = '$dateToday';";
  $updateTotalResult = mysqli_query($conn, $updateOvertimeAndTotal);
  
  
  //i uupdate yung total hours and overtime ng work table pag sasamasamahin lang yung total_hour at overtime  g employee sa admin_attendance_table
  $getTotalHoursQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(total_hours))) AS total_hours FROM admin_employee_attendance WHERE employee_id = $clockOutId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  $getTotalOvertimeQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(employee_overtime))) AS total_overtime FROM admin_employee_attendance WHERE employee_id = $clockOutId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  $countDaysQuery = "SELECT COUNT(attendance_id) AS days_of_work FROM admin_employee_attendance WHERE employee_id = $clockOutId AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';";
  
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
    echo "Sawakas";
  }
  else{
    echo mysqli_error($conn);
  }
?>