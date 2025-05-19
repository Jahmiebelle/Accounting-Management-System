document.getElementById('loginForm').onsubmit = function(event){
  event.preventDefault();
}

function showForgot(){
  document.querySelector('.forgotPass-form').classList.toggle('show');
  document.querySelector('.login-form').classList.toggle('hide');
}
