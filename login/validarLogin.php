<?php
require_once '../conexion/conexion.php';

if(isset($_POST["ingMail"])) {
	if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingMail"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

		$encriptar  = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');

		$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :correo");
		$stmt->bindparam(':correo', $_POST["ingMail"]);
		$stmt -> execute();
		$respuesta = $stmt -> fetch(PDO::FETCH_ASSOC);

		if ($respuesta["email"] == $_POST["ingMail"] && $respuesta["password"] == $encriptar) {
			$_SESSION["validarSesion"] = "ok";
			$_SESSION["id"] = $respuesta["id"];
			$_SESSION["nombre"] = $respuesta["nombre"];
			$_SESSION["email"] = $respuesta["email"];
			$_SESSION["password"] = $respuesta["password"];
			header("location:../inicio/index.php");
		}
		else{
			echo '<script> alert("ERROR: Verifica tu correo o contraseña")
			history.back();
			</script>';
		}
		
		$stmt = null;

	} else{
		echo '<script> alert("ERROR: No se permiten caracteres especiales")
		history.back();
		</script>';
	}
}

	?>