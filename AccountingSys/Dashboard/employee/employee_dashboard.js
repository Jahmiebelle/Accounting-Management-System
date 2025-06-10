
  document.getElementById('logout-icon')?.addEventListener('click', function () {
    window.location.href = "../../Login/logout.php";
  });

  document.getElementById('profile-tab')?.addEventListener('click', function () {
    window.location.href = "employee_profile.php";
  });

  document.getElementById('attendance-tab')?.addEventListener('click', function () {
    window.location.href = "employee_attendance.php";
  });

  document.getElementById('payroll-tab')?.addEventListener('click', function () {
    window.location.href = "employee_payroll.php";
  });

 const clockInBtn = document.getElementById('clock-in-btn');
  
 const clockOutBtn = document.getElementById('clock-out-btn');
 