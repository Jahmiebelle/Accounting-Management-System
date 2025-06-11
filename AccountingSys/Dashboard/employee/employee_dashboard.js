document.addEventListener('DOMContentLoaded', function () {
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
 
 if(clockInBtn.disabled){
   clockInBtn.classList.add('disabled');
   clockInBtn.innerText = "CLOCKED IN";
 }
 else{
  clockInBtn.classList.remove('disabled');
  clockInBtn.addEventListener('click', function(){
    const emp_id = clockInBtn.dataset.id;
    const emp_name = clockOutBtn.dataset.name;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "clockin.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
      if (xhr.status === 200) {
        alert(xhr.responseText);
        setTimeout(function(){
          location.reload();
        }, 100);
      }
      else {
        alert(xhr.responseText);
      }
    };
    const data = "clock_in_id=" + encodeURIComponent(emp_id);
    let confirmClockIn = confirm("Are you sure you want to clock in?");
    if(confirmClockIn){
      xhr.send(data);
    }
    else{
      
    }
  });
   
 }
 
  
 const clockOutBtn = document.getElementById('clock-out-btn');
 if(clockOutBtn.disabled){
  clockOutBtn.classList.add('disabled');
  clockOutBtn.innerText = "CLOCKED OUT";
 }
 else{
  clockOutBtn.classList.remove('disabled');
  clockOutBtn.addEventListener('click', function(){
    const emp_id = clockOutBtn.dataset.id;
    const emp_name = clockOutBtn.dataset.name;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "clockout.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
      if (xhr.status === 200) {
        alert(xhr.responseText);
        setTimeout(function(){
          location.reload();
        }, 100);
      }
      else {
        alert(xhr.responseText);
      }
    };
    const data = "clock_out_id=" + encodeURIComponent(emp_id);
    let confirmClockOut = confirm("Are you sure you want to clock out?");
    if(confirmClockOut){
      xhr.send(data);
    }
    else{
      
    }
  });
  }
});
