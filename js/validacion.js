function validarFormulario() {
  $(".alert").remove();

  // declarion de variables
  var nombre = $("#nombre").val(),
    apellido = $("#apellido").val(),
    correo = $("#correo").val(),
    contrasena = $("#contrasena").val(),
    respuesta = clean();

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
    } else {
      respuesta;
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
    } else {
      respuesta;
    }
  }

  if (correo == "" || correo == null) {
    cambiarColor("correo");
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
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
    } else {
      respuesta;
    }
  }

  $("form").submit();
  return true;
}
function clean() {
  $("input").focus(function () {
    $(".alert").remove();
    colorDefault("nombre");
    colorDefault("apellido");
    colorDefault("correo");
    colorDefault("contrasena");
  });
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
  $("#boton").after('<p class="alert">' + texto + "</p>");
}

function validarLogin() {
  $(".alert").remove();

  // declarion de variables
  var correo = $("#correo").val(),
    contrasena = $("#contrasena").val(),
    respuesta = clean();

  if (correo == "" || correo == null) {
    cambiarColor("correo");
    mostraAlerta("Campo obligatorio");
    return false;
  } else {
    var expresion = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
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
    } else {
      respuesta;
    }
  }

  $("form").submit();
  return true;
}
function clean() {
  $("input").focus(function () {
    $(".alert").remove();
    colorDefault("nombre");
    colorDefault("apellido");
    colorDefault("correo");
    colorDefault("contrasena");
  });
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
  $("#boton").after('<p class="alert">' + texto + "</p>");
}

function ValidarRecuperacion() {
  $(".alert").remove();
  var contrasena = $("#contrasena").val(),
    conficontrasena = $("#coficontrasena").val();

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
    } else {
      clean();
    }
  }
  
  if ((conficontrasena == "" || conficontrasena == null)||(conficontrasena != contrasena)) {
    cambiarColor("conficontrasena");
    mostraAlerta("Las contraseñas no coinciden");
    return false;
    } else {
      clean();
    }

  $("form").submit();
  return true;
}
function clean() {
  $("input").focus(function () {
    $(".alert").remove();
    colorDefault("nombre");
    colorDefault("apellido");
    colorDefault("correo");
    colorDefault("contrasena");
    colorDefault("conficontrasena");
  });
}
