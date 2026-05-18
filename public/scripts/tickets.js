function actualizarFechaHora() {

    const ahora = new Date();

    const año = ahora.getFullYear();
    const mes = String(ahora.getMonth() + 1).padStart(2, '0');
    const dia = String(ahora.getDate()).padStart(2, '0');

    const horas = String(ahora.getHours()).padStart(2, '0');
    const minutos = String(ahora.getMinutes()).padStart(2, '0');

    const formato = `${año}-${mes}-${dia}T${horas}:${minutos}`;

    const fecha1 = document.getElementById('fechahora1');
    const fecha2 = document.getElementById('fechahora2');

    if (fecha1) {
        fecha1.value = formato;
    }

    if (fecha2) {
        fecha2.value = formato;
    }
}

actualizarFechaHora();


// MODAL CREAR TICKET

const modal1 = document.querySelector('.modal-content');

const botonAbrir1 = document.querySelector('.btn-create-ticket');

const botonCerrar1 = document.querySelector('.btn-create-ticket-close');

botonAbrir1.addEventListener('click', (e) => {

    e.preventDefault();

    modal1.classList.add('form-ticket-openmodal');

});

botonCerrar1.addEventListener('click', (e) => {

    e.preventDefault();

    modal1.classList.remove('form-ticket-openmodal');

});


// MODAL CERRAR TICKET

const modal2 = document.querySelector('.modal-content-edit');

const botonesAbrir2 = document.querySelectorAll('.open-edit-modal');

const botonCerrar2 = document.querySelector('.close-edit-modal');

botonesAbrir2.forEach(btn => {

    btn.addEventListener('click', (e) => {

        e.preventDefault();

        modal2.classList.add('form-ticket-modaledit');

    });

});

botonCerrar2.addEventListener('click', (e) => {

    e.preventDefault();

    modal2.classList.remove('form-ticket-modaledit');

});