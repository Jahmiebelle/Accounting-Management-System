function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}
<<<<<<< HEAD
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


=======

const login_btn = document.getElementById('login-btn');
const companyIDBox = document.getElementById('lgn-company-id');
const passwordBox = document.getElementById('lgn-password');

login_btn.addEventListener('click', function (e) {
  const companyID = companyIDBox.value.trim();
  const password = passwordBox.value.trim();

  companyIDBox.style.border = "";
  passwordBox.style.border = "";

  if (companyID === "") {
    companyIDBox.style.border = "0.75px solid red";
  }

  if (password === "") {
    passwordBox.style.border = "0.75px solid red";
  }

});

>>>>>>> 7dad1cf84880e15024155ff2f3c38f6214181710
