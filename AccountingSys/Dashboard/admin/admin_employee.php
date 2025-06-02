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
  <div class="outer-container" id="outer-container">
    <!-- Dito mga overlays, ol means overlay -->
    <div class="add-ol" id="add-ol">
      <div class="add-ol-content" id="add-ol-content">
        <form action="" method="POST" class="add-ol-form" id="add-ol-form">
          <div class="upper-add-form">
            ADD EMPLOYEE
            <button class="save-add-btn" id="save-add-btn" type="button">Save Employee</button>
          </div>
          <div class="lower-add-form">
            <label class="profile-labels" for="lpf-basic">Basic Details</label>
            <div class="lpf-basic" id="lpf-basic">
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Employee Id</legend>
                  </fieldset>
                  <input class="addboxes" type="number" id="add-id" name="add_id" value="" placeholder="e.g. 12345" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Company Id</legend>
                  </fieldset>
                  <input class="addboxes" type="number" id="add-cid" name="add_cid" value="" placeholder="e.g. 2025000" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Password</legend>
                  </fieldset>
                  <input class="addboxes" type="password" id="add-password" name="add_password" value="" placeholder="Password" required>
                  <div class="show-pass-icon" id="show-pass-icon">
                    
                  </div>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>First Name</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-fn" name="add_fn" value="" placeholder="e.g. Juan" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Last Name</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-ln" name="add_ln" value="" placeholder="e.g. Delacruz" required>
                </div>
              </div>
              
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Gender</legend>
                  </fieldset>
                  <select class="dropdown-addboxes" id="add-gender" name="add_gender" value="" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option id="add-male-gender" value="male">Male</option>
                    <option id="add-female-gender" value="female">Female</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Birthdate</legend>
                  </fieldset>
                  <input class="addboxes" type="date" id="add-birth" name="add_birthdate" value="" placeholder="04/18/1999" required>
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
                  <input class="addboxes" type="date" id="add-join" name="add_joindate" value="" placeholder="04/18/1999" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Department</legend>
                  </fieldset>
                  <select class="dropdown-addboxes" id="add-dept" name="add_dept" value="" required>
                    <option value="" disabled selected>Select Department</option>
                    <?php
                      $getAddDeptName = "SELECT department_name FROM department_table";
                      $addDeptResult = mysqli_query($conn, $getAddDeptName);
                      while($adddeptnamerow = mysqli_fetch_assoc($addDeptResult)){
                        $deptname = $adddeptnamerow['department_name'];
                        echo "<option value='$deptname'>$deptname</option>";      
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Position</legend>
                  </fieldset>
                  <select class="dropdown-addboxes" id="add-position" name="add_position" value="" required>
                    <option value="" disabled selected>Select Position</option>
                    <option id="add-professor-role" value="professor">Professor</option>
                    <option id="add-instructor-role" value="instructor">Instructor</option>
                    <option id="add-part_time_instructor-role" value="part_time_instructor">Part-Time Instructor</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Employment Type</legend>
                  </fieldset>
                  <select class="dropdown-addboxes" id="add-type" name="add_type" value="" required>
                    <option value="" disabled selected>Select Type</option>
                    <option id="add-regular-type" value="regular">Regular</option>
                    <option id="add-contractual-type" value="contractual">Contractual</option>
                    <option id="add-part-time-type" value="part-time">Part-Time</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Status</legend>
                  </fieldset>
                  <select class="dropdown-addboxes" id="add-status" name="add_status" value="" required>
                    <option value="" disabled selected>Select Status</option>
                    <option id="add-active-status" value="active">Active</option>
                    <option id="add-inactive-status" value="inactive">Inactive</option>
                    <option id="add-onleave-status" value="onleave">On Leave</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Bank Number</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-bank" name="add_bank" value="" placeholder="e.g. 012345678901" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>SSS</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-sss" name="add_sss" value=""  placeholder="e.g. 34-1234567-8" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Philhealth</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-philhealth" name="add_philhealth" value="" placeholder="e.g. 12-345678901-2" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Pagibig</legend>
                  </fieldset>
                  <input class="addboxes" type="text" id="add-pagibig" name="add_pagibig" value="" placeholder="e.g. 1234-5678-9012" required>
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
                  <input class="addboxes" type="text" id="add-email" name="add_email" value="" placeholder="e.g. JuanDc@gmail.com" required>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Contact Number</legend>
                  </fieldset>
                  <input class="addboxes" type="number" id="add-contact" name="add_contact" value="" placeholder="e.g 09123456789" required>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div class="profile-ol" id="profile-ol">
      <div class="profile-ol-content" id="profile-ol-content">
        <form action="" method="POST" class="profile-form-ol" id="profile-form-ol">
          <div class="upper-profile-form">
            <div class="upf-profile-container">
              <div class="upf-upper-profile">
              </div>
              <div class="upf-upper-info">
                 <input style="display: none; pointer-events: none;" type="number" id="emp-cid" name="employee_cid" value="" readonly>
                <h3 id="upf-upper-name">Full Name</h3>
                <h5 id="upf-upper-dept">Department</h5>
              </div>
            </div>
            <div class="save-edit-btn">
              <button type="button" class="upf-save-btn" id="upf-save-btn">
                Save
              </button>
              <button type="button" class="upf-edit-btn" id="upf-edit-btn">
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
                  <input class="inputboxes" type="number" id="emp-id" name="employee_id" value="" readonly>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>First Name</legend>
                  </fieldset>
                  <input class="inputboxes" type="text" id="emp-fn" name="employee_fn" value="Gab" readonly>
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
                  <select class="dropdown-boxes" id="emp-gender" name="employee_gender" value="" disabled>
                    <option id="male-gender" value="male">Male</option>
                    <option id="female-gender" value="female">Female</option>
                  </select>
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
                  <select class="dropdown-boxes" id="emp-dept" name="employee_dept" value="" disabled>
                    <?php
                      $getEditDeptName = "SELECT department_name FROM department_table";
                      $editDeptResult = mysqli_query($conn, $getEditDeptName);
                      while($deptnamerow = mysqli_fetch_assoc($editDeptResult)){
                        $deptname = $deptnamerow['department_name'];
                        $deptIdName = str_replace(' ', '', (strtolower($deptname)));
                        echo "<option id='$deptIdName' value='$deptname'>$deptname</option>";      
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Position</legend>
                  </fieldset>
                  <select class="dropdown-boxes" id="emp-position" name="employee_position" value="" disabled>
                    <option id="professor-role" value="professor">Professor</option>
                    <option id="instructor-role" value="instructor">Instructor</option>
                    <option id="part_time_instructor-role" value="part_time_instructor">Part-Time Instructor</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Employment Type</legend>
                  </fieldset>
                  <select class="dropdown-boxes" id="emp-type" name="employee_type" value="" disabled>
                    <option id="regular-type" value="regular">Regular</option>
                    <option id="contractual-type" value="contractual">Contractual</option>
                    <option id="part-time-type" value="part-time">Part-Time</option>
                  </select>
                </div>
              </div>
              <div class="modern-input-container">
                <div class="modern-input">
                  <fieldset class="fieldsets">
                    <legend>Status</legend>
                  </fieldset>
                  <select class="dropdown-boxes" id="emp-status" name="employee_status" value="" disabled>
                    <option id="active-status" value="active">Active</option>
                    <option id="inactive-status" value="inactive">Inactive</option>
                    <option id="onleave-status" value="onleave">On Leave</option>
                  </select>
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
                  <input class="inputboxes" type="number" id="emp-contact" name="employee_contact" value="" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="deac-btn-container">
            <button type="button" name="deac-btn" id="deac-btn" class="deac-btn" value="">Account</button>
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
                <div class="filter-by">
                  <div class="filter-box">
                    <div class="filter-icon">
                    </div>
                    <div class="filter-label">Filter by</div>
                    <div class="filter-arrow">
                      
                    </div>
                    <div class="filter-overlay" id="filter_overlay">
                      <div class="filter-overlay-container">
                        <div class="upper-option">
                          <div class="upper-filter-header">
                            Account Status
                          </div>
                          <?php
                            $getAccStatus = $_POST['accstatus'] ?? ['1'];
                            $checkedAccStatus = [];
                            foreach ($getAccStatus as $accstatus) {
                              $checkedAccStatus[] = "'".$accstatus."'";
                            }
                            $finalAccStatus = implode(',', $checkedAccStatus);
                            
                            $getDept = $_POST['departments'] ?? [];
                            $checkedDept = [];
                            foreach ($getDept as $deptName) {
                              $checkedDept[] = "'".$deptName."'";
                            }
                            $finalDeptNames = implode(',', $checkedDept);
                            
                            if (empty($checkedDept)) {
                              $getAllDeptQuery = "SELECT department_name FROM department_table";
                              $allDeptResult = mysqli_query($conn, $getAllDeptQuery);
                              $allDeptNames = [];
                              while ($allDeptRow = mysqli_fetch_assoc($allDeptResult)) {
                                $allDeptNames[] = "'" . $allDeptRow['department_name'] . "'";
                              }
                              $finalDeptNames = implode(",", $allDeptNames);
                            }
                          ?>
                          <div class="upper-filter">
                            <div class="checkbox-container">
                              <input type="checkbox" name="accstatus[]" id="active-choice" value="1" <?php echo in_array("1", $getAccStatus) ? "checked" : ""?>/>
                              <label for="active-choice">Activated</label>
                            </div>
                            <div class="checkbox-container">
                              <input type="checkbox" name="accstatus[]" id="deac-choice" value="0" <?php echo in_array("0", $getAccStatus) ? "checked" : ""?>/>
                              <label for="deac-choice">Deactivated</label>
                            </div>
                          </div>
                        </div>
                        <div class="lower-option">
                          <div class="lower-filter-header">
                            Departments
                          </div>
                          <div class="select-all-or-not">
                            <h5 id="select-all" class="select-all">Select All</h5>
                            <h5 id="deselect-all" class="deselect-all">Deselect All</h5>
                          </div>
                          <?php
                            $getDeptName = "SELECT department_name FROM department_table";
                            $dept_names = mysqli_query($conn, $getDeptName);
                            $getDeptCount = "SELECT COUNT(department_id) FROM department_table";
                            $count = 1;
                            while($dept = mysqli_fetch_assoc($dept_names)){
                              $dept_name = $dept['department_name'];
                              $input_id = "dept" . $count;
                            $box_checked = in_array("$dept_name", $getDept) ? "checked" : "";
                              echo "<div class='checkbox-container-lower'>
                                <input type='checkbox' name= 'departments[]' id='$input_id' class='dept-checkboxes' value='$dept_name' $box_checked/>
                                <label for='$input_id'>$dept_name</label>
                              </div>";
                            $count ++;
                            }
                            $checkedDept = isset($_POST['departments']);
                            
                            
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="searchbar">
                  <div class="name-search">
                    <div class="search-logo">
                      
                    </div>
                    <input class="search-label" type="text" id="search_employee" name="search_employee" placeholder="Name & Surname (e.g., Anna Cruz)">
                  </div>
                </div>
                <div class="search-btn-container">
                  <button class="search-btn" type="submit">Search</button>
                </div>
                <div class="add-emp-btn" id="add-emp-btn">
                  
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
                  $searchname = strtolower(trim($_POST['search_employee'] ?? ''));
                  $parts = explode(' ', $searchname);
                  if(count($parts) >= 2){
                    $last_name = array_pop($parts);
                    $first_name = implode(' ', $parts);
                  }
                  else{
                    $first_name = implode(' ', $parts);
                    $last_name = implode(' ', $parts);
                  }
                  
                  //default checks pag walang values ang arrays, default active sa status and default all sa departments
                  
                  
                  if(empty($searchname)){
                    $getEmployee = "SELECT * FROM employee_table WHERE department IN ($finalDeptNames) AND is_active IN ($finalAccStatus) AND first_name LIKE '%%';";
                  }
                  
                  else{
                    $getEmployee = "SELECT * FROM employee_table WHERE department IN ($finalDeptNames) AND is_active IN ($finalAccStatus) AND ((LOWER(first_name) = '$first_name' OR LOWER(last_name) = '$first_name') OR (LOWER(first_name) = '$last_name' OR LOWER(last_name) = '$last_name'));";
                  }
                  
                  
                  $employeeResult = mysqli_query($conn, $getEmployee);
                  if (mysqli_num_rows($employeeResult) == 0) {
                    echo "<tr><td colspan='10'>No employees found.</td></tr>";
                  }
                  else {
                    while($employeeData = mysqli_fetch_assoc($employeeResult)){
                      $comp_id = $employeeData['company_id'];
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
                      $contact = $employeeData['contact_number'];
                      $is_active = $employeeData['is_active'];
                      
                      if(strtolower($status) == "active"){
                        $status_color = "green-status";
                      }
                      elseif (strtolower($status) == "inactive") {
                        $status_color = "gray-status";
                      }
                      else {
                        $status_color = "orange-status";
                      }
                    
                      echo "<tr class='row' id='emp-table-data'>
                        <td>$emp_id</td>
                        <td>$first_name</td>
                        <td>$last_name</td>
                        <td>$department</td>
                        <td><div class='$status_color'>$status</div></td>
                        <td> 
                          <form class='profile-form' action='admin_employee.php' method='POST' accept-charset='utf-8'>
                            <input type='hidden' name='emp_id' id='emp_id' value='$emp_id'>
                              <button class='profile-btn' id='profile-btn' type='button' data-cid='$comp_id' data-id='$emp_id' data-fn='$first_name' data-ln='$last_name' data-gender='$gender' data-birthdate='$birthdate' data-joindate='$join_date' data-dept='$department' data-position='$position' data-emptype='$emp_type' data-status='$status' data-bank='$bank' data-sss='$sss' data-philhealth='$philhealth' data-pagibig='$pagibig' data-email='$email' data-contact='$contact' data-active='$is_active'>Profile</button>
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
        <?php
          echo "for bugs lang! " . $searchname, $finalAccStatus . "\nQuery: " . $getEmployee;
        ?>
        <!--Heroes TeachTrack is more than just an employee management system; 
it's a commitment to excellence. We provide businesses with the tools 
they need to simplify HR operations, enhance workforce efficiency, 
and optimize payroll and performance tracking. -->
      </div>
      <div class="brand-copyright">
        © 2025 Heroes TeachTrack. All Rights Reserved.
      </div>
    </footer>
      
  </div>
<script src="admin_employee.js?v=1.2"></script>
</body>

</html>
