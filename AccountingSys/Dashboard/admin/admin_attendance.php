<?php include '../../Login/db.php';
session_start();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="../../Styles/admin_attendance.css">
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
                Attendance
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
             <div class="attendance-wrapper">
              <div class="attendance-header">
                <form method="GET" action="" class="attendance-form">
                  <div class="filter-group">
                    <input type="date" id="filter_date" name="filter_date" class="search-label" placeholder="Mm/Dd/YYyy">
                  </div>
                  <button type="submit" name="filter" class="filter-btn">Filter</button>
                  <div class="filter-group">
                      <input type="text" id="search_employee" name="search_employee" class="search-label" placeholder="Name & Surname (e.g., Anna Cruz)">
                  </div>
                  <button type="submit" name="search" class="search-btn">Search</button>
                </form>
                <?php
                $filterDate = $_GET['filter_date'] ?? null;
                $searchEmployee = $_GET['search_employee'] ?? '';

                $query = "SELECT * FROM admin_employee_attendance WHERE 1=1";
                $params = [];

                if (!empty($filterDate)) {
                  $query .= " AND employee_date = ?";
                  $params[] = $filterDate;
                }

                if (!empty($searchEmployee)) {
                  $query .= " AND CONCAT(first_name, ' ', last_name) LIKE ?";
                  $params[] = "%$searchEmployee%";
                }

                $stmt = $conn->prepare($query);

                if (count($params)) {
                  $types = str_repeat("s", count($params));
                  $stmt->bind_param($types, ...$params);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                  echo "<p>No results found.</p>";
                }
                if (!$stmt) {
                  die("Query preparation failed: " . $conn->error);
                                 }
                ?>
              </div>
          
            
             <table class="attendance-table">
              <thead>
                <tr>
                  <th>Department ID</th>
                  <th>Employee ID</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Clock-in</th>
                  <th>Clock-out</th>
                  <th>Overtime</th>
                  <th>Total Hours of Work</th>
                  </tr>
                </thead>
               <tbody>
  <?php

$query = "SELECT * FROM admin_employee_attendance";
$result = mysqli_query($conn, $query);

while ($row = $result->fetch_assoc()) {
    $clock_in = $row['clock_in'];
    $clock_out = $row['clock_out'];

    $clock_in_time = strtotime(datetime: $clock_in);
    $clock_out_time = strtotime(datetime: $clock_out);
    $worked_seconds = $clock_out_time - $clock_in_time;
    $standard_seconds = 8 * 60 * 60;

    if ($worked_seconds > $standard_seconds) {
        $overtime_seconds = $worked_seconds - $standard_seconds;
        $overtime_hours = floor($overtime_seconds / 3600);
        $overtime_minutes = floor(($overtime_seconds % 3600) / 60);
        $employee_overtime = sprintf("%02d:%02d", $overtime_hours, $overtime_minutes);
    } else {
        $employee_overtime = "00:00";
    }

    $total_hours = floor($worked_seconds / 3600) . " hrs";

    echo "<tr>";
    echo "<td>{$row['department_id']}</td>";
    echo "<td>{$row['employee_id']}</td>";
    echo "<td>{$row['employee_name']}</td>";
    echo "<td>{$row['employee_date']}</td>";
    echo "<td>" . date("h:i A", strtotime($row['clock_in'])) . "</td>";
    echo "<td>" . date("h:i A", strtotime($row['clock_out'])) . "</td>";
    echo "<td>$employee_overtime</td>";
    echo "<td>$total_hours</td>";
    echo "</tr>";
}
?>
</tbody>
              </table>
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
  <script src="admin_attendance.js"></script>
</body>

</html>