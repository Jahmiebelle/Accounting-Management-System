<?php 
include '../../Login/db.php';
session_start();

// Redirect if not logged in
if(!isset($_SESSION['admin_id'])) {
    header("Location: ../../Login/admin_login.php");
    exit();
}

// Get current date for default filter
$current_date = date('Y-m-d');

// Process filters - mobile-friendly with null coalescing
$search = $_GET['search'] ?? '';
$date_filter = $_GET['date'] ?? $current_date;
$dept_filter = $_GET['department'] ?? '';

// Base query with JOINs
$query = "SELECT a.*, 
          CONCAT(e.first_name, ' ', e.last_name) AS employee_name,
          d.department_name,
          TIME(a.check_in) AS check_in_time,
          TIME(a.check_out) AS check_out_time,
          DATE(a.check_in) AS check_date
          FROM attendance a
          JOIN employees e ON a.employee_id = e.employee_id
          JOIN departments d ON e.department_id = d.department_id
          WHERE DATE(a.check_in) = ?";

// Add parameters to array
$params = [$date_filter];
$types = "s";

// Add search filter if exists
if(!empty($search)) {
    $query .= " AND (e.first_name LIKE ? OR e.last_name LIKE ?)";
    array_push($params, "%$search%", "%$search%");
    $types .= "ss";
}

// Add department filter if exists
if(!empty($dept_filter) && is_numeric($dept_filter)) {
    $query .= " AND e.department_id = ?";
    array_push($params, $dept_filter);
    $types .= "i";
}

$query .= " ORDER BY a.check_in DESC";

// Prepared statement for security
$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Attendance</title>
  <link rel="stylesheet" href="../../Styles/admin_attendance.css">
</head>
<body>

  <div class="outer-container">
    <header class="header-container">
      <div class="brand-container">
        <div class="brand-icon"></div>
        <div class="brand-name">
          HEROES TEACH<span id="track" style="color: #ADD8E6">TRACK</span>
        </div>
      </div>
      <div class="role">admin</div>
    </header>
    
    <div class="inner-container">
      <div class="sidebar-container">
        <div class="sidebar">
          <div class="sidetabs" id="dashboard-tab">
            <div class="tab-icon" id="dashboard-tab-icon"></div>
            <div class="tab-text">Dashboard</div>
          </div>
          <div class="sidetabs" id="employee-tab">
            <div class="tab-icon" id="employee-tab-icon"></div>
            <div class="tab-text">Employee</div>
          </div>
          <div class="sidetabs" id="department-tab">
            <div class="tab-icon" id="department-tab-icon"></div>
            <div class="tab-text">Department</div>
          </div>
          <div class="sidetabs" id="payroll-tab">
            <div class="tab-icon" id="payroll-tab-icon"></div>
            <div class="tab-text">Payroll</div>
          </div>
          <div class="sidetabs" id="attendance-tab">
            <div class="tab-icon" id="attendance-tab-icon"></div>
            <div class="tab-text">Attendance</div>
          </div>
        </div>
      </div>
      
      <div class="content-container">
        <div class="employee-content-container">
          <div class="upper-content">
            <div class="section-name">
              <div class="section-icon"></div>
              <div class="section-text">Attendance</div>
            </div>
            <div class="logout-icon" id="logout-icon"></div>
          </div>
          
          <div class="greetings-content">
            <div class="left-greetings">
              <div class="greetings">
                Welcome, <?= htmlspecialchars($_SESSION['admin_first_name'] . " " . $_SESSION['admin_last_name']) ?>
              </div>
              <div class="path">Admin / Attendance</div>
            </div>
            <div class="right-greetings">
              <div class="datetime">
                <?= date("l, F j, Y g:i A") ?>
              </div>
              <div class="emptybox">empty</div>
            </div>
          </div>
          
          <div class="main-content">
            <form method="GET" class="filter-section">
              <div class="filter-row">
                <input type="date" name="date" id="date-filter" 
                      value="<?= htmlspecialchars($date_filter) ?>" 
                      class="filter-input">
                
                <select name="department" id="department-filter" class="filter-input">
                  <option value="">All Departments</option>
                  <?php
                  $depts = $conn->query("SELECT * FROM departments");
                  while($dept = $depts->fetch_assoc()):
                    $selected = ($dept['department_id'] == $dept_filter) ? 'selected' : '';
                  ?>
                    <option value="<?= $dept['department_id'] ?>" <?= $selected ?>>
                      <?= htmlspecialchars($dept['department_name']) ?>
                    </option>
                  <?php endwhile; ?>
                </select>
              </div>
              
              <div class="filter-row">
                <input type="text" name="search" id="search-input" 
                      placeholder="Search by name..." 
                      value="<?= htmlspecialchars($search) ?>"
                      class="filter-input">
                
                <button type="submit" class="filter-btn">
                  Apply Filters
                </button>
              </div>
            </form>

            <div class="table-container">
              <table class="attendance-table">
                <thead>
                  <tr>
                    <th>Dept</th>
                    <th>Employee</th>
                    <th>Date</th>
                    <th>In</th>
                    <th>Out</th>
                    <th>Hours</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): 
                      $check_in = new DateTime($row['check_in_time']);
                      $check_out = new DateTime($row['check_out_time']);
                      $hours = $check_out->diff($check_in);
                      $total_hours = $hours->h + ($hours->i/60);
                    ?>
                      <tr>
                        <td><?= substr(htmlspecialchars($row['department_name']), 0, 3) ?></td>
                        <td><?= htmlspecialchars($row['employee_name']) ?></td>
                        <td><?= date('m/d/y', strtotime($row['check_date'])) ?></td>
                        <td><?= date('h:i A', strtotime($row['check_in_time'])) ?></td>
                        <td><?= date('h:i A', strtotime($row['check_out_time'])) ?></td>
                        <td><?= number_format($total_hours, 1) ?>h</td>
                      </tr>
                    <?php endwhile; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6">No records found</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            
            <div class="pagination">
              <button class="pagination-btn" disabled>← Previous</button>
              <span>Page 1</span>
              <button class="pagination-btn">Next →</button>
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
        Employee management system for efficient HR operations
      </div>
      <div class="brand-copyright">
        © <?= date('Y') ?> Heroes TeachTrack
      </div>
    </footer>
  </div>
  
  <script src="admin_attendance.js"></script>
</body>
</html>
<?php
// Close database connection
$stmt->close();
$conn->close();
?>