document.addEventListener('DOMContentLoaded', () => {

    //COMPORTAMIENTO DE LOS MODALES//
    const modalCrear = document.querySelector('.modal-createusuario');
    const botonAbrirCrear = document.querySelector('.abrir-modal-user');
    const botonCerrarCrear = document.querySelector('.cerrar-modal-user');

    if (botonAbrirCrear) {
        botonAbrirCrear.addEventListener('click', (e) => {
            e.preventDefault();
            modalCrear.classList.add('abrir-modal-usuario');
        });
    }

    if (botonCerrarCrear) {
        botonCerrarCrear.addEventListener('click', (e) => {
            e.preventDefault();
            modalCrear.classList.remove('abrir-modal-usuario');
        });
    }

});