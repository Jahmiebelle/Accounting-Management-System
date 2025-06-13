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
                Welcome <?php
                  if (isset($_SESSION['admin_first_name']) && isset($_SESSION['admin_last_name'])) {
                    echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
                  }
                  else{
                    
                    echo "Guest";
                  }
                ?>
              </div>
              <div class="path" style= "opacity: 0;">
                aaron 
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
          <div class="main-content">
            <?php
              $countDept = "SELECT COUNT(department_id) FROM department_table";
              $deptCountResult = mysqli_query($conn, $countDept);
              $deptCountRow = mysqli_fetch_array($deptCountResult);
              $deptCount = $deptCountRow[0];
              $countEmployee = "SELECT COUNT(employee_id) FROM employee_table";
              $employeeCountResult = mysqli_query($conn, $countEmployee);
              $employeeCountRow = mysqli_fetch_array($employeeCountResult);
              $employeeCount = $employeeCountRow[0];
            
            ?>
            <div class="upper-summarycards">
              <div id="employee-card" class="uppercard">
                <div id="employee-card-icon" class="uppercard-icon"></div>
                <div id="employee-card-label" class="uppercard-label">
                  <div id="employee-card-header" class="uppercard-header">
                    Total Employees
                  </div>
                  <div id="employee-card-count" class="uppercard-count">
                    <?php 
                      echo $employeeCount;
                    ?>
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
                    <?php 
                      echo $deptCount;
                    ?>
                  </div>
                  
                </div>
                
              </div>
            </div>
            <div class="lower-summarycards">
              <?php
                $getLatestClockQuery = "SELECT * FROM admin_employee_attendance WHERE employee_date = CURDATE() AND clock_in != NULL ORDER BY clock_in ASC LIMIT 2;";
                $latestClockInResult = mysqli_query($conn, $getLatestClockQuery);
                $firstClockInRow = mysqli_fetch_assoc($latestClockInResult);
                $secondClockInRow = mysqli_fetch_assoc($latestClockInResult);
                if($firstClockInRow){
                  $firstEmpName = $firstClockInRow['employee_name'];
                  $firstClockIn = $firstClockInRow['clock_in'];
                  $firstEmpDateTime = new DateTime($firstClockIn);
                  $firstEmpTime = $firstEmpDateTime->format('g:i A');
                }
                else{
                  $firstEmpName = "Waiting for next clock-in...";
                  $firstEmpTime = "-";
                }
                if($secondClockInRow){
                  $secondEmpName = $secondClockInRow['employee_name'];
                  $secondClockIn = $secondClockInRow['clock_in'];
                  $secondEmpDateTime = new DateTime($secondClockIn);
                  $secondEmpTime = $secondEmpDateTime->format('g:i A');
                }
                else{
                  $secondEmpName = "Waiting for next clock-in...";
                  $secondEmpTime = "-";
                }
              
              ?>
              <div id="request-card" class="lowercard">
                <div class="request-card-header-container">
                  <div class="rch-text">
                    Morning Starters
                  </div>
                </div>  
                <div class="request-card-content-container">
                  <div class="leave-person1">
                    <div class="person1-profile">
                      
                    </div>
                    <div class="person1-name">
                      <?php echo $firstEmpName;?>
                    </div>
                    <div class="person1-department">
                      <?php echo $firstEmpTime;?>
                    </div>
                  </div>
                  <div class="leave-person2">
                    <div class="person2-profile">
                      
                    </div>
                    <div class="person2-name">
                      <?php echo $secondEmpName;?>
                    </div>
                    <div class="person2-department">
                      <?php echo $secondEmpTime;?>
                    </div>
                  </div>
                </div>
                <div class="request-card-button-container">
                  <button class="view-btn" id="view-btn" type="button">View More</button>
                </div>
              </div>
              <?php
                $previousTotalGross = 0;
                $date = new DateTime();
                $date->modify('-1 month');
                $previousMonth = $date->format('Y-m');
                $previousMonthQuery = "SELECT * FROM payroll_history_table WHERE DATE_FORMAT(month_year, '%Y-%m') = '$previousMonth' AND is_complete = 1;";
                $previousMonthResult = mysqli_query($conn, $previousMonthQuery);
                if (!$previousMonthResult) {
                  die("Query failed: " . mysqli_error($conn));
                }
                $paidEmployees = mysqli_num_rows($previousMonthResult);
                while($previousMonthRow = mysqli_fetch_assoc($previousMonthResult)){
                  $grossPay = $previousMonthRow['gross_pay'];
                  $previousTotalGross += $grossPay;
                }
                $averageSalary = $previousTotalGross / $paidEmployees;
                $totalGrossDisplay = number_format($previousTotalGross, 2);
              ?>
              <div id="payroll-card" class="lowercard">
                <div class="payroll-card-header-container">
                  Payroll Summary
                </div>
                <p class="month-indicator">Month: <?php
                  echo $date->format('F, Y');
                ?></p>
                <div class="payroll-card-content-container">
                  <div class="pcc-header" id="pcc-header1">
                    Total Payroll
                  </div>
                  <div class="pcc-count" id="pcc-count1">
                    <?php
                      echo ($totalGrossDisplay > 0) ? "₱ " . $totalGrossDisplay : "No Value";
                    ?>
                  </div>
                  <div class="pcc-header" id="pcc-header2">
                    Average Salary
                  </div>
                  <div class="pcc-count" id="pcc-count2">
                    <?php
                      echo ($averageSalary > 0) ? "₱ " . number_format($averageSalary, 2) : "No Average Value";
                    ?>
                  </div>
                  <div class="pcc-header" id="pcc-header3">
                    Employee(s) Paid
                  </div>
                  <div class="pcc-count" id="pcc-count3">
                    <?php
                      echo ($paidEmployees > 0) ? $paidEmployees : "No one has been paid yet.";
                    ?>
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