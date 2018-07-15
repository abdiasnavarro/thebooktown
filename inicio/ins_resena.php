<?php 
		include '../conexion/conexion.php';
		foreach ($_POST as $campo => $valor) {
			$variable = "$" . $campo ."='". htmlentities($valor). "';";
			eval($variable);
		}

		$sel = $con->prepare("SELECT id FROM rating WHERE clave_producto = ? AND id_user = ? ");
		$sel->execute(array($clave_producto,$clave_user));
		$row = $sel->rowCount();

		if ($row == 0) {
		$ins = $con->prepare("INSERT INTO rating VALUES (DEFAULT, :clave_producto, :id_user, :fecha, :comentario, :usuario, :rating)");
		$ins->bindparam(':clave_producto', $clave_producto);
		$ins->bindparam(':id_user', $clave_user);
		$ins->bindparam(':fecha', $fecha);
		$ins->bindparam(':comentario', $comentario);
		$ins->bindparam(':usuario', $usuario);
		$ins->bindparam(':rating', $rating);
		}
		else{
		$ins = $con->prepare("UPDATE rating SET fecha = :fecha, comentario= :comentario, rating = :rating WHERE clave_producto = :clave_producto AND id_user = :clave_user");
		$ins->bindparam(':clave_producto', $clave_producto);
		$ins->bindparam(':id_user', $clave_user);
		$ins->bindparam(':fecha', $fecha);
		$ins->bindparam(':comentario', $comentario);
		$ins->bindparam(':rating', $rating);
		}

		$ins->execute();
		$sel = null;
		$ins = null;
		$con = null;
?>