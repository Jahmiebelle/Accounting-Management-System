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
                  if (isset($_SESSION['admin_first_name']) && isset($_SESSION['admin_last_name'])) {
                    echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
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
                  <button class="btn clock-in">CLOCK IN</button>
                  <button class="btn clock-out">CLOCK OUT</button>
                </div>
              </div>
          
              <div class="right-box">
                <div class="payroll-box">
                  <div class="next-label">NEXT PAYROLL</div>
                  <div class="next-date">JULY 30, 2025</div>
                </div>
              </div>
            </div>
          
            <!-- Summary Grid -->
            <div class="upper-main-content">
              <div class="summary-grid">
                <div class="summary-item">
                  <span class="label">Total Working hours:</span>
                  <span class="value"><?= $totalDaysPresent ?? '100 hrs' ?></span>
                </div>
                <div class="summary-item">
                  <span class="label">Total Overtime hours:</span>
                  <span class="value"><?= $lateEntries ?? '8 hrs' ?></span>
                </div>
                <div class="summary-item">
                  <span class="label">Total Working Days:</span>
                  <span class="value"><?= $absents ?? '20 days' ?></span>
                </div>
                <div class="summary-item">
                  <span class="label">Payroll Status:</span>
                  <span class="status-badge"><?= $overtimeHours ?? 'pending' ?></span>
                </div>
              </div>
            </div>
          
            <!-- Attendance Table -->
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
                <tr>
                  <td>05/30/25</td>
                  <td>Friday</td>
                  <td>08:00 AM</td>
                  <td>05:00 PM</td>
                  <td>1 hr</td>
                  <td>9 hrs</td>
                </tr>
                <tr>
                  <td>05/31/25</td>
                  <td>Saturday</td>
                  <td>08:00 AM</td>
                  <td>03:00 PM</td>
                  <td>0 hr</td>
                  <td>7 hrs</td>
                </tr>
                <tr>
                  <td>06/01/25</td>
                  <td>Sunday</td>
                  <td>--</td>
                  <td>--</td>
                  <td>--</td>
                  <td>--</td>
                </tr>
                <tr>
                  <td>06/02/25</td>
                  <td>Monday</td>
                  <td>08:15 AM</td>
                  <td>05:15 PM</td>
                  <td>0.5 hr</td>
                  <td>9 hrs</td>
                </tr>
                <tr>
                  <td>06/03/25</td>
                  <td>Tuesday</td>
                  <td>08:00 AM</td>
                  <td>04:00 PM</td>
                  <td>0 hr</td>
                  <td>8 hrs</td>
                </tr>
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