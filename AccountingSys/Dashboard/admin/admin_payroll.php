<?php
include '../../Login/db.php';
session_start();
include 'update_payslip.php';
include 'hourly_rates.php';
      //icheck yung values ng attendance per employee for this month then rerecompute work table, kahit walang attendance, for accidental purposes lng
    $currentMonth = date('Y-m');
    $firstDayInMonth = date('Y-m-01');
    $getEmployeeQuery = "SELECT * FROM employee_table;";
    $getEmployeeResult = mysqli_query($conn, $getEmployeeQuery);
    
    while($empTableRow = mysqli_fetch_assoc($getEmployeeResult)){
      $employee_id = (int)$empTableRow['employee_id'];
      $getTotalHoursQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(total_hours))) AS total_hours FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      $getTotalOvertimeQuery = "SELECT employee_id, SEC_TO_TIME(SUM(TIME_TO_SEC(employee_overtime))) AS total_overtime FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      $countDaysQuery = "SELECT COUNT(attendance_id) AS days_of_work FROM admin_employee_attendance WHERE employee_id = $employee_id AND DATE_FORMAT(employee_date, '%Y-%m') = '$currentMonth';";
      
      $totalHoursResult = mysqli_query($conn, $getTotalHoursQuery);
      $totalOvertimeResult = mysqli_query($conn, $getTotalOvertimeQuery);
      $countDaysResult = mysqli_query($conn, $countDaysQuery);
      
      $totalHoursRow = mysqli_fetch_assoc($totalHoursResult);
      $totalOvertimeRow = mysqli_fetch_assoc($totalOvertimeResult);
      $totalDaysRow = mysqli_fetch_assoc($countDaysResult);
      
      $totalHoursTime = $totalHoursRow['total_hours'];
      $totalOvertimeTime = $totalOvertimeRow['total_overtime'];
      $totalDayCount = (int)$totalDaysRow['days_of_work'];
      
      //seperate yung time into 3parts like this 12:01:00 into ['12', '01', '00'] then acces yung index zero para makuha yung hours, then yun yung ilalagay sa employee_work_table hehe
      $totalHoursArray = explode(':', $totalHoursTime);
      $totalHours = (int)$totalHoursArray[0];
      $totalOvertimeArray = explode(':', $totalOvertimeTime);
      $totalOvertime = (int)$totalOvertimeArray[0];
      
      //now update na natin employee_work_table
      $updateWorkHoursQuery = "UPDATE employee_work_table SET total_hours_worked = $totalHours, total_overtime_hours = $totalOvertime, total_working_days = $totalDayCount WHERE employee_id = $employee_id;";
      $workHoursResult = mysqli_query($conn, $updateWorkHoursQuery);
      if($workHoursResult){
        echo $overtimeHoursWorked;
      }
      else{
        echo mysqli_error($conn);
      }
    }    
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_payroll.css">
</head>

