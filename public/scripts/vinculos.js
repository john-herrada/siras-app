aire_1 = document.getElementById("AIRE-1");
aire_2 = document.getElementById("AIRE-2");
fila_0 = document.getElementById("FILA-0");
fila_1 = document.getElementById("FILA-1");
fila_2 = document.getElementById("FILA-2");
fila_3 = document.getElementById("FILA-3");
fila_4 = document.getElementById("FILA-4");
fila_5 = document.getElementById("FILA-5");

fila_0.addEventListener("click", () => {
    window.location.href = "/site/fila-0";
});

fila_1.addEventListener("click", () => {
    window.location.href = "/site/fila_1";
});

fila_2.addEventListener("click", () => {
    window.location.href = "/site/fila_2";
});

fila_3.addEventListener("click", () => {
    window.location.href = "/site/fila_3";
});

fila_4.addEventListener("click", () => {
    window.location.href = "/site/fila_4";
});

aire_1.addEventListener("click", () => {
    window.location.href = "/site/aire_1";
});

aire_2.addEventListener("click", () => {
    window.location.href = "/site/aire_2";
});

history.pushState(null, null, location.href);

window.onpopstate = function () {
    location.href = "index.php";
};