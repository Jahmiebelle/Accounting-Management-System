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
editTaxBtn.addEventListener('click', function(e){
  if(editTax){
    editTaxBtn.innerText = "Edit";
    //editTaxBtn.setAttribute("type", "button");
    incomeTaxInput.setAttribute('readonly', true);
    incomeTaxInput.classList.remove('editable');
    statutoryTaxInput.forEach(function(statuInput){
      statuInput.setAttribute('readonly', true);
      statuInput.classList.remove('editable');
    });
  }
  else{
    e.preventDefault();
    editTaxBtn.innerText = "Save";
    editTaxBtn.setAttribute("type", "submit");
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
editRateBtn.addEventListener('click', function(e){
  if(editRate){
    editRateBtn.innerText = "Edit";
    //editRateBtn.setAttribute("type", "button");
    hourlyRateInput.forEach(function(hourlyRate){
      hourlyRate.setAttribute('readonly', true);
      hourlyRate.classList.remove('editable');
    });
  }
  else{
    e.preventDefault();
    editRateBtn.innerText = "Save";
    editRateBtn.setAttribute("type", "submit");
    hourlyRateInput.forEach(function(hourlyRate){
      hourlyRate.removeAttribute('readonly');
      hourlyRate.classList.add('editable');
    });
  }
  editRate = !editRate;
});

const payslipBtn = document.getElementById('payslip-btn');
const payslipOl = document.getElementById('payslip-ol');
payslipBtn.addEventListener('click', function(){
  payslipOl.classList.add('show');
  payslipOl.addEventListener('click', function(e){
    if(e.target == payslipOl){
      payslipOl.classList.remove('show');
    }
  })
});
