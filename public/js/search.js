//リアルタイム検索
const area = document.getElementById('area');
const genre = document.getElementById('genre');
const heart = document.getElementById('heart');

area.onchange = function () {
  document.searchform.submit();
}

genre.onchange = function () {
  document.searchform.submit();
}


// heart.addEventListener('click', function (event) {
//   event.preventDefault();
//   heart.classList.toggle('text-danger');
// })