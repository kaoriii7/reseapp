const inputDate = document.getElementById('date_id');
const outputDate = document.getElementById('output_date');
const inputTime = document.getElementById('time_id');
const outputTime = document.getElementById('output_time');
const inputNumber = document.getElementById('person_id');
const outputNumber = document.getElementById('output_num');

inputDate.addEventListener('input', updateDate);
inputTime.addEventListener('input', updateTime);
inputNumber.addEventListener('input', updateNumber);

function updateDate(e) {
  outputDate.textContent = e.target.value;
}
function updateTime(e) {
  outputTime.textContent = e.target.value;
}
function updateNumber(e) {
  outputNumber.textContent = e.target.value;
}
