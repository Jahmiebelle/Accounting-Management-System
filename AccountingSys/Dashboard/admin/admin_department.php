<?php include '../../Login/db.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_department.css">
</head>

<body>

  <div class="outer-container">
     <div class="add-ol" id="add-ol">
      <div class="add-ol-content" id="add-ol-content">
        <form action="" method="POST" class="add-ol-form" id="add-ol-form">
          <div class="upper-add-form">
            <div class="upper-form-header">ADD DEPARTMENT</div>
            <button class="save-add-btn" id="save-add-btn" type="button">Save</button>
          </div>
          <div class="lower-add-form">

            <div class="modern-input-container">
              <div class="modern-input">
                <fieldset class="fieldsets">
                  <legend>Department Id</legend>
                </fieldset>
                <input class="addboxes" type="number" id="add-dept-id" name="add_dept_id" value="" placeholder="e.g. 001" required>
              </div>
            </div>

            <div class="modern-input-container">
              <div class="modern-input">
                <fieldset class="fieldsets">
                  <legend>Department Name</legend>
                </fieldset>
                <input class="addboxes" type="text" id="add-dept-name" name="add_dept_name" value="" placeholder="e.g. Information Technology" required>
              </div>
            </div>

            <div class="modern-input-container">
              <div class="modern-input">
                <fieldset class="fieldsets">
                  <legend>Dept Code/Abbr</legend>
                </fieldset>
                <input class="addboxes" type="text" id="add-dept-abbr" name="add_dept_abbr" value="" placeholder="IT" required>
                </div>
              </div>
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
                Department
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
            <div class="upper-main-content">
              <div class="button-content">
                <button class="add-dept-btn" id="add-dept-btn" type="button">Add Department</button>
              </div>
            </div>
            <div class="lower-main-content">
              <table class="dept-table">
                <tr>
                  <th>Department ID</th>
                  <th>Department Name</th>
                  <th>Dept. Code</th>
                  <th>Action</th>
                </tr>
                <?php
                $getDeptQuery = "SELECT * FROM department_table;";
                $deptNameResult = mysqli_query($conn, $getDeptQuery);
                while($deptRow = mysqli_fetch_assoc($deptNameResult)){
                  $dept_id = $deptRow['department_id'];
                  $dept_name = $deptRow['department_name'];
                  $dept_abbr = $deptRow['acronym'];
                  echo "<tr>
                    <td>$dept_id</td>
                    <td>$dept_name</td>
                    <td>$dept_abbr</td>
                    <td><div data-name='$dept_name' data-id='$dept_id' class='delete-dept'>

                    </div></td>
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
  <script src="admin_department.js"></script>
</body>

</html>