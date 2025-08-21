<?php  
include '../../Login/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentEmpId = $_SESSION['employee_id'] ?? 0;
if ($currentEmpId == 0) {
    exit("No employee ID found in session.");
}

$thisMonth = date('Y-m');

// Queries
$getTotalHoursQuery = "
    SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(total_hours))) AS total_hours
    FROM admin_employee_attendance
    WHERE employee_id = $currentEmpId 
      AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';
";

$getTotalOvertimeQuery = "
    SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(employee_overtime))) AS total_overtime
    FROM admin_employee_attendance
    WHERE employee_id = $currentEmpId 
      AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';
";

$countDaysQuery = "
    SELECT COUNT(attendance_id) AS days_of_work
    FROM admin_employee_attendance
    WHERE employee_id = $currentEmpId 
      AND DATE_FORMAT(employee_date, '%Y-%m') = '$thisMonth';
";

// Execute queries
$totalHoursRow = mysqli_fetch_assoc(mysqli_query($conn, $getTotalHoursQuery));
$totalOvertimeRow = mysqli_fetch_assoc(mysqli_query($conn, $getTotalOvertimeQuery));
$totalDaysRow = mysqli_fetch_assoc(mysqli_query($conn, $countDaysQuery));

// Handle NULL values safely
$totalHoursTime = $totalHoursRow['total_hours'] ?? "00:00:00";
$totalOvertimeTime = $totalOvertimeRow['total_overtime'] ?? "00:00:00";
$totalDayCount = (int)($totalDaysRow['days_of_work'] ?? 0);

// Convert times to hours
$totalHours = (int)explode(':', $totalHoursTime)[0];
$totalOvertime = (int)explode(':', $totalOvertimeTime)[0];

// Update employee_work_table
$updateWorkHoursQuery = "
    UPDATE employee_work_table 
    SET total_hours_worked = $totalHours, 
        total_overtime_hours = $totalOvertime, 
        total_working_days = $totalDayCount 
    WHERE employee_id = $currentEmpId;
";

if (!mysqli_query($conn, $updateWorkHoursQuery)) {
    echo "Error updating record: " . mysqli_error($conn);
}
?>
