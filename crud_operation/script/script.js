// get the dom content
const search = document.querySelector('#search');
const searchButton = document.querySelector('#cta_search');
const dataTable = document.querySelector('#data_table');
const searchCategory = document.querySelector('#search_category');

search.addEventListener('keyup', function () {
  // initiate ajax object
  let xhr = new XMLHttpRequest();

  // check ajax readyness
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      dataTable.innerHTML = xhr.responseText;
    }
  };

  xhr.open('GET', '../ajax/datatable.php?keyword=' + search.value + '&category=' + searchCategory.value, true);
  xhr.send();
});
