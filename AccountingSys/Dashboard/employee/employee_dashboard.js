function show_sidebar(){
 document.querySelector('.sidebar').classList.toggle('expand'); 
 document.querySelector('.hamburger-menu').classList.toggle('move');
 document.querySelector('.overlay').classList.toggle('active');
 document.querySelectorAll('span').forEach(span => {
   span.classList.toggle('change-color');
 });
 
}