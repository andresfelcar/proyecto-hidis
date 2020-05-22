function validarFormulario() {
  $(".alert").remove();

  // declarion de variables
  var nombre = $("#nombre").val(),
    apellido = $("#apellido").val(),
    correo = $("#correo").val(),
    contrasena = $("#contrasena").val();

  if (nombre == "" || nombre == null) {
    cambiarColor("nombre");
    // mostramos le mensaje de alerta
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      // mostrara el mesaje que debe ingresar un nombre válido
      cambiarColor("nombre");
      mostraAlerta("No se permiten carateres especiales o numeros");
      return false;
    }
  }

  if (apellido == "" || apellido == null) {
    cambiarColor("apellido");
    // mostramos le mensaje de alerta
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido)) {
      // mostrara el mesaje que debe ingresar un apellido válido
      cambiarColor("apellido");
      mostraAlerta("No se permiten carateres especiales o numeros");
      return false;
    }
  }

  if (correo == "" || correo == null) {
    cambiarColor("correo");
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[.a-zA-Z_0-9]{4,12}[@]{1}[misena|gmail]{5,6}[.com|.edu.co]{4,6}$/;
    if (!expresion.test(correo)) {
      cambiarColor("correo");
      mostraAlerta("Ingrese un correo válido");
      return false;
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
    var expresion = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z]/;
    // /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])$/;
    if (!expresion.test(contrasena)) {
      cambiarColor("contrasena");
      mostraAlerta(
        "Ingrese una contraseña válida, debe tener al menos una mayúscula y un número"
      );
      return false;
    }
  }

  $("form").submit();
  return true;
}
$("input").focus(function () {
  $(".alert").remove();
  colorDefault("nombre");
  colorDefault("correo");
  colorDefault("asunto");
});
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
  $("#boton").after('<p class="alert">' + texto + "</p>");
}
