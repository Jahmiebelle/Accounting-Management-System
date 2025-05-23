<?php include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_dashboard.css">
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
          <div class="sidetabs" id="leavereq-tab">
            <div class="tab-icon" id="leavereq-tab-icon">
  
            </div>
            <div class="tab-text">
              Leave Requests
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
        <div class="dashboard-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              <div class="section-text">
                Dashboard
              </div>
            </div>

            <div class="logout-icon" id="logout-icon">
              
            </div>
          </div>
          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome, <?php
                  echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
                ?>
              </div>
              <div class="path">
                Admin / Dashboard
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                APRIL 28, 2025 10:00 A.M
              </div>
              <div class="emptybox">
                
              </div>
            </div>
            
          </div>
          <div class="main-content">
            <div class="upper-summarycards">
              <div id="employee-card" class="uppercard">
                <div id="employee-card-icon" class="uppercard-icon"></div>
                <div id="employee-card-label" class="uppercard-label">
                  <div id="employee-card-header" class="uppercard-header">
                    Total Employees
                  </div>
                  <div id="employee-card-count" class="uppercard-count">
                    9
                  </div>
                </div>
              </div>
              <div id="department-card" class="uppercard">
                <div id="department-card-icon" class="uppercard-icon">
                  
                </div>
                <div id="department-card-label" class="uppercard-label">
                  <div id="department-card-header" class="uppercard-header">
                    Total Departments
                  </div>
                  <div id="department-card-count" class="uppercard-count">
                    2
                  </div>
                  
                </div>
                
              </div>
            </div>
            <div class="lower-summarycards">
              <div id="request-card" class="lowercard">
                <div class="request-card-header-container">
                  <div class="rch-text">
                    Pending Leave Requests: 
                  </div>
                  <div class="rch-count">
                    12
                  </div>
                </div>  
                <div class="request-card-content-container">
                  <div class="leave-person1">
                    <div class="person1-profile">
                      
                    </div>
                    <div class="person1-name">
                      Harry Deguzman
                    </div>
                    <div class="person1-department">
                      Information Technology
                    </div>
                  </div>
                  <div class="leave-person2">
                    <div class="person2-profile">
                      
                    </div>
                    <div class="person2-name">
                      Gabby Lopez
                    </div>
                    <div class="person2-department">
                      Computer Science
                    </div>
                  </div>
                </div>
                <div class="request-card-button-container">
                  <button class="view-btn" id="view-btn" type="button">View More</button>
                </div>
              </div>
              <div id="payroll-card" class="lowercard">
                <div class="payroll-card-header-container">
                  Payroll Summary
                </div>
                <div class="payroll-card-content-container">
                  <div class="pcc-header" id="pcc-header1">
                    Total Payroll
                  </div>
                  <div class="pcc-count" id="pcc-count1">
                    ₱70,000
                  </div>
                  <div class="pcc-header" id="pcc-header2">
                    Average Salary
                  </div>
                  <div class="pcc-count" id="pcc-count2">
                    ₱10,000
                  </div>
                  <div class="pcc-header" id="pcc-header3">
                    Employee Paid
                  </div>
                  <div class="pcc-count" id="pcc-count3">
                    7
                  </div>
                  
                  
                </div>
              </div>
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
  <script src="admin_dashboard.js"></script>
</body>

</html>