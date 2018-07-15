function registroUsuario() {
	var nombre = $("#regUsuario").val();

	if (nombre != "") {
		var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/

		if (!regex.test(nombre)) {
			$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números o caracteres especiales</div>')
			return false;
		}
	}
	else{
		$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ATENCION: </strong>Este campo es obligatorio</div>')
		return false;
	}


	var email = $("#regMail").val();

	if (email != "") {
		var regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

		if (!regex.test(email)) {
			$("#regMail").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>Escriba una dirección válida</div>')
			return false;
		}
	}
	else{
		$("#regMail").parent().before('<div class="alert alert-warning"><strong>ATENCION: </strong>Este campo es obligatorio</div>')
		return false;
	}

	var password = $("#regPassword").val();

	if (password != "") {
		var regex = /^[a-zA-Z0-9]*$/

		if (!regex.test(password)) {
			$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten caracteres especiales para contraseña</div>')
			return false;
		}
	}
	else{
		$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCION: </strong>Este campo es obligatorio</div>')
		return false;
	}

}