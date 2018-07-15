<?php
require_once "../conexion/conexion.php";	

if(isset($_POST["regUsuario"])){
	if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regMail"]) &&
		preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

		$encriptar  = crypt($_POST["regPassword"], '$2a$07$usesomesillystringforsalt$');

	$datos = array("nombre"=>$_POST["regUsuario"],
		"password"=>$encriptar,
		"email"=>$_POST["regMail"],
		"verificacion"=> 1);

	$stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre, password, email, verificacion) VALUES (:nombre, :password, :email, :verificacion)");

	$stmt->bindparam(':nombre', $datos["nombre"]);
	$stmt->bindparam(':password', $datos["password"]);
	$stmt->bindparam(':email', $datos["email"]);
	$stmt->bindparam(':verificacion', $datos["verificacion"]);

	if ($stmt->execute()){
		echo '<script> alert("Te has registrado exitosamente")
		</script>';
		header('Location: ../inicio/');			 
	}

} else {
	echo '<script> alert("ERROR: No se permiten caracteres especiales")
	history.back();
	</script>';
}
	$stmt->close();
	$stmt = null;
}
?>