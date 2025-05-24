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

document.querySelector('.profile-form').scrollTop = 0;

const profileButtons = document.querySelectorAll('.profile-btn');
const profileOl = document.getElementById('profile-ol');

profileButtons.forEach(function(button){
  button.addEventListener('click', function() {
    profileOl.classList.add('show');
    const id = button.dataset.id;
    const fn = button.dataset.fn;
    const ln = button.dataset.ln;
    const fullname = fn + " " + ln;
    const gender = button.dataset.gender;
    const birthdate = button.dataset.birthdate;
    const joindate = button.dataset.joindate;
    const dept = button.dataset.dept;
    const position = button.dataset.position;
    const emptype = button.dataset.emptype;
    const status = button.dataset.status;
    const bank = button.dataset.bank;
    const sss = button.dataset.sss;
    const philhealth = button.dataset.philhealth;
    const pagibig = button.dataset.pagibig;
    const email = button.dataset.email;
    const contact = button.dataset.contact;

    document.getElementById('upf-upper-name').innerText = fullname;
    document.getElementById('upf-upper-dept').innerText = dept;
    document.getElementById('upf-upper-id').innerText = id;


    document.getElementById('emp-id').value = id;
    document.getElementById('emp-fn').value = fn;
    document.getElementById('emp-ln').value = ln;
    document.getElementById('emp-gender').value = gender;
    document.getElementById('emp-birth').value = birthdate;
    document.getElementById('emp-join').value = joindate;
    document.getElementById('emp-dept').value = dept;
    document.getElementById('emp-position').value = position;
    document.getElementById('emp-type').value = emptype;
    document.getElementById('emp-status').value = status;
    document.getElementById('emp-bank').value = bank;
    document.getElementById('emp-sss').value = sss;
    document.getElementById('emp-philhealth').value = philhealth;
    document.getElementById('emp-pagibig').value = pagibig;
    document.getElementById('emp-email').value = email;
    document.getElementById('emp-contact').value = contact;
  
    
  });
});

profileOl.addEventListener('click', function(event){
    if (event.target === profileOl) {
      profileOl.classList.remove('show');
    }
});
