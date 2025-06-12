<?php 
include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_attendance.css">
</head>

<body>
  <div class="outer-container">
    <header class="header-container">
      <div class="brand-container">
        <div class="brand-icon"></div>
        <div class="brand-name">
          HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
        </div>
      </div>
      <div class="role">admin</div>
    </header>

    <div class="inner-container">
      <div class="sidebar-container">
        <div class="sidebar">
          <div class="sidebar-header-container">
            <div class="sidebar-header-text"></div>
          </div>
          <div class="sidetabs" id="dashboard-tab">
            <div class="tab-icon" id="dashboard-tab-icon"></div>
            <div class="tab-text">Dashboard</div>
          </div>
          <div class="sidetabs" id="employee-tab">
            <div class="tab-icon" id="employee-tab-icon"></div>
            <div class="tab-text">Employee</div>
          </div>
          <div class="sidetabs" id="department-tab">
            <div class="tab-icon" id="department-tab-icon"></div>
            <div class="tab-text">Department</div>
          </div>
          <div class="sidetabs" id="payroll-tab">
            <div class="tab-icon" id="payroll-tab-icon"></div>
            <div class="tab-text">Payroll</div>
          </div>
          <div class="sidetabs" id="attendance-tab">
            <div class="tab-icon" id="attendance-tab-icon"></div>
            <div class="tab-text">Attendance</div>
          </div>
        </div>
      </div>

      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon"></div>
              <div class="section-text">Attendance</div>
            </div>
            <div class="logout-icon" id="logout-icon"></div>
          </div>

          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome 
                <?php
                  if (isset($_SESSION['admin_first_name']) && isset($_SESSION['admin_last_name'])) {
                    echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
                  } else {
                    echo "Guest";
                  }
                ?>
              </div>
              <div class="path" style="opacity: 0;">aaron</div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?php 
                  date_default_timezone_set("Asia/Manila");
                  echo date("l, F j, Y g:i A"); 
                ?>
              </div>
              <div class="emptybox">empty</div>
            </div>
          </div>

          <div class="main-content">
            <div class="upper-main-content">
              <form class="filter-form" action="" method="POST" accept-charset="utf-8">
                
                  <div class="month-searchbar">
                    <label id="label-for-month" for="month-input-box">Filter by date</label>
                    <input class="month-input-box" type="date" id="month-input-box" name="filter_month" value="<?php isset($_POST['filter_month']) ? $_POST['filter_month'] : date('Y-m-d');?>">
                  </div>
                
                <div class="searchbar">
                  <div class="name-search">
                    <div class="search-logo">
                      
                    </div>
                    <input class="search-label" type="text" id="search_employee" name="search_employee" placeholder="Name & Surname (e.g., Anna Cruz)">
                  </div>
                </div>
                <button class="search-btn" type="submit">Search</button>
              </form>
            </div>
            <?php
              $filterMonth = isset($_POST['filter_month']) ? $_POST['filter_month'] : date('Y-m-d');
              $searchString = isset($_POST['search_employee']) ? $_POST['search_employee'] : '';
              $searchNameParts = explode(' ', $searchString);
              $firstName;
              $lastName;
              if(count($searchNameParts) > 1){
                $lastName = array_pop($searchNameParts);
                $firstName = implode(' ', $searchNameParts);
              }
              else{
                $lastName = implode(' ', $searchNameParts);
                $firstName = implode(' ', $searchNameParts);
              }
              $searchAttendanceQuery = "SELECT * FROM admin_employee_attendance WHERE DATE_FORMAT(employee_date, '%Y-%m-%d') = '$filterMonth';";
              
              if(empty($searchString)){
                $searchAttendanceQuery = "SELECT * FROM admin_employee_attendance WHERE DATE_FORMAT(employee_date, '%Y-%m-%d') = '$filterMonth';";
              }
              else{
                $searchAttendanceQuery = "SELECT * FROM admin_employee_attendance WHERE DATE_FORMAT(employee_date, '%Y-%m-%d') = '$filterMonth' AND (employee_name LIKE '%$firstName%'OR employee_name LIKE '%$lastName%');";
              }
              
              $attendanceResult = mysqli_query($conn, $searchAttendanceQuery);
            ?>
            <div class="lower-main-content">
              <table class="attendance-table" border="0">
                <tr>
                  <th>Date</th>
                  <th>Department Name</th>
                  <th>Name</th>
                  <th>Clock-In</th>
                  <th>Clock-Out</th>
                  <th>Overtime</th>
                  <th>Total Work Hours</th>
                </tr>
                <?php
                if($attendanceResult){
                  while($attendanceRow = mysqli_fetch_assoc($attendanceResult)){
                    $attendanceDate = $attendanceRow['employee_date'];
                    $deptNumber = (int)$attendanceRow['department_id'];
                    $attendanceName = $attendanceRow['employee_name'];
                    $clockInTime = $attendanceRow['clock_in'];
                    $clockOutTime = $attendanceRow['clock_out'];
                    $overtimeTime = $attendanceRow['employee_overtime'];
                    $totalHoursTime = $attendanceRow['total_hours'];
                    //get department name sa dept_table using department id
                    $getDeptNameQuery = "SELECT * FROM department_table WHERE department_id = $deptNumber;";
                    $deptNameResult = mysqli_query($conn, $getDeptNameQuery);
                    $deptNameRow = mysqli_fetch_assoc($deptNameResult);
                    $deptNameValue = $deptNameRow['department_name'];
                    //format yung clock in from db to a readable time hehe
                    $clockInDateTime = new DateTime($clockInTime);
                    $clockInFormatted = $clockInDateTime->format('g:i A');
                    //yung clock out naman
                    $clockOutDateTime = new DateTime($clockOutTime);
                    $clockOutFormatted = $clockOutDateTime->format('g:i A');
                    //yung overtime naman
                    $overtimeDateTime = new DateTime($overtimeTime);
                    $overtimeFormatted = (int)$overtimeDateTime->format('H');
                    $overtimeMinute = (int)$overtimeDateTime->format('i');
                    $computedOvertime = (int)$overtimeFormatted + ($overtimeMinute / 60);
                    //total hours naman
                    $totalHoursDateTime = new DateTime($totalHoursTime);
                    $totalHoursFormatted = (int)$totalHoursDateTime->format('H');
                    $totalHoursMinute = (int)$totalHoursDateTime->format('i');
                    $computedTotalHours = (int)$totalHoursFormatted + ($totalHoursMinute / 60);
                    echo "<tr>
                        <td>$attendanceDate</td>
                        <td>$deptNameValue</td>
                        <td>$attendanceName</td>
                        <td>$clockInFormatted</td>
                        <td>$clockOutFormatted</td>
                        <td>".number_format($computedOvertime, 1)." hrs</td>
                        <td>".number_format($computedTotalHours, 1)." hrs</td>
                      </tr>";
                  }
                }
                else{
                  echo mysqli_error($conn);
                }
                ?>
              </table>
            </div>
              
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

  <script src="admin_attendance.js"></script>
</body>

</html>