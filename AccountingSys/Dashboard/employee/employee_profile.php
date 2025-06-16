<?php include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employee</title>
  <link rel="stylesheet" href="../../Styles/employee_profile.css">
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
      <div class="new-logout-container">
      <div class="role">
        EMPLOYEE
      </div>
      <div class="new-logout-icon" id="new-logout-icon"></div>
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

          <!--<div class="sidetabs" id="attendance-tab">
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
          </div>-->
        </div>
      </div>
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon">
                
              </div>
              <div class="section-text">
                Profile
              </div>
            </div>

            <div class="logout-icon" id="logout-icon">
              
            </div>
          </div>
          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome, <?php
                  if (isset($_SESSION['employee_first_name']) && isset($_SESSION['employee_last_name'])) {
                    echo $_SESSION['employee_first_name'] . " " . $_SESSION['employee_last_name'];
                  }
                  else{
                    echo "Guest";
                  }
                ?>
              </div>
              <div class="path">
              </div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?php date_default_timezone_set("Asia/Manila");
                      echo date("l, F j, Y \a\\t g:i A T"); 
                      ?> 
              </div>
              <div class="emptybox">
                
              </div>
            </div>
            
          </div>
          <?php
            include 'getEmployeeData.php';
          ?>
          <div class="main-content">
            <div class="profile-card">
              <div class="profile-header">
                <div class="circle-pic"></div>
                <div class="header-info">
                  <h2><?=$fullname?></h2>
                  <p><?=$department?></p>
                  <p>ID: <?=$empId?></p>
                </div>
              </div>

              <div class="buttons">
                <button type="button" form="personal-info-form" id="personal-btn">Edit Personal Info</button>
                <button>Edit Profile Picture</button>
                <button>Change Password</button>
              </div>

              <div class="upper-boxes">
                <form class="info-box" action="savePersonalInfo.php" method="POST" id="personal-info-form">
                  <div class="title-box">
                    Personal Information
                  </div>
                  <div class="left-table">
                    <div class="profile-input-group">
                      <label for="employee-fname">First Name</label>
                      <input type="text" id="employee-fname" value="<?=$fname?>" class="profile-input" name="fname" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="employee-lname">Last Name</label>
                      <input type="text" id="employee-lname" value="<?=$lname?>" class="profile-input" name="lname" readonly>
                    </div>
                    
                    <div class="profile-input-group">
                      <label for="gender">Gender</label>
                      <select id="gender" class="profile-select" name="gender" disabled>
                        <option value="male" <?= $gender == 'male' ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?= $gender == 'female' ? 'selected' : '' ?>>Female</option>
                      </select>
                    </div>
                    <div class="profile-input-group">
                      <label for="birthdate">Birthdate</label>
                      <input type="date" id="birthdate" value="<?=$birthdate?>" class="profile-input" name="birthdate" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="email">Email</label>
                      <input type="text" id="email" value="<?=$email?>" class="profile-input" name="email" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="contact">Contact No.</label>
                      <input type="number" id="contact" value="<?=$contact?>" class="profile-input" name="contact" readonly>
                    </div>
                  </div>    
                </form>

                <form class="info-box">
                  <div class="title-box">
                    Work Information
                  </div>
                  <div class="right-table">
                    <!--<div class="modern-input-container">
                      <div class="modern-input">
                        <fieldset class="fieldsets">
                          <legend>Department Name</legend>
                        </fieldset>
                        <input class="inputboxes" type="text" id="add-dept-name" name="add_dept_name" value="Information Technology" placeholder="e.g. Information Technology" readonly>
                      </div>
                    </div>-->
                    <div class="profile-input-group">
                      <label for="compId">Company ID</label>
                      <input type="text" id="compId" value="<?=$company_id?>" class="work-input" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="department">Department</label>
                      <input type="text" id="department" value="<?=$department?>" class="work-input" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="position">Position</label>
                      <input type="text" id="position" value="<?=$position?>" class="work-input" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="status">Status</label>
                      <input type="text" id="status" value="<?=$status?>" class="work-input" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="joindate">Join Date</label>
                      <input type="text" id="joindate" value="<?=$joindate?>" class="work-input" readonly>
                    </div>
                    
                  </div>
                  
                </form>
              </div>
              <div class="lower-boxes">
                <form class="info-box-bottom" action="saveBankInfo.php" method="POST" id="bank-info-form">
                  <div class="title-box">
                    Bank & Payment Information
                    <div class="saveBankBtnContainer">
                      <button type="button" id="bank-btn">Edit</button>
                    </div>
                  </div>
                  <div class="left-table">
                    <div class="profile-input-group">
                      <label for="bank">Bank Account Number</label>
                      <input type="number" id="bank" value="<?=$bank?>" class="bank-input" name="bank" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="sss">SSS Number</label>
                      <input type="text" id="sss" value="<?=$sss?>" class="bank-input" name="sss" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="philhealth">PhilHealth Number</label>
                      <input type="text" id="philhealth" value="<?=$philhealth?>" class="bank-input" name="philhealth" readonly>
                    </div>
                    <div class="profile-input-group">
                      <label for="pagibig">Pagibig Number</label>
                      <input type="text" id="pagibig" value="<?=$pagibig?>" class="bank-input" name="pagibig" readonly>
                    </div>
                  </div>
                    
                </form>
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
  <script src="employee_profile.js"></script>
</body>

</html>