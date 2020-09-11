 /* Se valida los campos del cambio de contraseña, al presionar el botón de enviar
se condiciona teniendo en cuenta que ninguno de los campos puede estar vacio, las cotraseñas deben coincidir
si todo cumple a cabalidad con las caracteristicas se le permite el cambio de contraseña*/
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
