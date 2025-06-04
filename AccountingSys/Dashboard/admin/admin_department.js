document.addEventListener('DOMContentLoaded', function(){

  document.getElementById('logout-icon').addEventListener('click', function () {
    window.location.href = "../../Login/logout.php";
  });
  
  document.getElementById('dashboard-tab').addEventListener('click', function () {
    window.location.href = "admin_dashboard.php";
  });
  
  document.getElementById('employee-tab').addEventListener('click', function () {
    window.location.href = "admin_employee.php";
  });
  
  document.getElementById('payroll-tab').addEventListener('click', function () {
    window.location.href = "admin_payroll.php";
  });
  
  document.getElementById('attendance-tab').addEventListener('click', function () {
    window.location.href = "admin_attendance.php";
  });
  
  
  const deleteBtn = document.querySelectorAll('.delete-dept');
  deleteBtn.forEach(function(delBtn){
    delBtn.addEventListener('click', function(){
      const deleteId = delBtn.dataset.id;
      const deleteName = delBtn.dataset.name;
      const confirmDel = confirm("Are you sure to delete " + deleteName + "?");
      if(confirmDel){
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_dept.php", true);
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
        const data = "id=" + encodeURIComponent(deleteId);
        xhr.send(data);
      }
    });
  });
  const addDeptForm = document.getElementById('add-ol-form');
  const saveDeptBtn = document.getElementById('save-add-btn');
  const addDeptBtn = document.getElementById('add-dept-btn');
  const addOl = document.getElementById('add-ol');
  
  addDeptBtn.addEventListener('click', function(){
    addOl.classList.add('show');
    addOl.addEventListener('click', function(event){
      if(event.target === addOl){
        addOl.classList.remove('show');
      }
    });
    
  });
  
  saveDeptBtn.addEventListener('click', function(){
    if(addDeptForm.checkValidity()){
      const formData = new FormData(addDeptForm);
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "save_dept.php", true);
      xhr.onload = function(){
        if(xhr.status === 200){
          alert(xhr.responseText);
          setTimeout(function(){
            location.reload();
          }, 100);
        }
        else{
          alert(xhr.responseText);
        }
      }
      xhr.send(formData);
    }
    else{
      addDeptForm.reportValidity();
    }
  })

});