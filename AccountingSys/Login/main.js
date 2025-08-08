function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}
const companyBox = document.getElementById('lgn-company-id');
const passBox = document.getElementById('lgn-password');
const loginBtn = document.getElementById('login-btn');

const cidValue = companyBox.value;
const passValue = passBox.value;

companyBox.style.border = "";
passBox.style.border = "";

loginBtn.addEventListener('click', function(){
  companyBox.style.border = "";
  passBox.style.border = "";

  if(cidValue === ""){ 
    companyBox.style.border = "solid red 0.25px";
  }
 
  if(passValue === ""){
    passBox.style.border = "solid red 0.25px";
  }
  
});


