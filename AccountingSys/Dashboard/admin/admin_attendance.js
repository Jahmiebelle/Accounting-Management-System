document.getElementById('logout-icon').addEventListener('click', function () {
  window.location.href = "../../Login/logout.php";
});

document.getElementById('dashboard-tab').addEventListener('click', function () {
  window.location.href = "admin_dashboard.php";
});

document.getElementById('employee-tab').addEventListener('click', function () {
  window.location.href = "admin_employee.php";
});

document.getElementById('department-tab').addEventListener('click', function () {
  window.location.href = "admin_department.php";
});

document.getElementById('payroll-tab').addEventListener('click', function () {
  window.location.href = "admin_payroll.php";
});

document.getElementById('search_employee').addEventListener('keydown', function(e){
    if(e.key === "Enter"){
      e.preventDefault();
    }
  });

document.getElementById('month-input-box').addEventListener('keydown', function(e){
    if(e.key === "Enter"){
      e.preventDefault();
    }
  });