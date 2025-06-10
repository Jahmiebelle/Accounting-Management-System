const daysOfWeek = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
const calendar = document.getElementById('calendar');


daysOfWeek.forEach(day => {
    const dayElem = document.createElement('div');
    dayElem.textContent = day;
    dayElem.classList.add('day-name');
    calendar.appendChild(dayElem);
});

const daysInMonth = 30; 
const firstDay = new Date(2025, 5, 1).getDay(); 


for (let i = 0; i < firstDay; i++) {
    const empty = document.createElement('div');
    calendar.appendChild(empty);
}


for (let i = 1; i <= daysInMonth; i++) {
    const day = document.createElement('div');
    day.textContent = i;
    calendar.appendChild(day);
}