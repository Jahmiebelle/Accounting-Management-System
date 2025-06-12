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

const payslipBtn = document.querySelectorAll('.payslip-btn');
const payslipOl = document.getElementById('payslip-ol');
const payslip_content = document.getElementById('payslip-ol-content');

payslipBtn.forEach(function(payslipButton){
  payslipButton.addEventListener('click', function(){
    payslipOl.classList.add('show');
    payslip_content.scrollTop = 0;
    const payrollId = payslipButton.dataset.pid;
    const id = payslipButton.dataset.id;
    const fullName = payslipButton.dataset.fn;
    const monthName = payslipButton.dataset.month;
    const basicSalary = payslipButton.dataset.basic;
    const overtimePay = payslipButton.dataset.overtime;
    const grossPay = payslipButton.dataset.gross;
    const incomeTax = payslipButton.dataset.incometax;
    const sssTax = payslipButton.dataset.sss;
    const philhealthTax = payslipButton.dataset.philhealth;
    const pagibigTax = payslipButton.dataset.pagibig;
    const totalDeduction = payslipButton.dataset.totaldeduct;
    const netPay = payslipButton.dataset.netpay;
    const status = payslipButton.dataset.completed;
    
    document.getElementById('payroll-id-jar').innerHTML = payrollId;
    document.getElementById('id-jar').innerHTML = id;
    document.getElementById('name-jar').innerHTML = fullName;
    document.getElementById('month-jar').innerHTML = monthName;
    document.getElementById('salary-jar').innerHTML = basicSalary;
    document.getElementById('overtime-jar').innerHTML = overtimePay;
    document.getElementById('gross-jar').innerHTML = grossPay;
    document.getElementById('sss-jar').innerHTML = sssTax;
    document.getElementById('philhealth-jar').innerHTML = philhealthTax;
    document.getElementById('pagibig-jar').innerHTML = pagibigTax;
    document.getElementById('income-tax-jar').innerHTML = incomeTax;
    document.getElementById('total-deduct-jar').innerHTML = totalDeduction;
    document.getElementById('net-pay-jar').innerHTML = netPay;
    document.getElementById('status-jar').innerHTML = status;
    if(status == "pending"){
      document.getElementById('status-jar').classList.add('pending');
    }
    else{
      document.getElementById('status-jar').classList.remove('pending');
    }
    
  });
});
payslipOl.addEventListener('click', function(e){
    if(e.target == payslipOl){
      payslipOl.classList.remove('show');
    }
});


const { jsPDF } = window.jspdf;

document.getElementById('download-payslip-btn').addEventListener('click', function (event) {
  event.preventDefault();
  const payslip = document.getElementById('payslip-ol-content');
  const button = document.getElementById('download-payslip-btn');

  button.style.display = 'none';

  html2canvas(payslip, { scale: 2 }).then(canvas => {
    const imgData = canvas.toDataURL('image/png');
    const pdf = new jsPDF({
      orientation: 'portrait',
      unit: 'px',
      format: 'a4'
    });

    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();

    const imgWidth = canvas.width;
    const imgHeight = canvas.height;
    const scaleRatio = Math.min(pageWidth / imgWidth, pageHeight / imgHeight);
    const x = (pageWidth - imgWidth * scaleRatio) / 2;
    const y = 20;

    pdf.addImage(imgData, 'PNG', x, y, imgWidth * scaleRatio, imgHeight * scaleRatio);
    pdf.save('payslip.pdf');

    button.style.display = 'inline-block';
  });
});

