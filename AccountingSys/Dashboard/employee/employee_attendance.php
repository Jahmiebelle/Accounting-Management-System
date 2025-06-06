<?php include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>
  <link rel="stylesheet" href="../../Styles/employee_attendance.css">
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
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              <div class="section-text">
                Attendance
              </div>
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
              <div class="path">
                Employee
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?php 
                  date_default_timezone_set("Asia/Manila");
                  echo date("l, F j, Y \a\\t g:i A T"); 
                ?> 
              </div>
              <div class="emptybox">
                
              </div>
            </div>
            
          </div>


      <div class="main-content">
        
        <div class="upper-main-content">
          <h2 class="section-title">Attendance Summary</h2>
            <div class="summary-grid">
            <div class="summary-item">
              <span class="label">Total Days Present:</span>
              <span class="value"><?= $totalDaysPresent ?? '0' ?></span>
                </div>
                <div class="summary-item">
                     <span class="label">Late Entries:</span>
                     <span class="value"><?= $lateEntries ?? '0' ?></span>
                        </div>
                      <div class="summary-item">
                    <span class="label">Absents:</span>
                    <span class="value"><?= $absents ?? '0' ?></span>
                </div>
              <div class="summary-item">
            <span class="label">Overtime Hours:</span>
            <span class="value"><?= $overtimeHours ?? '0h' ?></span>
            </div>
               </div>
                </div>

        <div class="lower-main-content">
            <h2 class="section-title">Employee Attendance List</h2>
                <table class="attendance-table">
                  <thead>
              <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                      <td>1</td>
                      <td>Cyrus Cabañes</td>
                      <td></td>
                      <td>Information Technology</td>
                      <td class="status-cell">
                        <span class="status-dot active"></span> Active
                      </td>
                      <td>Profile</td>
                    </tr>

                    <tr>
                      <td>2</td>
                      <td>Kristian Celfo</td>
                      <td></td>
                      <td>Information Technology</td>
                      <td class="status-cell">
                        <span class="status-dot active"></span> Active
                      </td>
                      <td>Profile</td>
                    </tr>
            </tbody>
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
  <script src="employee_attendance.js"></script>
</body>

</html>