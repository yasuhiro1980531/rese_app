const date = document.getElementById('date');
const time = document.getElementById('time');
const num = document.getElementById('num');

date.addEventListener('change', function (event) {
  event.preventDefault();
  const reserveDate = document.getElementById('reserveDate');
  reserveDate.innerText = date.value;
});

time.addEventListener('change', function (event) {
  event.preventDefault();
  const reserveTime = document.getElementById('reserveTime');
  reserveTime.innerText = time.value;
});

num.addEventListener('change', function (event) {
  event.preventDefault();
  const reserveNum = document.getElementById('reserveNum');
  reserveNum.innerText = num.value + '人';
});
