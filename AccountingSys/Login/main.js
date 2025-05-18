document.getElementById('loginForm').onsubmit = function(event){
  event.preventDefault();
}

function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}



document.getElementById('login-btn').addEventListener('click', function(){
  const company_Id = document.getElementById('lgn-company-id').value;
  const password = document.getElementById('lgn-password').value;
  const role = document.getElementById('position').value;
  if(parseInt(company_Id) === 1234 && password === 'gabby'){
    window.location.href = "../Dashboard/admin/admin_dashboard.php";
  }
  else{
    alert("Invalid Credentials!! "+ role);
  }
  
});
