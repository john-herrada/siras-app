const svg = document.getElementById("fila0");
const info = document.querySelector(".info");

function obtenerInfo(id) {
  switch (id) {
    case "e2":
      return "EMERSON VENTILADOR LIEBERT Y17FBN0001";
    case "e1":
        return "SPECTRA T950 18484A3";
  };
};

svg.addEventListener("click", e => {
  const el = e.target.closest(".rack-item");
  if (!el) return;

  const box = el.getBoundingClientRect();

  info.textContent = obtenerInfo(el.id);
});

history.pushState(null, null, location.href);

window.onpopstate = function () {
    location.href = "index.php";
};