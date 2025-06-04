window.addEventListener('DOMContentLoaded', function() {
  document.getElementById('dashboard-tab').addEventListener('click', function() {
    window.location.href = "employee_dashboard.php";
  });
  
  document.getElementById('profile-tab').addEventListener('click', function() {
    window.location.href = "employee_profile.php";
  });
  
  document.getElementById('payroll-tab').addEventListener('click', function() {
    window.location.href = "employee_payroll.php";
  });
  
  document.getElementById('logout-icon').addEventListener('click', function() {
    window.location.href = "../../Login/logout.php";
  });
});