document.addEventListener("DOMContentLoaded", function () {
    const titulo = document.getElementById("titulo");
    const contenidoPrincipal = document.getElementById("contenido-principal");
    const inicio = document.getElementById("inicio");
    const acerca = document.getElementById("acerca");
    const servicios = document.getElementById("servicios");
    const contacto = document.getElementById("contacto");

    inicio.addEventListener("click", function () {
        titulo.textContent = "Bienvenido a la página de inicio";
        contenidoPrincipal.innerHTML = "<h2>Contenido de la página de inicio</h2><p>Este es el contenido de la página de inicio.</p>";
    });

    acerca.addEventListener("click", function () {
        titulo.textContent = "Acerca de nuestra empresa";
        contenidoPrincipal.innerHTML = "<h2>Acerca de nosotros</h2><p>Somos una empresa comprometida con la calidad y la excelencia.</p>";
    });

    servicios.addEventListener("click", function () {
        titulo.textContent = "Nuestros Servicios";
        contenidoPrincipal.innerHTML = "<h2>Nuestros Servicios</h2><p>Ofrecemos una amplia gama de servicios para satisfacer tus necesidades.</p>";
    });

    contacto.addEventListener("click", function () {
        titulo.textContent = "Contacto";
        contenidoPrincipal.innerHTML = "<h2>Contáctanos</h2><p>Estamos disponibles para responder a tus preguntas y comentarios.</p>";
    });
});
const openModalButton = document.getElementById("openModalButton");
const modal = document.getElementById("myModal");
const closeModal = document.getElementById("closeModal");

// Abre la ventana emergente al hacer clic en el botón
openModalButton.addEventListener("click", function () {
    modal.style.display = "block";
});

// Cierra la ventana emergente al hacer clic en el botón de cerrar (x)
closeModal.addEventListener("click", function () {
    modal.style.display = "none";
});

// Cierra la ventana emergente si el usuario hace clic fuera de ella
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
});
