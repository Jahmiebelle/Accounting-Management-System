document.getElementById('logout-icon').addEventListener('click', function () {
  window.location.href = "../../Login/logout.php";
});

document.getElementById('dashboard-tab').addEventListener('click', function () {
  window.location.href = "admin_dashboard.php";
});

document.getElementById('department-tab').addEventListener('click', function () {
  window.location.href = "admin_department.php";
});

document.getElementById('leavereq-tab').addEventListener('click', function () {
  window.location.href = "admin_leavereq.php";
});

document.getElementById('payroll-tab').addEventListener('click', function () {
  window.location.href = "admin_payroll.php";
});

document.getElementById('attendance-tab').addEventListener('click', function () {
  window.location.href = "admin_attendance.php";
});

const profileButton = document.getElementById('profile-btn');
const profileOl = document.getElementById('profile-ol');

profileButton.addEventListener('click', function(){
  profileOl.classList.add('show');
});

profileOl.addEventListener('click', function(event){
  if (event.target === profileOl) {
    profileOl.classList.remove('show');
  }
});
