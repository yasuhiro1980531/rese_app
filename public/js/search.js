//リアルタイム検索
const area = document.getElementById('area');
const genre = document.getElementById('genre');
const heart = document.querySelector('#heart');

area.addEventListener('change', function (event) {
event.preventDefault();
console.log(area.value);
});

genre.addEventListener('change', function (event) {
event.preventDefault();
console.log(genre.value);
});

heart.addEventListener('click', function () {
  heart.classList.toggle('text-danger');
})