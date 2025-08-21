function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}

const login_btn = document.getElementById('login-btn');
const verify_btn = document.getElementById('verify-btn');
const companyIDBox = document.getElementById('lgn-company-id');
const passwordBox = document.getElementById('lgn-password');
const lgnError = document.getElementById('lgn-error');

verify_btn.addEventListener('click', function(e){
  e.preventDefault();

});

function otpOverlay(){

}

login_btn.addEventListener('click', function (e) {
  const companyID = companyIDBox.value.trim();
  const password = passwordBox.value.trim();

  companyIDBox.style.border = "";
  passwordBox.style.border = "";

  if (companyID === "") {
    lgnError.innerText = "Missing Credentials.";
    lgnError.style.display = "flex";
    lgnError.style.opacity = 1;
    companyIDBox.style.border = "0.75px solid red";
  }

  if (password === "") {
    lgnError.innerText = "Missing Credentials.";
    lgnError.style.display = "flex";
    lgnError.style.opacity = 1;
    passwordBox.style.border = "0.75px solid red";
  }

});

