<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include '../../Login/db.php';
  include '../admin/update_payslip.php';
  include 'updateWorkTable.php';
  
  $dateNow = new DateTime();
  $dateNow->format('H:i:s');
  $empName = "";
  $employee_id = (int)$currentEmpId;
  $clockedInToday = false;
  $clockedOutToday = false;
  $checkTodayAttendance = "SELECT employee_id, clock_in, clock_out FROM admin_employee_attendance WHERE employee_id = $employee_id AND employee_date = CURDATE();";
  $todayAttendanceResult = mysqli_query($conn, $checkTodayAttendance);
  if(mysqli_num_rows($todayAttendanceResult) > 0){
    $clockRow = mysqli_fetch_assoc($todayAttendanceResult);
    $clockInValue = $clockRow['clock_in'];
    $clockOutValue = $clockRow['clock_out'];
    $clockedInToday = $clockInValue ? true : false;
    $clockedOutToday = $clockOutValue ? true : false;
  }
  else {
    $getEmployeeData = "SELECT * FROM employee_table WHERE employee_id = $employee_id;";
    $employeeDataResult = mysqli_query($conn, $getEmployeeData);
    $employeeDataRow = mysqli_fetch_assoc($employeeDataResult);
    $empFn = $employeeDataRow['first_name'];
    $empLn = $employeeDataRow['last_name'];
    $empName = $empFn .
     " " . $empLn;
    $empDeptName = $employeeDataRow['department'];
    $getDeptId = "SELECT department_id FROM department_table WHERE department_name = '$empDeptName'";
    $deptIdResult = mysqli_query($conn, $getDeptId);
    $deptIdRow = mysqli_fetch_assoc($deptIdResult);
    $deptIdValue = $deptIdRow['department_id'];
    
    $createTodayAttendance = "INSERT INTO admin_employee_attendance (department_id, employee_id, employee_name, employee_date, employee_overtime, total_hours) VALUES ($deptIdValue, $employee_id, '$empName', CURDATE(), '00:00:00', '00:00:00');";
    $generateTodayAttendance = mysqli_query($conn, $createTodayAttendance);
    if(mysqli_num_rows($todayAttendanceResult) > 0){
    $clockRow = mysqli_fetch_assoc($todayAttendanceResult);
    $clockInValue = $clockRow['clock_in'];
    $clockOutValue = $clockRow['clock_out'];
    $clockedInToday = $clockInValue ? true : false;
    $clockedOutToday = $clockOutValue ? true : false;
    }
  }

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>
  <link rel="stylesheet" href="../../Styles/employee_dashboard.css">
</head>

