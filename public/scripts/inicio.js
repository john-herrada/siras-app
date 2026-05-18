//CARGAR MENU EN EL RESPONSIVE
const toggle = document.getElementById('menu-toggle');
const sidebar = document.querySelector('.sidebar');

toggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
        sidebar.classList.remove('active');
    }
});
//CARGAR VISTAS EN EL MAIN
function loadPage(url) {
    document.getElementById("main-frame").src = url;
}

