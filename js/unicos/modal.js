const modal1 = document.getElementById('modal1');
const open1 = document.getElementById('open1');
const close1 = document.getElementById('close1')

open1.addEventListener('click', () => {
  modal1.classList.toggle('zoom-in');
  modal1.classList.remove('zoom-out');
});

close1.addEventListener('click', () => {
  modal1.classList.replace('zoom-in', 'zoom-out');
});

const modal2 = document.getElementById('modal2');
const open2 = document.getElementById('open2');
const close2 = document.getElementById('close2')


open2.addEventListener('click', () => {
  modal2.classList.toggle('zoom-in');
  modal2.classList.remove('zoom-out');
});

close2.addEventListener('click', () => {
  modal2.classList.replace('zoom-in', 'zoom-out');
});

const modal3 = document.getElementById('modal3');
const open3 = document.getElementById('open3');
const close3 = document.getElementById('close3')


open3.addEventListener('click', () => {
  modal3.classList.toggle('zoom-in');
  modal3.classList.remove('zoom-out');
});

close3.addEventListener('click', () => {
  modal3.classList.replace('zoom-in', 'zoom-out');
});
