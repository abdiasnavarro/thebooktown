<?php include '../extend/header.php'; 
include '../extend/alertas.php';
$correo = $_SESSION["email"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	foreach ($_POST as $campo => $valor) {
		$variable = "$" . $campo. "='" . htmlentities($valor). "';";
		eval($variable);
	}

	$direccion = $ubicacion.' '.$calle;
	$up = $con->prepare("UPDATE compras SET direccion_envio = :direccion, nombre = :nombre WHERE correo_usuario = :correo AND status_compra = 'AGREGADO' ");
	$up->bindparam(':direccion', $direccion);
	$up->bindparam(':nombre', $nombre);
	$up->bindparam(':correo', $correo);
	if ($up->execute()){

	}else{
		echo alerta('La direccion de envio no puso ser actualizada','carrito.php');
	}
	$up = null;
	$con = null;
}	 	
	else {
	echo alerta('Utliza el formulario', 'carrito.php');
}	
?>

<div class="container" style="margin-top: 1%;">
	<div class="card text-white bg-dark">
			<div class="card-header"><h4 class="card-title">Total de compra: <?php echo "$".number_format($total,2) ?></h4></div>
			<div class="card-body">
				<form action="../comprar_paypal.php" method="post">
					<input type="hidden" name="total" value="<?php echo $total?>">
					<a href="carrito.php"><input class="btn btn-primary" value="Regresar"></a>
					<input type="submit" class="btn btn-warning" value="pagar">
					<img src="../img/PayPal.png" width="25%" height="25%" style="float: right;">
				</form>
			</div>
		</div>
</div>

<?php include '../extend/footer.php'; ?>
</body>
</html>