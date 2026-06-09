document.addEventListener('DOMContentLoaded', () => {

    const rackData = document.getElementById('rackData');

    if (!rackData) return;

    document.querySelectorAll('.rack-item').forEach(item => {

        item.addEventListener('click', function () {

            const idHtml = this.id;
            const fila = rackData.dataset.fila;
            const rack = rackData.dataset.rack;

            cargarPuertos(
                idHtml,
                fila,
                rack
            );

        });

    });

});

function cargarPuertos(idHtml, fila, rack)
{
    fetch(
        `${rutaBuscarPuertos}?id_html=${idHtml}&fila=${fila}&rack=${rack}`
    )
    .then(response => response.json())

    .then(datos => {

        const tbody =
            document.querySelector(
                '#tablaPuertos tbody'
            );

        tbody.innerHTML = '';

        if (datos.length === 0)
        {
            document.getElementById(
                'nombreEquipo'
            ).textContent =
                'Sin información';

            document.getElementById(
                'serieEquipo'
            ).textContent = '';

            tbody.innerHTML = `
                <tr>
                    <td colspan="7">
                        No existen puertos registrados
                    </td>
                </tr>
            `;

            return;
        }

        document.getElementById(
            'nombreEquipo'
        ).textContent =
            datos[0].nombre_equipo;

        document.getElementById(
            'serieEquipo'
        ).textContent =
            datos[0].serie;

        datos.forEach(item => {

            tbody.innerHTML += `
                <tr>
                    <td>${item.puerto_origen}</td>
                    <td>${item.puerto_destino}</td>
                    <td>${item.fila_destino}</td>
                    <td>${item.rack_destino}</td>
                    <td>${item.unidad_destino}</td>
                    <td>${item.equipo_destino}</td>
                    <td>${item.serie_destino}</td>
                </tr>
            `;

        });

    })

    .catch(error => {

        console.error(
            'Error al consultar puertos:',
            error
        );

    });

}

//FUNCIONMIENTO DEL MODAL

const modal = document.querySelector('.modal-container');
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