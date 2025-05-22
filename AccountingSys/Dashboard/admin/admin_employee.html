<?php include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_employee.css">
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
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              <div class="section-text">
                Employee
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
                Admin / Employee
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                APRIL 28, 2025 10:00 A.M
              </div>
              <div class="emptybox">
                empty
              </div>
            </div>
            
          </div>
          <div class="main-content">
            <div class="upper-maincontent">
              <form action="" method="POST" id="search_form">
                <div class="dept-sort">
                  <select name="department_selection" id="department_selection" onchange="document.getElementById('search_form').submit()">
                    <?php
                      $selected_dept = $_POST['department_selection'] ?? 'all';
                      echo "<option class='options' value='all' $selected_dept == 'all' ? selected : '' > All Department</option>";
        
                      $getDept = "SELECT department_name FROM department_table";
                      $deptResult = mysqli_query($conn, $getDept);
                      while($deptnames = mysqli_fetch_assoc($deptResult)){
                        $dept = $deptnames['department_name'];
                        $selected = $selected_dept == $dept ? "selected" : "";
                        echo "<option class='options' value='$dept' $selected>$dept</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="name-search">
                  <div class="search-logo">
                    
                  </div>
                  <input class="search-label" type="text" id="search_employee" name="search_employee" placeholder="Employee Name">
                </div>
              </form>
            </div>
            <div class="lower-maincontent">
              <table class="table" border="0">
                <tr class="row-head">
                  <th>Employee Id</th>
                  <th>First Name</th>        
                  <th>Last Name</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php
                  if ($selected_dept == 'all') {
                    $getEmployee = "SELECT * FROM employee_table";
                  }
                  else {
                    $getEmployee = "SELECT * FROM employee_table WHERE department = '$selected_dept'";
                  }
                  $employeeResult = mysqli_query($conn, $getEmployee);
                  while($employeeData = mysqli_fetch_assoc($employeeResult)){
                    $emp_id = $employeeData['employee_id'];
                    $first_name = $employeeData['first_name'];
                    $last_name = $employeeData['last_name'];
                    $department = $employeeData['department'];
                    $status = $employeeData['status'];
                    
                    echo "<tr class='row'>
                      <td>$emp_id</td>
                      <td>$first_name</td>
                      <td>$last_name</td>
                      <td>$department</td>
                      <td>$status</td>
                      <td> 
                        <form class='profile-form' action='admin_employee.php' method='POST' accept-charset='utf-8'>
                          <input type='hidden' name='emp_id' id='emp_id' value='$emp_id'/>
                            <button class='profile-btn' type='submit'>Profile</button>
                        </form>
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
  <script src="admin_employee.js"></script>
</body>

</html>