<?php include '../../Login/db.php';
session_start();
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
                Welcome, <?php
                  echo $_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name'];
                ?>
              </div>
              <div class="path">
                Admin / Payroll
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
                      <input type="number" class="hourly-rate-price" id="professor-rate" name="professor_rate" value="<?php echo $professorRate?>" readonly>
                    </div>
                    <div class="rate-logo">
                      
                    </div>
                  </div>
                  <div class="role-rate-cards" id="instructor-card">
                    <div class="rate-info">
                      <input class="role-name" name="instructor_role" value= "Instructor" readonly>
                      <p class="hourly-rate-text">Hourly Rate</p>
                      <input type="number" class="hourly-rate-price" id="instructor-rate" name="instructor_rate" value="<?php echo $instructorRate?>" readonly>
                    </div>
                    <div class="rate-logo">
                      
                    </div>
                  </div>
                  <div class="role-rate-cards" id="part-time-card">
                    <div class="rate-info">
                      <input class="role-name" name="part_time_role" value= "Part-Time-Staff" readonly>
                      <p class="hourly-rate-text">Hourly Rate </p>
                      <input type="number" class="hourly-rate-price" id="part-time-rate" name="part_time_rate" value="<?php echo $partTimeRate?>" readonly>
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
                <tr>
                  <td>June</td>
                  <td>Kristian Celfo</td>
                  <td>18,000</td>
                  <td>2,700</td>
                  <td>15,300</td>
                  <td>Completed</td>
                  <td><div class="view-payslip" id="view-payslip"></div></td>
                </tr>
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
  <script src="admin_payroll.js"></script>
</body>

</html>