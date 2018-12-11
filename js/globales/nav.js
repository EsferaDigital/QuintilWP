;
$ = jQuery.noConflict();

const btnMenu = document.getElementById('toggleMenu');
const mainMenu = document.getElementById('mainMenu');

function showHide(){
  if(!mainMenu.classList.contains('show-menu')){
    mainMenu.classList.add('show-menu');
  }else{
    mainMenu.classList.remove('show-menu');
  }
}

btnMenu.addEventListener('click', showHide);
