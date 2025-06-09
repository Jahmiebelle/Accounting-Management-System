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
                Employee
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
          <div class="main-content">
            <div class="profile-card">
              <div class="profile-header">
                <div class="circle-pic"></div>
                <div>
                  <h2>Gabriel</h2>
                  <p>Information Technology</p>
                  <p>EMPLOYEE ID: 1004</p>
                </div>
              </div>

              <div class="buttons">
                <button>Edit Profile Picture</button>
                <button>Request for Update (Profile)</button>
                <button>Account Settings</button>
              </div>

              <div class="upper-boxes">
                <div class="info-box">
                  <div class="title-box">
                    Personal Information
                  </div>
                  <table class="left-table">
                    <tr>
                      <td>FULL NAME: </td>
                      <td>Jahmiebelle</td>
                    </tr>
                    <tr>
                      <td>BIRTHDAY</td>
                      <td>11/28/2002</td>
                    </tr>
                     <tr>
                      <td>GENDER:</td>
                      <td>Female</td>
                    </tr>
                     <tr>
                      <td>PHONE NUMBER:</td>
                      <td>09123456789</td>
                    </tr>
                     <tr>
                      <td>ADDRESS:</td>
                      <td>Imus, Cavite</td>
                    </tr>
                  </table>    
                </div>

                <div class="info-box">
                  <div class="title-box">
                    Work Information
                  </div>
                  <table class="right-table">
                    <tr>
                      <td>FULL NAME: </td>
                      <td>Jahmiebelle</td>
                    </tr>
                    <tr>
                      <td>BIRTHDAY</td>
                      <td>11/28/2002</td>
                    </tr>
                     <tr>
                      <td>GENDER:</td>
                      <td>Female</td>
                    </tr>
                  </table>    
                </div>
              </div>
              <div class="lower-boxes">
                <div class="info-box-bottom">
                  <div class="title-box">
                    Bank & Payment Information
                  </div>
                  <table class="left-table">
                    <tr>
                      <td>FULL NAME: </td>
                      <td>Jahmiebelle</td>
                    </tr>
                    <tr>
                      <td>BIRTHDAY</td>
                      <td>11/28/2002</td>
                    </tr>
                     <tr>
                      <td>GENDER:</td>
                      <td>Female</td>
                    </tr>
                     <tr>
                      <td>PHONE NUMBER:</td>
                      <td>09123456789</td>
                    </tr>
                  </table> 
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
  <script src="employee_profile.js"></script>
</body>

</html>