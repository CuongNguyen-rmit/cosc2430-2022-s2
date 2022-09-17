window.onload = setInterval(currentDateTime, 1);

if (localStorage.getItem('last') != undefined) {
    document.getElementById("latest-vist").innerHTML = 'your last visit is: ' + localStorage.getItem('last');
    localStorage.getItem('last') = new Date();
} else {
    document.getElementById("latest-vist").innerHTML = 'This is your first visit';
    localStorage.setItem('last', new Date())  ;
}
function currentDateTime() {
  let date = new Date(); // current date
  let displayDate = date.getDate();
  let dislayMonth = date.getMonth() + 1;
  let displayYear = date.getFullYear();
  let displayHour = date.getHours();
  let displayMin = date.getMinutes();
  let displaySec = date.getSeconds();
  let message = date;
  document.getElementById("current-date").innerHTML = date;
}
