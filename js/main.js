$(document).ready(function(){
    
    
})

/*function cargar(){
    $('#carga').fadeOut(3000);
    $('body').removeClass('scroll');
};
setInterval(cargar, 4000);*/


window.addEventListener('load', function(){
    let carga= document.getElementById('carga');
    let cuerpo = document.getElementsByTagName('body')[0];
    carga.style.transition = '3s';
    carga.style.opacity = '0';
    carga.style.zIndex = '-1';
    cuerpo.classList.remove('scroll');
    
})
let texto = document.getElementsByClassName('move')[0];
function efectotext(){
    texto.style.transition = '2s';
	texto.classList.remove('move');
}
setInterval(efectotext, 3000);

/*window.onload = function(){
    alert("He cargado")
    $("#carga").fadeOut(3000);
}

$(window).on('beforeunload', function(){
	return "Saliendo...";
});*/
/*document.getElementsByTagName('body')[0];*/