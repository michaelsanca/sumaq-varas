let menuVisible = false;

function mostrarOcultarMenu() {
    const ul = document.querySelector(".contenedor-header header nav ul");
    ul.classList.toggle("responsive");
    menuVisible = !menuVisible;
}

function seleccionar() {
    document.querySelector(".contenedor-header header nav ul").classList.remove("responsive");
    menuVisible = false;
}

