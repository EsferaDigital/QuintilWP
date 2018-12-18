;
const formulario = document.formulario;
const enviar = document.getElementById('enviar');
//formulario.elements toma todos los input del formulario
const body = document.getElementById('body');
const modalErrores = document.createElement('div');
modalErrores.classList.add('modal-errores');

console.log('carga este script');

let numero = 30;

function validar(e) {
	let errores = '';
	if(formulario.name.value == 0){
		e.preventDefault();
		errores += '<p>Escriba un nombre</p>';
  }
  if(formulario.company.value == 0){
    e.preventDefault();
    errores += '<p>Ingrese una Empresa</p>'
  }
  if(formulario.email.value == 0){
    e.preventDefault();
    errores += '<p>Ingrese una E-mail</p>'
  }
  if(formulario.message.value == 0){
    e.preventDefault();
    errores += '<p>Escriba un mensaje</p>'
  }
  if(errores == '' == false){
    let mensajeErrores = `
      <div class="modal-errores-content">
       <h3>Error</h3>
        ${errores}
        <span id="btnClose">Cerrar</span>
      </div>
    `
    modalErrores.innerHTML = mensajeErrores;
    body.appendChild(modalErrores);
  }
  document.getElementById('btnClose').addEventListener('click', () =>{
    body.removeChild(modalErrores);
  });
}

enviar.addEventListener('click', validar);
