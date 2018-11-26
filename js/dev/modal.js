//Ventana Modal

// Funciones necesarias

// Añadir un objeto de atributos a un elemento
const addAttributes = (element, attrObj) => {
	for (let attr in attrObj) {
		if (attrObj.hasOwnProperty(attr)) element.setAttribute(attr, attrObj[attr])
	}
};

// Crear elementos con atributos e hijo
const createCustomElement = (element, attributes, children) => {
	let customElement = document.createElement(element);
	if (children !== undefined) children.forEach(el => {
		if (el.nodeType) {
			if (el.nodeType === 1 || el.nodeType === 11) customElement.appendChild(el);
		} else {
			customElement.innerHTML += el;
		}
	});
	addAttributes(customElement, attributes);
	return customElement;
};

// Imprimir modal

//Obtenemos cada modal

const modal1 = document.getElementById('modal1');
const modal2 = document.getElementById('modal2');
const modal3 = document.getElementById('modal3');

//content es el parametro que recibe la funcion. En el meteremos el contenido del modal en si que va dentro del div modalContentEl
const printModal = content => {
	//Crea contenedor interno
	const modalContentEl = createCustomElement('div', {
		id: 'content-modal',
		class: 'c-modal-item'
	}, [content])
	// crea contenedor principal
	const modalContainerEl = createCustomElement('div', {
		id: 'container-modal',
		class: 'c-modal'
	}, [modalContentEl])

	// Imprimir el modal
	document.body.appendChild(modalContainerEl)

	//Remover el modal
	const removeModal = () => document.body.removeChild(modalContainerEl)

	// Evento que ejecuta la funcion que remueve el modal

	modalContainerEl.addEventListener('click', e => {
		if (e.target === modalContainerEl) removeModal()
	})
}

//Contenido de cada modal
const contModal1 = `
  <div class="grid-modal">
    <header>
      <h2>
        Ecosistema
      </h2>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/globo.svg" alt="">
    </header>
    <p>Diseñamos y ejecutamos programas que aceleran ecosistemas de emprendimiento e innovación. Participamos en las etapas iniciales de definiciones estratégicas para el desarrollo de cada ecosistema y realizamos acciones de fortalecimiento y medición de su impacto.</p>
    <p>Trabajamos en red, sumando a organizaciones especialistas en cada área, complementando nuestras capacidades y nuestro método, ampliando asi nuestra cobertura.</p>
    <p>Convocando a los actores claves, facilitamos el trabajo colaborativo entre los componentes de cada ecosistema. Nos mantenemos actualizados, gracias a la revisión permanente y estudio de nuevas metodologías y lecciones de referencia.</p>
    <p>Apoyamos a organizaciones gubernamentales, universidades, gremios y empresas que asumen el desafío de innovar. En nuestro andar, hemos apoyado al desarrollo de diversos ecosistemas universitarios, atendiéndolos desde sus particularidades y las características de su entorno, creando e implementando diversos planes para potenciar sus capacidades de innovación y emprendimiento. Hemos acompañado también a gremios empresariales en su rol promotor del ecosistema.</p>
    <section>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos1.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos1.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos1.jpg" alt="">
    </section>
  </div>`;

const contModal2 = `
  <div class="grid-modal">
    <header>
      <h2>
        Empresa
      </h2>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/grafico.svg" alt="">
    </header>
    <p>Asistimos la incorporación de técnicas de gestión de la innovación y manejamos portafolios de innovación empresarial. Nuestros servicios apoyan los diseños estratégicos, así como la habilitación de técnicas de administración y cambios en la cultura de la innovación. Además, potenciamos las iniciativas innovadoras a través de asesorías, añadiendo de igual forma la mirada de portafolio y las técnicas de gestión de este tipo de carteras de proyectos.</p>
    <p>Vinculamos a las empresas con emprendimientos, fuentes de conocimiento como Universidades y Centros de Investigación, de manera de sumar estas capacidades técnicas a las demandas de cada iniciativa.</p>
    <p>Apoyamos en la búsqueda de financiamiento público y privado, brindamos métodos y conexiones para que las empresas puedan validar sus iniciativas y posicionarlas en el mercado, sin necesidad de descuidar su día a día.</p>
    <section>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos2.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos2.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos2.jpg" alt="">
    </section>
  </div>`;

  const contModal3 = `
  <div class="grid-modal">
    <header>
      <h2>
        Innovación Abierta
      </h2>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/avion.svg" alt="">
    </header>
    <p>Estamos en sintonía con la vanguardia de las nuevas técnicas y metodologías en gestión de la Innovación. Es así que uno de nuestros objetivos como empresa es generar nuevos lazos y componentes para las dinámicas del innovar.</p>
    <p>En la Innovación abierta las empresas, a través de la declaración de sus desafíos, interactúan y realizan trabajo colaborativo con su entorno, aprovechando así las capacidades allí contenidas, tales como emprendedores, científicos, centros de desarrollo de conocimientos, universitarios y Pymes.</p>
    <p>Este modelos de gestión ofrece a las empresas ahorros en los esfuerzos de innovación, fortalece las redes del ecosistema territorial y a su vez propicia relaciones sostenibles con sus colaboradores.</p>
    <p>Creamos y ejecutamos programas de Innovación Abierta. Trabajamos con las empresas, desde la detección y definición de sus desafíos, apoyándoles en las etapas de búsqueda y selección de solucionadores. Capacitamos a empresas y a solucionadores para fortalecer y hacer más efectiva su vinculación.</p>
    <p>Hemos creado nuestros propios métodos, acumulando amplia experiencia a través de los programas que hemos realizado con diversas empresas e industrias en distintos territorios de Chile y Latinoamérica.</p>
    <section>
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos3.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos3.jpg" alt="">
      <img src="http://localhost:8080/Quintil/wp-content/themes/quintil/img/hacemos3.jpg" alt="">
    </section>
  </div>`;



//Ejecución de cada modal (esto se puede mejorar con un array de elementos)

// for (let n = 0; n < itemLink.length; n++) {
// 	itemLink[n].addEventListener('click', showHideMenu)
// 	// 	itemLink[n].addEventListener('click', hideHeader)
// }

modal1.addEventListener('click', () => {
	printModal(`${contModal1}`)
})

modal2.addEventListener('click', () => {
	printModal(`${contModal2}`)
})

modal3.addEventListener('click', () => {
	printModal(`${contModal3}`)
})
