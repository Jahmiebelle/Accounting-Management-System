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

document.getElementById('attendance-tab').addEventListener('click', function () {
  window.location.href = "admin_attendance.php";
});

const editTaxBtn = document.getElementById('edit-tax-btn');
const editRateBtn = document.getElementById('edit-rate-btn');
const incomeTaxInput = document.getElementById('income-tax-input');
const statutoryTaxInput = document.querySelectorAll('.statutory-tax-input');
const hourlyRateInput = document.querySelectorAll('.hourly-rate-price');

let editTax = false;
editTaxBtn.addEventListener('click', function(){
  if(editTax){
    editTaxBtn.innerText = "Edit";
    incomeTaxInput.setAttribute('readonly', true);
    incomeTaxInput.classList.remove('editable');
    statutoryTaxInput.forEach(function(statuInput){
      statuInput.setAttribute('readonly', true);
      statuInput.classList.remove('editable');
    });
  }
  else{
    editTaxBtn.innerText = "Save";
    incomeTaxInput.removeAttribute('readonly');
    incomeTaxInput.classList.add('editable');
    statutoryTaxInput.forEach(function(statuInput){
      statuInput.removeAttribute('readonly');
      statuInput.classList.add('editable');
    });
  }
  editTax = !editTax;
});

let editRate = false;
editRateBtn.addEventListener('click', function(){
  if(editRate){
    editRateBtn.innerText = "Edit";
    hourlyRateInput.forEach(function(hourlyRate){
      hourlyRate.setAttribute('readonly', true);
      hourlyRate.classList.remove('editable');
    });
  }
  else{
    editRateBtn.innerText = "Save";
    hourlyRateInput.forEach(function(hourlyRate){
      hourlyRate.removeAttribute('readonly');
      hourlyRate.classList.add('editable');
    });
  }
  editRate = !editRate;
});