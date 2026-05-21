//MOSTRAR HORA EN TIEMPO REAL DEL INPUT DATETIME//
function actualizarFechaHora() {
    const ahora = new Date();
    const año = ahora.getFullYear();
    const mes = String(ahora.getMonth() + 1).padStart(2, '0');
    const dia = String(ahora.getDate()).padStart(2, '0');
    const horas = String(ahora.getHours()).padStart(2, '0');
    const minutos = String(ahora.getMinutes()).padStart(2, '0');

    const formato = `${año}-${mes}-${dia}T${horas}:${minutos}`;

    document.getElementById('fecha-hora').value = formato;
}
setInterval(actualizarFechaHora, 1000);
//FUNCIONAMIENTO DEL MODAL//
const modal = document.querySelector('.modal-content');
const botonAbrir = document.querySelector('.abrir');
const botonCerrar = document.querySelector('.cerrar');

botonAbrir.addEventListener('click', (e) => {
    e.preventDefault();
    modal.classList.add('activar');
});

botonCerrar.addEventListener('click', (e) => {
    e.preventDefault(); 
    modal.classList.remove('activar');
});