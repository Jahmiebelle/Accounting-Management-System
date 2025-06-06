<?php include '../../Login/db.php';
session_start();
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
      <div class="role">
        employee
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

          <div class="sidetabs" id="attendance-tab">
            <div class="tab-icon" id="attendance-tab-icon"></div>
            <div class="tab-text">
              Attendance
            </div>
          </div>

          <div class="sidetabs" id="payroll-tab">
            <div class="tab-icon" id="payroll-tab-icon"></div>
            <div class="tab-text">
              Payroll
            </div>
          </div>

          

          </div>
        </div>
      </div>
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              </div>
              <div class="section-text">
                Dashboard
            </div>

            <div class="logout-icon" id="logout-icon">
              
            </div>
          </div>
          <div class="greetings-content">
            
            <div class="left-greetings">
              <div class="greetings">
                Welcome, <?php
                  echo $_SESSION['employee_first_name'] . " " . $_SESSION['employee_last_name'];
                ?>
              </div> 
            </div>

            <div class="right-greetings">
              
            </div>
          </div>

      <div class="welcome-bar">
        <div class="path">
                Employee/Dashboard
              </div> 
              <div class="datetime">
                <?php date_default_timezone_set("Asia/Manila");
                      echo date("l, F j, Y \a\\t g:i A T"); 
                      ?> 
              </div>
            </div>
<<<<<<< HEAD
          </div>
          
          <div class="dashboard-container">
  <div class="welcome-bar">
    <span>Welcome, Mr. <?= $employeeName ?? 'Employee' ?>!</span>
   
  </div>
=======
>>>>>>> 3de601f32295e9660651cc2ca25d256191cd82f1

  
    <div class="top-row">
      <div class="left-box">
        <div class="clock-buttons">
          <button class="btn clock-in">CLOCK IN</button>
          <button class="btn clock-out">CLOCK OUT</button>
        </div>
      </div>

      <div class="right-box">
        <div class="total-hours-box">
          <span class="main-text">TOTAL HOURS WORK</span>
          <h1 class="hours"><?= $totalHoursWorked ?? '100' ?> hrs</h1>
          <span class="sub-text">Overtime hours: <strong><?= $overtimeHours ?? '50.1' ?> hrs</strong></span>
        </div>
      </div>
    </div>
<<<<<<< HEAD
<div class="summary-row">
 x
  <div class="summary-card">
    <span>Total Working Hours:</span>
    <div><?= $totalWorkingHours ?? '100' ?> hrs</div>
  </div>
  <div class="summary-card">
    <span>Total Overtime Hours:</span>
    <div><?= $totalOvertimeHours ?? '8' ?> hrs</div>
  </div>
  <div class="summary-card">
    <span>Total Working Days:</span>
    <div><?= $totalWorkingDays ?? '20' ?> days</div>
  </div>
  <div class="summary-card">
    <span>Payroll Status:</span>
    <div class="payroll-status <?= strtolower($payrollStatus ?? 'pending') ?>">
      <?= ucfirst($payrollStatus ?? 'Pending') ?>
=======

<div class="dashboard-container">
  <div class="main-dashboard-content">
    <div class="summary-row">
      <div class="summary-card">
        <span>Total Days Present:</span>
        <div><?= $totalDaysPresent ?? '0' ?></div>
      </div>
      <div class="summary-card">
        <span>Absent:</span>
        <div><?= $absents ?? '0' ?></div>
      </div>
>>>>>>> 3de601f32295e9660651cc2ca25d256191cd82f1
    </div>
  </div>
</div>

 

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
          <tr>
            <td>05/30/25</td>
            <td>Friday</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
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
  <script src="employee_attendance.js"></script>
</body>

</html>