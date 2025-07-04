document.addEventListener('DOMContentLoaded', function(){
  
  document.getElementById('new-logout-icon').addEventListener('click', function () {
    window.location.href = "../../Login/logout.php";
  });
  
  document.getElementById('dashboard-tab').addEventListener('click', function () {
    window.location.href = "admin_dashboard.php";
  });
  
  document.getElementById('department-tab').addEventListener('click', function () {
    window.location.href = "admin_department.php";
  });
  
  document.getElementById('payroll-tab').addEventListener('click', function () {
    window.location.href = "admin_payroll.php";
  });
  
  document.getElementById('attendance-tab').addEventListener('click', function () {
    window.location.href = "admin_attendance.php";
  });
  if(document.getElementById('emp-table-data')){
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
        let is_active = button.dataset.active;
        let accstatus = is_active === "1" ? "Deactivate" : "Reactivate";
        const imagePath = button.dataset.image;
        
        document.getElementById('deac-btn').addEventListener('click', function(){
          let confirmed = confirm("Are you sure you want to " + accstatus + " this account?");
          if(confirmed){
            is_active = is_active === "1" ? "0" : "1";
            accstatus = is_active === "1" ? "Deactivate" : "Reactivate";
            document.getElementById('deac-btn').innerText = accstatus + " Account";
            document.getElementById('deac-btn').value = is_active === "1" ? "1" : "0";
          }
        });
      
        document.getElementById('upf-upper-name').innerText = fn + " " + ln;
        document.getElementById('upf-upper-dept').innerText = dept;
        const deptIdName = (dept.toLowerCase()).replace(/\s+/g, '');
        let imageContainer = document.getElementById('upf-upper-profile');
        imageContainer.style.backgroundImage = "url('" + imagePath + "')";
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
        document.getElementById('deac-btn').value = is_active;
        document.getElementById('deac-btn').innerText = accstatus + " Account";
        
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
      let is_active = document.getElementById('deac-btn').value;
      
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
      const data = "cid=" + encodeURIComponent(cid) + "&id=" + encodeURIComponent(id) + "&fn=" + encodeURIComponent(fn) + "&ln=" + encodeURIComponent(ln) + "&gender=" + encodeURIComponent(gender) + "&birthdate=" + encodeURIComponent(birthdate) + "&joindate=" + encodeURIComponent(joindate) + "&dept=" + encodeURIComponent(dept) + "&position=" + encodeURIComponent(position) + "&emptype=" + encodeURIComponent(emptype) + "&status=" + encodeURIComponent(status) + "&bank=" + encodeURIComponent(bank) + "&sss=" + encodeURIComponent(sss) + "&philhealth=" + encodeURIComponent(philhealth) + "&pagibig=" + encodeURIComponent(pagibig) + "&email=" + encodeURIComponent(email) + "&contact=" + encodeURIComponent(contact) + "&is_active=" + encodeURIComponent(is_active);
      
      xhr.send(data);
    
    }
    
    save_btn.addEventListener('click', function(){
      let confirmed = confirm("Do you want to save changes?");
      if (confirmed) {
        saveEmpData();
      }
    });
    
    edit_btn.addEventListener('click', function(){
      save_btn.classList.toggle('enable');
      const inputbox = document.querySelectorAll('.inputboxes');
      const dropdown_box = document.querySelectorAll('.dropdown-boxes');
      
      if(edit){
        inputbox.forEach(function(input){
          input.classList.add('editable');
          input.removeAttribute('readonly');
        });
        dropdown_box.forEach(function(downBox){
          downBox.classList.add('editable');
          downBox.removeAttribute('disabled');
        });
        edit_btn.innerText = "Cancel";
        
      }
      else {
        
        inputbox.forEach(function(input){
          input.classList.remove('editable');
          input.setAttribute('readonly', true);
        });
        dropdown_box.forEach(function(downBox){
          downBox.classList.remove('editable');
          downBox.setAttribute('disabled', true);
        });
        edit_btn.innerText = "Edit";
      
      }
      edit = !edit;
    });
  }
  
  
  
  const addEmpBtn = document.getElementById('add-emp-btn');
  const addOl = document.getElementById('add-ol');
  addEmpBtn.addEventListener('click', function(){
    addOl.classList.add('show');
    
    addOl.addEventListener('click', function(e){
      if(e.target === addOl){
        addOl.classList.remove('show');
      }
    })
  });
  
  
  const showPassIcon = document.getElementById('show-pass-icon');
  const passbox = document.getElementById('add-password');
  showPassIcon.addEventListener('click', function(){
    passbox.type = passbox.type === "password" ? "text" : "password";
    showPassIcon.classList.toggle('show');
  });
  
  
  const saveAddBtn = document.getElementById('save-add-btn');
  
  saveAddBtn.addEventListener('click', function(){
    const form = document.getElementById('add-ol-form');
    if(form.checkValidity()){
      const formData = new FormData(form);
      
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "checkAddEmp.php", true);
      xhr.onload = function () {
        if (xhr.status === 200) {
          alert(xhr.responseText);
          setTimeout(function(){
            location.reload();
          }, 100);
        }
        else {
          alert(xhr.responseText);
        }
      }
      
      xhr.send(formData);
    }
    else{
      form.reportValidity();
    }
  });
  
  const deptCheckbox = document.querySelectorAll('.dept-checkboxes');
  const filterOverlay = document.getElementById('filter_overlay');
  const selectAll = document.getElementById('select-all');
  const deselectAll = document.getElementById('deselect-all');
  const outerContainer = document.getElementById('outer-container');
  const filterBy = document.querySelector('.filter-by');
  
  const stopProp = function(event){
    event.stopPropagation();
  }
  
  filterOverlay.addEventListener('click', stopProp);
  
  filterOverlay.querySelectorAll('*').forEach(function(child){
    child.addEventListener('click', stopProp);
  });
  
  selectAll.removeEventListener('click', stopProp);
  deselectAll.removeEventListener('click', stopProp);
  
  let showOption = false;
  filterBy.addEventListener('click', function(event) {
    event.stopPropagation();
      filterBy.classList.toggle('show');
      filterOverlay.classList.toggle('show');
      showOption = !showOption;
  });
  
  
  outerContainer.addEventListener('click', function(event){
        if(showOption && !filterOverlay.contains(event.target) && !filterBy.contains(event.target)){
          filterOverlay.classList.toggle('show');
          filterBy.classList.toggle('show');
          
        }
        showOption = false;
    });
  
  selectAll.addEventListener('click', function(event){
    event.stopPropagation();
    selectAll.classList.add('select');
    deselectAll.classList.remove('select');
    deptCheckbox.forEach(function(deptbox){
      deptbox.checked = true;
    });
  });

  
  deselectAll.addEventListener('click', function(event) {
    event.stopPropagation();
    selectAll.classList.remove('select');
    deselectAll.classList.add('select');
    deptCheckbox.forEach(function(deptbox){
      deptbox.checked = false;
    });
  });
  
  document.getElementById('search_employee').addEventListener('keydown', function(e){
    if(e.key === "Enter"){
      e.preventDefault();
    }
  });

});

