
 /* Se valida los campos del inicio de sesión, al presionar el botón de enviar
se condiciona con expresiones regulares, ninguno de los campos puede estar vacio, si todo cumple a cabalidad
con las caracteristicas se le permite el acceso a la plataforma, de lo contrario se muestra una alerta 
que le permite saber al usuario lo que está haciendo de manera erronea y se cambia de color rojo el input   
en el cual comete el error*/

$("#boton").on("click", function (e) {
  e.preventDefault();
  validarLogin();
});
//Funcion para validar el login
function validarLogin() {
  $(".alert").remove();
  // declarion de variables
  var correo = $("#correo").val(),
    contrasena = $("#contrasena").val(),
    limpiar= cleana();

  if (correo == "" || correo == null) {
    cambiarColor("correo");
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!expresion.test(correo)) {
      cambiarColor("correo");
      mostraAlerta("Ingrese un correo válido");
      return false;
    }
    else{
      limpiar;
    }
  }
  if (contrasena == "" || contrasena == null) {
    cambiarColor("contrasena");
    mostraAlerta("Campo obligatorio");
    return false;
  } else if (contrasena.length < 6 || contrasena > 18) {
    cambiarColor("contrasena");
    mostraAlerta("La contraseña debe tener entre 8 y 16 caracteres");
    return false;
  } else {
    var expresion = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,16}$/;
    // /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z]/;
    // /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])$/;
    if (!expresion.test(contrasena)) {
      cambiarColor("contrasena");
      mostraAlerta(
        "Ingrese una contraseña válida, debe tener al menos una mayúscula y un número"
      );
      return false;
    } else {
      limpiar;
    }
  }

  $("#IngresoLogin").submit();
  return true;
}



// creamos un funcion de color por defecto a los bordes de los inputs
function colorDefault(dato) {
  $("#" + dato).css({
    border: "1px solid #999",
  });
}

// creamos una funcio para cambiar de color a su bordes de los input
function cambiarColor(dato) {
  $("#" + dato).css({
    border: "1px solid #dd5144",
  });
}

// funcion para mostrar la alerta
function mostraAlerta(texto) {
  $("#boton").after('<div class="alert">' + texto + "</div>");
}
function mostraAlerta2(texto) {
  //swal('Error',texto,'warning');
  $("#btn_restart").after('<div class="alert">' + texto + "</div>");
}
//función para limpiar los campos y dejarlo de su color original
function cleana() {
  $("input").focus(function () {
    $(".alert").remove();
    colorDefault("correo");
    colorDefault("contrasena");
    colorDefault("email_restart");
  });
  
}




 /*Se valida el correo al cual se envía el cambio de contraseña, el campo no puede estar vacío, debe ingresar
 un correo existente que posteriormente será validado en el archivo de PHP Login_Controller*/
function Changepass(){
  $(".alert").remove();
  var correo = $("#email_restart").val();
  limpiar= cleana();
  if (correo == "" || correo == null) {
    cambiarColor("email_restart");
    mostraAlerta2("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!expresion.test(correo)) {
      cambiarColor("email_restart");
      mostraAlerta2("Ingrese un correo válido");
      return false;
    }
    else{
      limpiar;
    }
  }
  $("#changepass").submit();
  return true;
}
//Animación para el formulario
 /*Al preionar la propiedad <a> que cita "¿Olviaste tu contraseña?" se mostrará el formulario 
 con las caracteristicas establecidas para su recuperación, hasta este momento el formulario se encontraba
 escondido para el usuario*/
$("#a_restart").on("click", function (e) {
  e.preventDefault();
  let restablecer = document.getElementById("card_restart");
  restablecer.style.transform = "translateX(0px)";
  restablecer.style.visibility = "visible";
  restablecer.style.opacity = "1";
});

$("#btn_restart").on("click", function (e) {
  e.preventDefault();
  Changepass();
});

