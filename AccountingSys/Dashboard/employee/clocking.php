<?php
include '../../Login/db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$clockInId = $_POST['clock_in_id'];
$clockOutId = $_POST['clock_out_id'];
$clockInTime = $_POST['clock_in_curtime'];
$clockOutTime = $_POST['clock_out_curtime'];

$clockInTimeObj = new DateTime($clockInTime);
$clockOutTimeObj = new DateTime($clockOutTime);

$clockInFormatted = $clockInTimeObj->format('H:i:s');
$clockOutFormatted = $clockOutTimeObj->format('H:i:s');

$updateClockIn = "UPDATE admin_employee_attendance 
    SET clock_in = '$clockInFormatted' 
    WHERE employee_id = '$clockInId' AND employee_date = CURDATE();";
if (mysqli_query($conn, $updateClockIn)) {
    echo "You are now Clocked in!<br>";
} else {
    echo "Clock-in error: " . mysqli_error($conn) . "<br>";
}

$updateClockOut = "UPDATE admin_employee_attendance 
    SET clock_out = '$clockOutFormatted' 
    WHERE employee_id = '$clockOutId' AND employee_date = CURDATE();";
if (mysqli_query($conn, $updateClockOut)) {
    echo "Clocked out! Thanks for your hard work!<br>";
} else {
    echo "Clock-out error: " . mysqli_error($conn) . "<br>";
}

$interval = $clockInTimeObj->diff($clockOutTimeObj);
$todayWorkHours = $interval->format('%H:%I:%S');

$workedHours = (int)$interval->format('%H');
$workedMins = (int)$interval->format('%I');
$workedSecs = (int)$interval->format('%S');

if ($workedHours > 8) {
    $overtimeHours = $workedHours - 8;
    $todayOvertime = sprintf('%02d:%02d:%02d', $overtimeHours, $workedMins, $workedSecs);
} else {
    $todayOvertime = '00:00:00';
}

$updateTotalHours = "UPDATE admin_employee_attendance 
    SET employee_overtime = '$todayOvertime', total_hours = '$todayWorkHours' 
    WHERE employee_id = '$clockOutId' AND employee_date = CURDATE();";
if (mysqli_query($conn, $updateTotalHours)) {
    echo "Updated Total & Overtime Hours.";
} else {
    echo "Hours update error: " . mysqli_error($conn);
}
?>