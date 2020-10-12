//Al dar al boton se validan los campos
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

function cleana() {
  $("input").focus(function () {
    $(".alert").remove();
    colorDefault("correo");
    colorDefault("contrasena");
  });
  
}
//Animación para el formulario
$("#a_restart").on("click", function (e) {
  e.preventDefault();
  let restablecer = document.getElementById("card_restart");
  restablecer.style.transform = "translateX(0px)";
  restablecer.style.visibility = "visible";
  restablecer.style.opacity = "1";
});
