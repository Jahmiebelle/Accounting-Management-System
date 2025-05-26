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
const profile_content = document.getElementById('profile-ol-content');

profileButtons.forEach(function(button){
  button.addEventListener('click', function() {
    profileOl.classList.add('show');
    profile_content.scrollTop = 0;
    const cid = button.dataset.cid;
    const id = button.dataset.id;
    const fn = button.dataset.fn;
    const ln = button.dataset.ln;
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
    document.getElementById('upf-upper-name').innerText = fn + " " + ln;
    document.getElementById('upf-upper-dept').innerText = dept;
    
    document.getElementById('emp-cid').value = cid;
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

const edit_btn = document.getElementById('upf-edit-btn');
const save_btn = document.getElementById('upf-save-btn');

let edit = true;

function saveEmpData(){
  let cid = document.getElementById('emp-cid').value;
  let id = document.getElementById('emp-id').value;
  let fn = document.getElementById('emp-fn').value;
  let ln = document.getElementById('emp-ln').value;
  let gender = document.getElementById('emp-gender').value;
  let birthdate = document.getElementById('emp-birth').value;
  let joindate = document.getElementById('emp-join').value;
  let dept = document.getElementById('emp-dept').value;
  let position = document.getElementById('emp-position').value;
  let emptype = document.getElementById('emp-type').value;
  let status = document.getElementById('emp-status').value;
  let bank = document.getElementById('emp-bank').value;
  let sss = document.getElementById('emp-sss').value;
  let philhealth = document.getElementById('emp-philhealth').value;
  let pagibig = document.getElementById('emp-pagibig').value;
  let email = document.getElementById('emp-email').value;
  let contact = document.getElementById('emp-contact').value;
  
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_profile.php", true);
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
  const data = "cid=" + encodeURIComponent(cid) + "&id=" + encodeURIComponent(id) + "&fn=" + encodeURIComponent(fn) + "&ln=" + encodeURIComponent(ln) + "&gender=" + encodeURIComponent(gender) + "&birthdate=" + encodeURIComponent(birthdate) + "&joindate=" + encodeURIComponent(joindate) + "&dept=" + encodeURIComponent(dept) + "&position=" + encodeURIComponent(position) + "&emptype=" + encodeURIComponent(emptype) + "&status=" + encodeURIComponent(status) + "&bank=" + encodeURIComponent(bank) + "&sss=" + encodeURIComponent(sss) + "&philhealth=" + encodeURIComponent(philhealth) + "&pagibig=" + encodeURIComponent(pagibig) + "&email=" + encodeURIComponent(email) + "&contact=" + encodeURIComponent(contact);
  
  xhr.send(data);

}

edit_btn.addEventListener('click', function(){
  save_btn.classList.toggle('enable');
  const inputbox = document.querySelectorAll('.inputboxes');
  
  if(edit){
    inputbox.forEach(function(input){
    input.classList.add('editable');
    input.removeAttribute('readonly');
    });
    edit_btn.innerText = "Cancel";
    
  }
  else {
    
    inputbox.forEach(function(input){
    input.classList.remove('editable');
    input.setAttribute('readonly', true);
    });
    edit_btn.innerText = "Edit";
  
  }
  edit = !edit;
});

function deac_clicked(){
  checkbox = document.getElementById('deac-emp');
  searchbar = document.querySelector('.name-search');
  deptsort = document.querySelector('.dept-sort');
  if(checkbox.value == '0'){
    checkbox.value = '1';
    checkbox.setAttribute('checked', true);
    searchbar.classList.add('hide');
    deptsort.classList.add('hide');
  }
  else {
    checkbox.value = '0';
    checkbox.removeAttribute('checked');
    searchbar.classList.remove('hide');
    deptsort.classList.remove('hide');
  }
}
