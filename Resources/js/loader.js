window.addEventListener("load", function () {
    let carga = document.getElementById("carga");
    let cuerpo = document.getElementsByTagName("body")[0];
    carga.style.transition = "2s";
    carga.style.opacity = "0";
    carga.style.zIndex = "-1";
    cuerpo.classList.remove("scroll");
});
 /*Este archivo realiza la funcion de mostar un loader mientras la página carga 
 lo que hace es que mientras la ventana esté cargando agrega una transición a la propiedad carga
 le quita la opacidad y lo coloca sobre los elementos de la pantalla como una capa
 cuando la página termine de cargar muestra la barra de scroll(verical) para usarla convencionalmente*/