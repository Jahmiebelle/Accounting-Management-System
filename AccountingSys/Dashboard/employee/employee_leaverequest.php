<?php
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  include '../../Login/db.php';
  include '../admin/update_payslip.php';
  include 'updateWorkTable.php';

  $dateNow = new DateTime();
  $dateNow->format('H:i:s');
  $empName = "";
  $employee_id = isset($currentEmpId) ? (int)$currentEmpId : 0;
  $clockedInToday = false;
  $clockedOutToday = false;

  $checkTodayAttendance = "SELECT employee_id, clock_in, clock_out 
                           FROM admin_employee_attendance 
                           WHERE employee_id = $employee_id 
                           AND employee_date = CURDATE();";
  $todayAttendanceResult = mysqli_query($conn, $checkTodayAttendance);

  if(mysqli_num_rows($todayAttendanceResult) > 0){
    $clockRow = mysqli_fetch_assoc($todayAttendanceResult);
    $clockInValue = $clockRow['clock_in'];
    $clockOutValue = $clockRow['clock_out'];
    $clockedInToday = $clockInValue ? true : false;
    $clockedOutToday = $clockOutValue ? true : false;
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee Leave Request</title>
  <link rel="stylesheet" href="../../Styles/employee_leaverequest.css">
</head>

<body>
  <div class="outer-container">
    <!-- HEADER -->
    <header class="header-container">
      <div class="brand-container">
        <div class="brand-icon"></div>
        <div class="brand-name">
          HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
        </div>
      </div>
      <div class="new-logout-container">
        <div class="role">EMPLOYEE</div>
        <div class="new-logout-icon" id="new-logout-icon"></div>
      </div>
    </header>
    
    <div class="inner-container">
      <!-- SIDEBAR -->
      <div class="sidebar-container">
        <div class="sidebar">
          <a href="employee_dashboard.php" class="sidetabs" id="dashboard-tab">
            <div class="tab-icon" id="dashboard-tab-icon"></div>
            <div class="tab-text">Dashboard</div>
          </a>
          <a href="employee_profile.php" class="sidetabs" id="profile-tab">
            <div class="tab-icon" id="profile-tab-icon"></div>
            <div class="tab-text">Profile</div>
          </a>
          <a href="employee_leaverequest.php" class="sidetabs" id="leave-request-tab">
            <div class="tab-icon" id="leaverequest-tab-icon"></div>
            <div class="tab-text">Leave Request</div>
          </a>
        </div>
      </div>

      <!-- MAIN CONTENT -->
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon"></div>
              <div class="section-text">Leave Request</div>
            </div>
          </div>

          <!-- GREETINGS -->
          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome, 
                <?php
                  if (isset($_SESSION['employee_first_name']) && isset($_SESSION['employee_last_name'])) {
                    echo $_SESSION['employee_first_name'] . " " . $_SESSION['employee_last_name'];
                  } else {
                    echo "Guest";
                  }
                ?>
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?php 
                  date_default_timezone_set("Asia/Manila");
                  echo date("l, F j, Y \a\\t g:i A T"); 
                ?>
              </div>
            </div>
          </div>

          <!-- REQUEST LEAVE FORM -->
          <div class="leave-form-container">
            <div class="leave-form-header">REQUEST LEAVE FORM</div>
            <form action="process_leave.php" method="POST" enctype="multipart/form-data" class="leave-form">
              
              <label for="leave_type">LEAVE TYPE</label>
              <input type="text" id="leave_type" name="leave_type" required>
              
              <div class="date-group">
                <div class="date-field">
                  <label for="start_date">START DATE</label>
                  <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="date-field">
                  <label for="end_date">END DATE</label>
                  <input type="date" id="end_date" name="end_date" required>
                </div>
              </div>
              
              <label for="total_date">TOTAL DATE</label>
              <input type="number" id="total_date" name="total_date" value="0" readonly>
              
              <label for="file">ATTACH DOCUMENTS (OPTIONAL)</label>
              <input type="file" id="file" name="file">
              
              <button type="submit" class="submit-btn">SUBMIT</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    
    <!-- FOOTER -->
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

  <script>
    // Auto-calc total days
    document.getElementById('end_date').addEventListener('change', calcDays);
    document.getElementById('start_date').addEventListener('change', calcDays);

    function calcDays() {
      const start = new Date(document.getElementById('start_date').value);
      const end = new Date(document.getElementById('end_date').value);
      if (start && end && end >= start) {
        const diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) + 1;
        document.getElementById('total_date').value = diff;
      } else {
        document.getElementById('total_date').value = 0;
      }
    }
  </script>
</body>
</html>
