<?php include '../../Login/db.php';
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
        <div class="brand-icon">
          
          
        </div>
        <div class="brand-name">
          HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
          
        </div>
      </div>
      <div class="role">
        admin
      </div>
    </header>
    
    <div class="inner-container">
      <div class="sidebar-container">
        <div class="sidebar">
          <div class="sidebar-header-container">  
            <div class="sidebar-header-text">
            
            </div>
            
          </div>
          <div class="sidetabs" id="dashboard-tab">
            <div class="tab-icon" id="dashboard-tab-icon">
              
            </div>
            <div class="tab-text">
              Dashboard
            </div>
          </div>
          <div class="sidetabs" id="employee-tab">
            <div class="tab-icon" id="employee-tab-icon">
  
            </div>
            <div class="tab-text">
              Employee
            </div>
          </div>
          <div class="sidetabs" id="department-tab">
            <div class="tab-icon" id="department-tab-icon">
  
            </div>
            <div class="tab-text">
              Department
            </div>
          </div>
          
          <div class="sidetabs" id="payroll-tab">
            <div class="tab-icon" id="payroll-tab-icon">
  
            </div>
            <div class="tab-text">
              Payroll
            </div>
          </div>
          <div class="sidetabs" id="attendance-tab">
            <div class="tab-icon" id="attendance-tab-icon">
  
            </div>
            <div class="tab-text">
              Attendance
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
                  if (isset($_SESSION['admin_first_name']) && isset($_SESSION['admin_last_name'])) {
                    echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
                  }
                  else{
                    echo "Guest";
                  }
                ?>
              </div>
              <div class="path">
                Admin / Attendance
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?php 
                  date_default_timezone_set("Asia/Manila");
                  echo date("l, F j, Y g:i A "); 
                ?> 
              </div>
              <div class="emptybox">
                empty
              </div>
            </div>
            
          </div>
          <div class="main-content"
            <div class="attendance-header">
              <input type="date" />
              <input type="text" placeholder="Search by name..." />
              <button class="filter-btn">Filter</button>
            </div>
            
            <table class="attendance-table">
              <thead>
                <tr>
                  <th>Department ID</th>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Date</th>
                  <th>Clock-in</th>
                  <th>Clock-out</th>
                  <th>Overtime</th>
                  <th>Total Hours of Work</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>2025001</td>
                    <td>Jahmiebelle Laurente</td>
                    <td>06/06/2025</td>
                    <td>7:00 AM</td>
                    <td>3:00 PM</td>
                    <td>2 hrs</td>
                    <td>10 hrs</td>
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
  <script src="admin_attendance.js"></script>
</body>

</html>