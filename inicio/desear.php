<?php 
	include '../conexion/conexion.php';
	$clave_producto = htmlentities($_GET['clave']);
	$correo_user = $_SESSION['email'];

	$sel = $con->prepare("SELECT id FROM deseos WHERE correo = ? AND clave_producto = ?");
	$sel->execute(array($correo_user, $clave_producto));
	$row = $sel -> rowCount();
	if ($row == 0) {
		$clave = sha1(rand(0000,9999).rand(00,99));
		$ins = $con->prepare("INSERT INTO deseos VALUES (DEFAULT, :clave, :email, :clave_producto)");
		    $ins->bindparam(':clave', $clave);
		    $ins->bindparam(':email', $correo_user);
		    $ins->bindparam(':clave_producto', $clave_producto);
		$ins -> execute();    
	}
	$ins = null;
	$con = null;
 ?>