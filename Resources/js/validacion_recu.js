/*function ValidarRecuperacion() {
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
  }*/

function validatePassword() {
  var pass1 = document.getElementById("contrasena").value;
  var pass2 = document.getElementById("conficontrasena").value;
  pass1 != pass2
    ? document
        .getElementById("conficontrasena")
        .setCustomValidity("Las contraseñas no coinciden")
    : document.getElementById("conficontrasena").setCustomValidity("");
}
document.getElementById("restart-boton").onclick = validatePassword;