<body>

  <div class="outer-container">
    <div class="payslip-ol" id="payslip-ol">
      <div class="payslip-ol-content" id="payslip-ol-content">
        <form class="payslip-ol-form" id="payslip-ol-form" action="" method="POST">
          <div class="upper-payslip-form">
            <div class="header-payslip">
              <div>PAYSLIP</div>
              <div class="payslip-month" id="month-jar">June</div>
            </div>
            <div class="payslip-basic-detail">
              <div id="payroll-track-no">
                <div id="track-no-label">
                  <h5>Payroll Track No.</h5>
                  <h5 id="payroll-id-jar">002</h5>
                </div>
                <div class="status-bar" id="status-jar">
                  
                </div>
              </div>
              <div class="payslip-boxes" id="emp-id-box">
                <div>Employee ID:</div>
                <div class="payslip-upperbox-content" id="id-jar">1065</div>
              </div>
              <div class="payslip-boxes" id="name-box">
                <div>Name:</div>
                <div class="payslip-upperbox-content" id="name-jar">Gabriel Lopez</div>
              </div>
            </div>
          </div>
          <div class="lower-payslip-form">
            <div class="salary-payslip">
              <div class="payslip-boxes" id="basic-salary-box">
                  <div>Basic Salary:</div>
                  <div class="payslip-box-content" id="salary-jar">₱10,000</div>
              </div>
              <div class="payslip-boxes" id="overtime-box">
                  <div>Overtime:</div>
                  <div class="payslip-box-content" id="overtime-jar">₱1,200</div>
              </div>
              <div class="payslip-boxes" id="gross-pay-box">
                  <div>Gross Pay:</div>
                  <div class="payslip-box-content" id="gross-jar">₱11,200</div>
              </div>
            </div>
            <div class="deduction-payslip">
              <div class="payslip-boxes" id="sss-box">
                  <div>SSS:</div>
                  <div class="payslip-box-content" id="sss-jar">₱730</div>
              </div>
              <div class="payslip-boxes" id="philhealth-box">
                  <div>Philhealth:</div>
                  <div class="payslip-box-content" id="philhealth-jar">₱345</div>
              </div>
              <div class="payslip-boxes" id="pagibig-box">
                  <div>Pagibig:</div>
                  <div class="payslip-box-content" id="pagibig-jar">₱630</div>
              </div>
              <div class="payslip-boxes" id="income-box">
                  <div>Income Tax:</div>
                  <div class="payslip-box-content" id="income-tax-jar">₱570</div>
              </div>
            </div>
            <div class="total-payslip">
              <div class="payslip-boxes" id="total-deduc-box">
                  <div>Total Deductions:</div>
                  <div class="payslip-box-content" id="total-deduct-jar">₱2,000</div>
              </div>
              <div class="payslip-boxes" id="net-pay-box">
                  <div>Net Pay:</div>
                  <div class="payslip-box-content" id="net-pay-jar">₱20,120</div>
              </div>
              <button class="pdf-btn" id="download-payslip-btn">Download as PDF</button>
            </div>
          </div>
        </form>
      </div>
    </div>
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
                Payroll
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
              $getTaxQuery = "SELECT * FROM admin_taxation_table;";
              $taxQueryResult = mysqli_query($conn, $getTaxQuery);
              $taxRow = mysqli_fetch_assoc($taxQueryResult);
              $sss_tax = $taxRow['sss_tax'] * 100;
              $pagibig_tax = $taxRow['pagibig_tax'] * 100;
              $philhealth_tax = $taxRow['philhealth_tax'] * 100;
              $statutory_tax = $sss_tax + $pagibig_tax + $philhealth_tax;
              $income_tax = $taxRow['income_tax'] * 100;
              
              $total_tax = $statutory_tax + $income_tax;
            ?>
            <div class="upper-main-content">
              <form class="taxation-form" id="taxation-form" action="update_tax.php" method="POST">
                <div class="tax-header">
                  <div class="tax-label">Tax Settings</div>
                  <button type="button" class="edit-tax-btn" id="edit-tax-btn">Edit</button>
                </div>
                <div class="tax-body">
                  <div id="sss-container" class="tax-containers">
                    <div class="tax-card-icon" id="sss-icon">
                      
                    </div>
                    <div class="tax-card-detail">
                      <div class="tax-card-name">SSS</div>
                      <div class="tax-card-percent">
                        <input type="text" name="sss_tax" id="sss-tax-input" class="statutory-tax-input"<?php echo " value='$sss_tax'"?>readonly/>
                        <p class="statutory-percent">%</p>
                      </div>
                    </div>
                  </div>
                  <div id="pagibig-container" class="tax-containers">
                    <div class="tax-card-icon" id="pagibig-icon">
                      
                    </div>
                    <div class="tax-card-detail">
                      <div class="tax-card-name">Pagibig</div>
                      <div class="tax-card-percent">
                        <input type="text" name="pagibig_tax" id="pagibig-tax-input" class="statutory-tax-input" <?php echo " value='$pagibig_tax'"?> readonly>
                        <p class="statutory-percent">%</p>
                      </div>
                    </div>
                  </div>
                  <div id="philhealth-container" class="tax-containers">
                    <div class="tax-card-icon" id="philhealth-icon">
                      
                    </div>
                    <div class="tax-card-detail">
                      <div class="tax-card-name">PhilHealth</div>
                      <div class="tax-card-percent">
                        <input type="text" name="philhealth_tax" id="philhealth-tax-input" class="statutory-tax-input" <?php echo " value='$philhealth_tax'"?> readonly/>
                        <p class="statutory-percent">%</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tax-footer">
                  <div class="tax-summary">
                    <div class="statutory-deduc">
                      <h4>Statutory Deductions:</h4>
                      <h4><?php echo $statutory_tax;?>%</h4>
                    </div>
                    <div class="income-tax">
                      <h4>Income Tax:</h4>
                      <div id="income-tax-box">
                        <input type="text" name="income_tax" id="income-tax-input" <?php echo " value='$income_tax'"?> readonly>
                        <h4 class="percentage">%</h4>
                      </div>
                      
                    </div>
                    <div class="total-deduc">
                      <h4>Total Deduction:</h4>
                      <h4><?php echo $total_tax;?>%</h4>
                    </div>
                  </div>
                </div>
              </form>
              <?php
                $getRoleRates = "SELECT * FROM role_hourly_rate;";
                $roleRateResult = mysqli_query($conn, $getRoleRates);
                $professorRate;
                $instructorRate;
                $partTimeRate;
                while($rateRows = mysqli_fetch_assoc($roleRateResult)){
                  $roleName = $rateRows['role_name'];
                  if($roleName === 'professor'){
                    $professorRate = $rateRows['hourly_rate'];
                  }
                  elseif($roleName === 'instructor') {
                    $instructorRate = $rateRows['hourly_rate'];
                  }
                  elseif ($roleName === 'part_time_staff') {
                    $partTimeRate = $rateRows['hourly_rate'];
                  }
                }
              ?>  
              <form class="hourly-rate-form" id="hourly-rate-form" action="update_hourly_rate.php" method="POST">
                <div class="upper-hourly-form">
                  <div class="hourly-header">
                    Hourly Rates 
                  </div>
                  <button type="button" class="edit-rate-btn" id="edit-rate-btn">Edit</button>
                </div>
                <div class="lower-hourly-form">
                  <div class="role-rate-cards" id="professor-card">
                    <div class="rate-info">
                      <input class="role-name" name="professor_role" value= "Professor" readonly>
                      <p class="hourly-rate-text">Hourly Rate</p>
                      <input type="number" class="hourly-rate-price" id="professor-rate" name="professor_rate" value="<?php echo $professorRate;?>" readonly>
                    </div>
                    <div class="rate-logo">
                      
                    </div>
                  </div>
                  <div class="role-rate-cards" id="instructor-card">
                    <div class="rate-info">
                      <input class="role-name" name="instructor_role" value= "Instructor" readonly>
                      <p class="hourly-rate-text">Hourly Rate</p>
                      <input type="number" class="hourly-rate-price" id="instructor-rate" name="instructor_rate" value="<?php echo $instructorRate;?>" readonly>
                    </div>
                    <div class="rate-logo">
                      
                    </div>
                  </div>
                  <div class="role-rate-cards" id="part-time-card">
                    <div class="rate-info">
                      <input class="role-name" name="part_time_role" value= "Part-Time-Staff" readonly>
                      <p class="hourly-rate-text">Hourly Rate </p>
                      <input type="number" class="hourly-rate-price" id="part-time-rate" name="part_time_rate" value="<?php echo $partTimeRate;?>" readonly>
                    </div>
                    <div class="rate-logo">
                      
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="lower-main-content">
              <div class="payroll-header">
                Payroll History
              </div>
              <table class="payroll-table">
                <tr>
                  <th>Month</th>
                  <th>Name</th>
                  <th>Gross Salary</th>
                  <th>Deductions</th>
                  <th>Net Pay</th>
                  <th>Status</th>
                  <th>Payslip</th>
                </tr>
                <?php
                  $payrollHistoryQuery = "SELECT * FROM payroll_history_table ORDER BY month_year DESC;";
                  $payrollHistoryResult = mysqli_query($conn, $payrollHistoryQuery);
                  while($payrollHistoryRow = mysqli_fetch_assoc($payrollHistoryResult)){
                    $payroll_id = $payrollHistoryRow['payroll_id'];
                    $payroll_emp_id =  $payrollHistoryRow['employee_id'];
                    $payroll_month = $payrollHistoryRow['month_year'];
                    $payroll_fn = $payrollHistoryRow['first_name'];
                    $payroll_ln = $payrollHistoryRow['last_name'];
                    $payroll_basic_salary ="₱" . number_format($payrollHistoryRow['basic_salary'], 2);
                    $payroll_overtime_pay ="₱". number_format($payrollHistoryRow['overtime_pay'], 2);
                    $payroll_gross_pay ="₱".number_format($payrollHistoryRow['gross_pay'], 2);
                    $payroll_income_tax ="₱" . number_format($payrollHistoryRow['income_tax'], 2);
                    $payroll_sss ="₱". number_format($payrollHistoryRow['sss'], 2);
                    $payroll_philhealth ="₱". number_format($payrollHistoryRow['philhealth'], 2);
                    $payroll_pagibig ="₱".number_format($payrollHistoryRow['pagibig'], 2);
                    $payroll_total_deductions ="₱".number_format($payrollHistoryRow['total_deductions'], 2);
                    $payroll_net_pay ="₱".number_format($payrollHistoryRow['net_pay'], 2);
                    $payroll_is_complete = $payrollHistoryRow['is_complete'] ? "completed" : "pending";
                    $payroll_create_at = $payrollHistoryRow['created_at'];
                    $date = new DateTime($payroll_month);
                    $monthName = $date->format('F');
                    $payroll_full_name = $payroll_fn . " " . $payroll_ln;
                    $tableStatusColor = $payroll_is_complete == "completed" ? "complete-status" : "pending-status";
                    echo "<tr>
                        <td>$monthName</td>
                        <td>$payroll_full_name</td>
                        <td>$payroll_gross_pay</td>
                        <td>$payroll_total_deductions</td>
                        <td>$payroll_net_pay</td>
                        <td><p class='$tableStatusColor'>$payroll_is_complete</p></td>
                        <td>
                          <div class='view-payslip' id='view-payslip'>
                            <button id='payslip-btn' class='payslip-btn' type='button' data-id='$payroll_emp_id' data-pid='$payroll_id' data-fn='$payroll_full_name' data-month='$monthName' data-basic='$payroll_basic_salary' data-overtime='$payroll_overtime_pay' data-gross='$payroll_gross_pay' data-incometax='$payroll_income_tax' data-sss='$payroll_sss' data-philhealth='$payroll_philhealth' data-pagibig='$payroll_pagibig' data-totaldeduct='$payroll_total_deductions' data-netpay='$payroll_net_pay' data-completed='$payroll_is_complete'> View Payslip</button>
                          </div>
                        </td>
                     </tr>";
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
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="admin_payroll.js" defer></script>
</body>

</html>