<body>

  <div class="outer-container">
    <header class="header-container">
      <div class="brand-container">
        <div class="brand-icon">
        </div>
        <div class="brand-name">
          HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
          
        </div>
      </div>
      <div class="new-logout-container">
      <div class="role">
        EMPLOYEE
      </div>
      <div class="new-logout-icon" id="new-logout-icon"></div>
       </div>
    </header>
    
    <div class="inner-container">
      <div class="sidebar-container">
        <div class="sidebar">
          <div class="sidebar-header-container">  
            <div class="sidebar-header-text"></div>
            </div>

          <div class="sidetabs" id="dashboard-tab">
            <div class="tab-icon" id="dashboard-tab-icon"></div>
            <div class="tab-text">
              Dashboard
            </div>
          </div>

          <div class="sidetabs" id="profile-tab">
            <div class="tab-icon" id="profile-tab-icon"></div>
            <div class="tab-text">
              Profile
            </div>
          </div>

           <a href="employee_leaverequest.php" class="sidetabs" id="leave-request-tab">
            <div class="tab-icon" id="leaverequest-tab-icon"></div>
            <div class="tab-text">
            Leave Request
            </div></a>

          </div>
        </div>
      </div>
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              <div class="section-text">
                Welcome!
              </div>
            </div>

            <div class="logout-icon" id="logout-icon">
              
            </div>
          </div>
          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome, <?php
                  if (isset($_SESSION['employee_first_name']) && isset($_SESSION['employee_last_name'])) {
                    echo $_SESSION['employee_first_name'] . " " . $_SESSION['employee_last_name'];
                  }
                  else{
                    echo "Guest";
                  }
                ?>
              </div>
          </div>
          
            <div class="right-greetings">
              <div class="datetime">
                <?php date_default_timezone_set("Asia/Manila");
                      echo date("l, F j, Y \a\\t g:i A T"); 
                      ?> 
              </div>
            </div>
            
          </div>
          <div class="main-dashboard-content">
            <div class="top-row">
              <div class="left-box">
                <div class="clock-buttons">
                  <button class="btn clock-in" id="clock-in-btn" type="button" <?php echo $clockedInToday ? 'disabled ' : ''; echo "data-id = '$employee_id'";?> >CLOCK IN</button>
                  <button class="btn clock-out" id="clock-out-btn" type="button" <?php echo ($clockedInToday && !$clockedOutToday) ? " " : " disabled ";
                    echo "data-id = '$employee_id'";?>>CLOCK OUT</button>
                </div>
              </div>
          
              <div class="right-box">
                <div class="payroll-box">
                  
                  <div class="next-label">NEXT PAYROLL</div>
                  <?php
                  //kukunin yung full next payroll date then format
                    $currentMonth = $dateNow->format('F');
                    $currentYear = $dateNow->format('Y');
                    $payrollFullString = $currentMonth . " 30, " . $currentYear;
                  //get yung data from database work table then display yung data sa summary cards
                    $getWorkDataQuery = "SELECT * FROM employee_work_table WHERE employee_id = $employee_id;";
                    $workDataResult = mysqli_query($conn, $getWorkDataQuery);
                    $workDataRow = mysqli_fetch_assoc($workDataResult);
                    $totalWorkHours = $workDataRow['total_hours_worked'];
                    $totalOvertime = $workDataRow['total_overtime_hours'];
                    $totalWorkDays = $workDataRow['total_working_days'];
                  ?>
                  <div class="next-date"><?php echo $payrollFullString;?></div>
                </div>
              </div>
            </div>
          
            <!-- Summary Grid -->
            <div class="upper-main-content">
              <div class="summary-grid">
                <div class="summary-item">
                  <span class="label">Total Working hours:</span>
                  <span class="value"><?php echo $totalWorkHours ? $totalWorkHours." hours" : "-";?></span>
                </div>
                <div class="summary-item">
                  <span class="label">Total Overtime hours:</span>
                  <span class="value"><?php echo $totalOvertime ? $totalOvertime." hours" : "-";?></span>
                </div>
                <div class="summary-item">
                  <span class="label">Total Working Days:</span>
                  <span class="value"><?php echo $totalWorkDays ? $totalWorkDays." days" : "-";?></span>
                </div>
              </div>
            </div>
            <!-- Attendance Table -->
          <div class="attendance-table-section">
            <table class="attendance-table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Day</th>
                  <th>Clock-In</th>
                  <th>Clock-Out</th>
                  <th>Overtime</th>
                  <th>Total Time Worked</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $employee_id = $_SESSION['employee_id'];
              $getEmpQuery = "SELECT * FROM admin_employee_attendance WHERE employee_id = '$employee_id';";
              $EmpResult = mysqli_query($conn, $getEmpQuery);

              while($employeeRow = mysqli_fetch_assoc($EmpResult)){
                
                $empID=$employeeRow['employee_id'];
                $empDate=$employeeRow['employee_date'];
                $fullDateTime = new DateTime ($empDate);
                $dayToday = $fullDateTime -> format('l');
                $empClockIn = $employeeRow ['clock_in'];
                $empClockOut = $employeeRow ['clock_out'];
                $empOvertime = $employeeRow['employee_overtime'];
                $empTotalHours = $employeeRow['total_hours'];

              echo "<tr> 
                 <td>$empDate</td>
                 <td>$dayToday</td>
                 <td>" . ($empClockIn ? $empClockIn : '-'). "</td>
                 <td>".($empClockOut ? $empClockOut : '-')."</td>
                 <td>$empOvertime</td>
                <td>$empTotalHours</td>
               </tr>";
               }
               ?>


              </tbody>
            </table>
            
          </div>
        </div>
      </div>
      
    </div>
    
    <footer class="footer-container">
      <div class="brand-name-footer">
        HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
      </div>
      <div class="brand-info-footer">
        Heroes TeachTrack is more than just an employee management system; 
it's a commitment to excellence. We provide businesses with the tools 
they need to simplify HR operations, enhance workforce efficiency, 
and optimize payroll and performance tracking. 
      </div>
      <div class="brand-copyright">
        © 2025 Heroes TeachTrack. All Rights Reserved.
      </div>
    </footer>
      
  </div>
  <script src="employee_dashboard.js"></script>
   
</body>

</html>