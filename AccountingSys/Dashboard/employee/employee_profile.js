document.getElementById('logout-icon').addEventListener('click', function () {
  window.location.href = "../../Login/logout.php";
});

document.getElementById('dashboard-tab').addEventListener('click', function () {
  window.location.href = "employee_dashboard.php";
});

//document.getElementById('attendance-tab').addEventListener('click', function () {
//  window.location.href = "employee_attendance.php";
//});

//document.getElementById('payroll-tab').addEventListener('click', function () {
//  window.location.href = "employee_payroll.php";
//});

const editProfileBtn = document.getElementById('personal-btn');
let editProfile = false;
editProfileBtn.addEventListener('click', function(){
  if(!editProfile){
    editProfileBtn.innerText = "Save Personal Info";
    editProfileBtn.classList.add('editable');
    editProfile = !editProfile;

  }
  else{
    editProfileBtn.innerText = "Edit Personal Info";
    editProfileBtn.classList.remove('editable');
    editProfile = !editProfile;
    editProfileBtn.type = 'submit';
  }
});