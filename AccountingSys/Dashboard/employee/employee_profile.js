document.getElementById('new-logout-icon').addEventListener('click', function () {
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
const submitFile = document.getElementById('submitFile');
const savePicBtn = document.getElementById('save-pic-btn');
selectPicBtn.addEventListener('click', function(){
  savePicBtn.classList.add('show');
  fileInput.click();
});

fileInput.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const imageURL = URL.createObjectURL(file);
    previewPic.style.backgroundImage = `url('${imageURL}')`;
    previewPic.style.backgroundSize = 'cover';
    previewPic.style.backgroundPosition = 'center';
  }
});

savePicBtn.addEventListener('click', function(){
  let savePicConfirmation = confirm("Are you sure you you want this as your profile picture?");
  if(savePicConfirmation){
    savePicBtn.classList.remove('show');
    submitFile.click();
  }
});

const changePassBtn = document.getElementById('change-pass-btn');
const passOl = document.getElementById('pass-ol');
changePassBtn.addEventListener('click', function(){
  passOl.classList.add('show');
  
  
});
passOl.addEventListener('click', function(e){
  if(e.target == passOl){
    passOl.classList.remove('show');
  }
});

const savePassBtn = document.getElementById('reset-pass-btn');

savePassBtn.addEventListener('click', function(e){
  const realPass = document.getElementById('realPass').value;
  const oldPass = document.getElementById('old-pass').value;
  const newPass = document.getElementById('new-pass').value;
  const confirmPass = document.getElementById('confirm-pass').value;
  if(realPass !== oldPass){
    e.preventDefault();
    alert("Incorrect Password!");
  }
  else{
    if (newPass !== confirmPass) {
      e.preventDefault();
      alert("Passwords do not match.");
    }
    else{
      alert("Password changed successfully.");
    }
  }
  
  
});