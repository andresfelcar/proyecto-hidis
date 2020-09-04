window.addEventListener("load", function () {
    let carga = document.getElementById("carga");
    let cuerpo = document.getElementsByTagName("body")[0];
    carga.style.transition = "2s";
    carga.style.opacity = "0";
    carga.style.zIndex = "-1";
    cuerpo.classList.remove("scroll");
});