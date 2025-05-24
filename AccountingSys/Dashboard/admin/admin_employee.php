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
    <!-- Dito mga overlays, ol means overlay -->
    <div class="profile-ol" id="profile-ol">
      <div class="profile-ol-content">
        <form action="" method="POST" class="profile-form-ol">
          <div class="upper-profile-form">
            <div class="upf-profile-container">
              <div class="upf-upper-profile">
              </div>
              <div class="upf-upper-info">
                <h1 id="upf-upper-name">Full Name</h1>
                <h5 id="upf-upper-dept">Department</h5>
                <h5 id="upf-upper-id">ID</h5>
              </div>
            </div>
            <div class="save-edit-btn">
              <button type="button" class="upf-save-btn">
                Save  
              </button>
              <button type="button" class="upf-edit-btn">
                Edit
              </button>
            </div>
          </div>
          
          
          <div class="lower-profile-form">
            <label class="profile-labels" for="lpf-basic">Basic Details</label>
            <div class="lpf-basic" id="lpf-basic">
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Employee Id</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" name="employee_id" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>First Name</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-fn" name="employee_fn" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Last Name</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-ln" name="employee_ln" value="" readonly>
                </div>
              </div>
              
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Gender</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-gender" name="employee_gender" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Birthdate</legend>
                  </fieldset>
                  <input class="inputboxes" type="date" id="emp-birth" name="employee_birthdate" value="" readonly>
                </div>
              </div>
            </div>
            <label class="profile-labels" for="lpf-work">Work Details</label>
            <div class="lpf-work" id="lpf-work">
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Join Date</legend>
                  </fieldset>
                  <input class="inputboxes" type="date" id="emp-join" name="employee_joindate" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Department</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-dept" name="employee_dept" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Position</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-position" name="employee_position" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Employment Type</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-type" name="employee_type" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Status</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-status" name="employee_status" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Bank Number</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-bank" name="employee_bank" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>SSS</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-sss" name="employee_sss" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Philhealth</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-philhealth" name="employee_philhealth" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Pagibig</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-pagibig" name="employee_pagibig" value="" readonly>
                </div>
              </div>
            </div>
            <label class="profile-labels" for="lpf-contact">Contact Details</label>
            <div class="lpf-contact" id="lpf-contact">
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Email</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-email" name="employee_email" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Contact Number</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-contact" name="employee_contact" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="deac-btn-container">
            <button type="button" name="deac-btn" id="deac-btn" class="deac-btn">Deactivate Account</button>
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
                  <input class="search-label" type="text" id="search_employee" name="search_employee" placeholder="Name & Surname (e.g., Anna Cruz)">
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
                    $searchname = strtolower(trim($_POST['search_employee']));
                    $parts = explode(' ', $searchname);
                    if (empty($searchname)){
                      if ($selected_dept == 'all') {
                        $getEmployee = "SELECT * FROM employee_table";
                      }
                      else {
                        $getEmployee = "SELECT * FROM employee_table WHERE department = '$selected_dept'";
                      }
                    }
                    else {
                      if ($selected_dept == 'all') {
                        if (count($parts) >= 2){
                          $full = implode(' ', $parts);
                          $lname = array_pop($parts);
                          $fname = implode(' ', $parts);
                          $getEmployee = "SELECT * FROM employee_table WHERE first_name = LOWER('$full') OR first_name = LOWER('$fname') OR last_name = LOWER('$lname')";
                        }
                        else {
                          $name = implode(' ', $parts);
                          $getEmployee = "SELECT * FROM employee_table WHERE first_name = LOWER('$name') OR last_name = LOWER('$name')";
                        }
                        
                      }
                      else {
                        if (count($parts) >= 2){
                          $full = implode(' ', $parts);
                          $lname = array_pop($parts);
                          $fname = implode(' ', $parts);
                          $getEmployee = "SELECT * FROM employee_table WHERE department = '$selected_dept' AND first_name = LOWER('$full') OR first_name = LOWER('$fname') OR last_name = LOWER('$lname')";
                        }
                        else {
                          $name = implode(' ', $parts);
                          $getEmployee = "SELECT * FROM employee_table WHERE department = '$selected_dept' AND first_name = LOWER('$name') OR last_name = LOWER('$name')";
                        }
                      }
                    }
                    $employeeResult = mysqli_query($conn, $getEmployee);
                    if (mysqli_num_rows($employeeResult) == 0) {
                      echo "<tr><td colspan='8'>No employees found.</td></tr>";
                    }
                    else {
                      while($employeeData = mysqli_fetch_assoc($employeeResult)){
                        $emp_id = $employeeData['employee_id'];
                        $first_name = $employeeData['first_name'];
                        $last_name = $employeeData['last_name'];
                        $gender = $employeeData['gender'];
                        $birthdate = $employeeData['birthdate'];
                        $join_date = $employeeData['join_date'];
                        $department = $employeeData['department'];
                        $position = $employeeData['position'];
                        $emp_type = $employeeData['employment_type'];
                        $status = $employeeData['status'];
                        $bank = $employeeData['bank_number'];
                        $sss = $employeeData['sss_number'];
                        $philhealth = $employeeData['philhealth_number'];
                        $pagibig = $employeeData['pagibig_number'];
                        $email = $employeeData['email'];
                        $contact = $employedData['contact_number'];
                        
                        
                        echo "<tr class='row'>
                          <td>$emp_id</td>
                          <td>$first_name</td>
                          <td>$last_name</td>
                          <td>$department</td>
                          <td>$status</td>
                          <td> 
                            <form class='profile-form' action='admin_employee.php' method='POST' accept-charset='utf-8'>
                              <input type='hidden' name='emp_id' id='emp_id' value='$emp_id'>
                                <button class='profile-btn' id='profile-btn' type='button' data-id='$emp_id' data-fn='$first_name' data-ln='$last_name' data-gender='$gender' data-birthdate='$birthdate' data-joindate='$join_date' data-dept='$department' data-position='$position' data-emptype='$emp_type' data-status='$status' data-bank='$bank' data-sss='$sss' data-philhealth='$philhealth' data-pagibig='$pagibig' data-email='$email' data-contact='$contact'>Profile</button>
                            </form>
                          </td>
                        </tr>";
                      }
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