//boton editar
document.addEventListener('click', function(e) {

    const btn = e.target.closest('.btn-editar');
    if (!btn) return;

    window.location.href = `/cintas/${btn.dataset.codigo}/edit`;
});
