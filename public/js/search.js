const area = document.getElementById('area');
const genre = document.getElementById('genre');

area.onchange = function () {
  document.searchform.submit();
}

genre.onchange = function () {
  document.searchform.submit();
}
