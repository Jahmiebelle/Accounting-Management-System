function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}

const login_btn = document.getElementById('login-btn');
const companyIDBox = document.getElementById('lgn-company-id');
const passwordBox = document.getElementById('lgn-password');
const lgnError = document.getElementById('lgn-error');
const otpOverlay = document.getElementById('otp-overlay');
const resetForm = document.getElementById('forgotPassForm');
const verify_btn = document.getElementById('verify-btn');

const inputs = document.querySelectorAll(".otp-input");
inputs.forEach((input, index) => {
  input.addEventListener("input", () => {
    input.value = input.value.replace(/[^0-9]/g, "");
    if (input.value && index < inputs.length - 1) inputs[index + 1].focus();
  });
  input.addEventListener("keydown", (e) => {
    if (e.key === "Backspace" && !input.value && index > 0) inputs[index - 1].focus(); 
  });
});

function getOTP() {
  return Array.from(inputs).map(input => input.value).join("");
}

document.body.addEventListener("keyup", (e) => {
  if (e.key === "Enter") alert("OTP Entered: " + getOTP());
});

verify_btn.addEventListener("click", function (e) {
  e.preventDefault();

  let companyID = document.getElementById("company-id").value.trim();
  let email = document.getElementById("email").value.trim();

  fetch("check_credentials.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "company_id=" + encodeURIComponent(companyID) + "&email=" + encodeURIComponent(email)
  })
  .then(response => response.text())
  .then(data => {
    data = data.trim(); 
    if (data === "success") {
      openOtpOverlay();
      document.getElementById("email_receiver").innerText = email;
    } else {
      let error = document.getElementById("recovery-error");
      error.style.display = "flex";
      error.style.opacity = 1;
    }
  });
});


function openOtpOverlay(){
  otpOverlay.classList.add('show');
  const overlayClose =  document.getElementById('close-overlay-btn');
  overlayClose.addEventListener('click', function(){
    otpOverlay.classList.remove('show');
  })
}

login_btn.addEventListener('click', function(){
  const companyID = companyIDBox.value.trim();
  const password = passwordBox.value.trim();
  companyIDBox.style.border = "";
  passwordBox.style.border = "";
  if (!companyID || !password) {
    lgnError.innerText = "Missing Credentials.";
    lgnError.style.display = "flex";
    lgnError.style.opacity = 1;
    if (!companyID) companyIDBox.style.border = "0.75px solid red";
    if (!password) passwordBox.style.border = "0.75px solid red";
  }
});
