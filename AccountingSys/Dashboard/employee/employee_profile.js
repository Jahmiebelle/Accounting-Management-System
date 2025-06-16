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
const profileInput = document.querySelectorAll('.profile-input');
const profileSelect = document.querySelector('.profile-select');
let editProfile = false;


editProfileBtn.addEventListener('click', function(){
  if(!editProfile){
    profileSelect.classList.add('editable');
    profileSelect.disabled = false;
    editProfileBtn.innerText = "Save Personal Info";
    editProfile = !editProfile;
    profileInput.forEach(function(pInput){
      pInput.classList.add('editable');
      pInput.removeAttribute('readonly');
    });
    

  }
  else{
    const profileSaveConfirm = confirm("Are you sure you want to save?");
    if(profileSaveConfirm){
      editProfileBtn.innerText = "Edit Personal Info";
      editProfile = !editProfile;
      editProfileBtn.type = 'submit';
      profileInput.forEach(function(pInput) {
        pInput.classList.remove('editable');
        pInput.setAttribute('readonly', true);
      });
      profileSelect.classList.remove('editable');
      profileSelect.disabled = false;
    }
  }
});

const bankBtn = document.getElementById('bank-btn');
const bankInput = document.querySelectorAll('.bank-input');
let editBank = false;
bankBtn.addEventListener('click', function(){
  if(!editBank){
    bankBtn.innerText = "Save";
    editBank = !editBank;
    bankInput.forEach(function(bInput){
      bInput.classList.add('editable');
      bInput.removeAttribute('readonly');
    });
  }
  else{
    const bankSaveConfirm = confirm("Are you sure you want to save?");
    if(bankSaveConfirm){
      bankBtn.innerText = "Edit";
      editBank = !editBank;
      bankInput.forEach(function(bInput) {
        bInput.classList.remove('editable');
        bInput.setAttribute('readonly', true);
      });
      bankBtn.type = 'submit';
    }
  }
});

const previewPic = document.getElementById('preview-pic');
const fileInput = document.getElementById('fileInput');
const selectPicBtn = document.getElementById('select-pic-btn');

selectPicBtn.addEventListener('click', function(){
  fileInput.click();
});

fileInput.addEventListener('change', function(){
  const file = this.files[0];
  if(file){
    const imageURL = URL.createObjectURL(file);
    previewPic.src = imageURL;
  }
  
  
});