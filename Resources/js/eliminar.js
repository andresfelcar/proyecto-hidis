function alerta()
    {
    var mensaje;
    var opcion = confirm("¿Desea eliminar la recomendacion?");
    if (opcion == true) {
        mensaje = "Has eliminado la recomendacion";
        

	} else {
        mensaje = "Tu recomendacion seguira vigente";
        window.location='historial.php';
	}
	document.getElementById("elim").innerHTML = mensaje;
}