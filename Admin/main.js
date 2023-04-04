const header = document.querySelector('.header');
const hv_menu = document.querySelector ('.hv_menu');
const conten = document.querySelector ('.conten');

hv_menu.onclick = function (){
  header.classList.toggle('hide');
  conten.classList.toggle('expand');
}
