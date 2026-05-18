//COMPORTAMIENTO DEL CRONOMETRO
document.addEventListener("DOMContentLoaded", function () {

    const countdown =
        document.getElementById("countdown");

    if (!countdown) return;

    const expiration =
        new Date(
            countdown.dataset.expiration
        ).getTime();

    const timer = setInterval(function () {

        const now = new Date().getTime();

        const distance = expiration - now;

        if (distance <= 0) {

            clearInterval(timer);

            countdown.innerHTML = "EXPIRADO";

            window.location.href =
                "/expired-session";

            return;
        }

        const hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24))
            / (1000 * 60 * 60)
        );

        const minutes = Math.floor(
            (distance % (1000 * 60 * 60))
            / (1000 * 60)
        );

        const seconds = Math.floor(
            (distance % (1000 * 60))
            / 1000
        );

        countdown.innerHTML =
            `${hours}:${minutes}:${seconds}`;

    }, 1000);

});

//RELOJ HTML
function updateClock() {
        const clock = document.querySelector('.clock');

        const now = new Date();

        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        clock.textContent = `${hours}:${minutes}:${seconds}`;
    }

    updateClock();

    setInterval(updateClock, 1000);

    //grafica cintas vs cintas limpieza 

   const dashboardElement = document.getElementById('graph-cintas');

if (dashboardElement) {

    const stats = JSON.parse(
        dashboardElement.dataset.stats
    );

    const ctx = document.getElementById('cintas-chart');

    if (ctx) {

        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: [
                    'Cintas',
                    'Cintas limpias'
                ],

                datasets: [{
                    label: 'Inventario',

                    data: [
                        stats.cintas,
                        stats.cintas_clean
                    ],

                    fill: true,

                    tension: 0.4,

                    backgroundColor: 'rgba(118, 43, 60, 1)',

                    borderColor: 'rgba(118, 43, 60, 1);',

                    pointBackgroundColor: 'rgba(118, 43, 60, 1);',

                    pointRadius: 5
                }]
            },

            options: {

                indexAxis: 'y',

                responsive: true,

                plugins: {
                    legend: {
                        display: true
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    }
}

//grafica prestamos
const dashboardElement1 = document.getElementById('graph-prestamos');

if (dashboardElement1) {

    const stats1 = JSON.parse(
        dashboardElement1.dataset.stats
    );

    const ctx = document.getElementById('prestamos-chart');

    if (ctx) {

        new Chart(ctx, {
            type: 'bar',

            data: {
                labels: [
                    'Prestamos',
                    'Entregas'
                ],

                datasets: [{
                    label: 'Movimientos',

                    data: [
                        stats1.prestamos,
                        stats1.entregas
                    ],

                    fill: true,

                    tension: 0.4,

                    backgroundColor: 'rgba(118, 43, 60, 1)',

                    borderColor: 'rgba(118, 43, 60, 1);',

                    pointBackgroundColor: 'rgba(118, 43, 60, 1);',

                    pointRadius: 5
                }]
            },

            options: {

                 indexAxis: 'y',

                responsive: true,

                plugins: {
                    legend: {
                        display: true
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    }
}

