 /*Este archivo contiene las animaciones para dar dinamismo al aplicativo y lograr UX asertivo desde el frontend
 para el usuario.
 Se cambian propiedades del css en los encabezados, tambien contiene la función de scroll hacia arriba*/

$(document).ready(function () {});

/*function cargar(){
    $('#carga').fadeOut(3000);
    $('body').removeClass('scroll');
};
setInterval(cargar, 4000);

jQuery('document').ready(function($){});

*/

window.addEventListener("load", function () {
  setTimeout(efectotext, 3000);
  $(document).scroll(function () {
    bajarscroll();
  });

  irarriba();
});
//Efecto para el encabezado del modulo index, se traslada de izquierda a derecha despues de cargar la pagina
function efectotext() {
  let texto = document.getElementsByClassName("move")[0];
  texto.style.transition = "2s";
  texto.classList.remove("move");
}
//Efecto para el formulario del modulo index, se traslada de arriba a abajo
function efectoform() {
  let texto = document.getElementsByClassName("move1")[0];
  texto.style.transition = "2s";
  texto.style.transform = "translateY(0px)";
  texto.style.opacity = "1";
}
//Efecto para el formulario del modulo index, se efectua al superar los 2530px del scroll vertical
function bajarscroll() {
  if ($(document).scrollTop() >= 2530) {
    efectoform();
  }
}
//Efecto para el boton "Ir arriba" la animación se efectua despues de superar los 500px del scroll vertical
function irarriba() {
  var arriba = $("#btn-sub");
  arriba.click(function (e) {
    e.preventDefault();
    $("html , body").animate({ scrollTop: 0 }, 500);
  });
  arriba.hide();

  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      arriba.fadeIn();
    } else {
      arriba.fadeOut();
    }
  });
}


/*window.onload = function(){
    alert("He cargado")
    $("#carga").fadeOut(3000);
}

$(window).on('beforeunload', function(){
	return "Saliendo...";
});*/
/*document.getElementsByTagName('body')[0];*/

let contenido_form1 = document.getElementById("contenido-form1");
let contenido_form2 = document.getElementById("contenido-form2");
let activate_form1 = false;
let activate_form2 = false;

$("#act-pac").on("click", function (e) {
  e.preventDefault();
  activate_form1 = true;
  contenido_form1.style.transform = "translateX(0)";
  contenido_form1.style.opacity = "1";

  if (activate_form2 == true) {
    contenido_form2.style.transform = "translateX(600px)";
    contenido_form2.style.opacity = "0";
  }
});

$("#eli-pac").on("click", function (e) {
  e.preventDefault();
  activate_form2 = true;
  contenido_form2.style.transform = "translateX(0)";
  contenido_form2.style.opacity = "1";

  if (activate_form1 == true) {
    contenido_form1.style.transform = "translateX(-600px)";
    contenido_form1.style.opacity = "0";
  }
});
