$(document).ready(function () {});

/*function cargar(){
    $('#carga').fadeOut(3000);
    $('body').removeClass('scroll');
};
setInterval(cargar, 4000);

jQuery('document').ready(function($){});

*/

window.addEventListener("load", function () {
  let carga = document.getElementById("carga");
  let cuerpo = document.getElementsByTagName("body")[0];
  carga.style.transition = "5s";
  carga.style.opacity = "0";
  carga.style.zIndex = "-1";
  cuerpo.classList.remove("scroll");

  setTimeout(efectotext, 3000);

  $(document).scroll(function () {
    bajarscroll();
  });

 
  irarriba();

});
function efectotext() {
  let texto = document.getElementsByClassName("move")[0];
  texto.style.transition = "2s";
  texto.classList.remove("move");
}
function efectoform() {
  let texto = document.getElementsByClassName("move1")[0];
  texto.style.transition = "2s";
  texto.style.transform = "translateY(0px)";
  texto.style.opacity = "1";
}
function bajarscroll() {
  if ($(document).scrollTop() >= 2530) {
    efectoform();
  }
}

function irarriba() {
  var arriba = $("#btn-subir");
  arriba.click(function (e) {
    e.preventDefault();
    $("html , body").animate({ scrollTop: 0 }, 500);
  });
  arriba.hide();

  $(window).scroll(function(){
    
    if( $(this).scrollTop() > 200 ) {
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
