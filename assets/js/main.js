// assets/js/main.js
console.log("Sistema Web SC: JavaScript cargado correctamente");


function abrirModal() {
    document.getElementById('login-modal').classList.add('mostrar');
}

function cerrarModal() {
    document.getElementById('login-modal').classList.remove('mostrar');
}