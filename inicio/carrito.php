<?php include '../extend/header.php'; 
$correo = $_SESSION['email'];
$sel = $con->prepare("SELECT * FROM compras WHERE correo_usuario = ?  AND status_compra = 'AGREGADO' ");
$sel->execute(array($correo));
$total = 0;
?>

<div class="container" style="margin-top: 1%;">
	<?php 
	while($f = $sel ->fetch()){ ?>
	<div class="card w-100">
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					<img src="../../ecommerce/admin/<?php echo $f['foto'] ?>" width="100%" >
				</div>
				<div class="col-8">
					<h4 class="card-title"><?php echo $f['producto'] ?></h4>
					<h5><?php echo "$". number_format($f['precio'], 2) ?></h5>
					<h5>Cantidad: <?php echo $f['cantidad'] ?></h5>
					<h5><?php echo "$". number_format($f['total'], 2) ?></h5>
					<p class="card-text" ><?php echo $f['descripcion'] ?></p>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f['clave_producto'] ?>" onclick="modal(this.value)" >Ver más...</button>
				</div>
			</div>
		</div>
	</div>

	<?php 
	$total = $total + $f['total'];
}
$sel = null;
?>
</div>
	<div class="container" style="margin-top: 1%;">
		<div class="card text-center">
			<div class="card-header">
				
			</div>
			<div class="card-body">
				<h4 class="card-title">Total de compra: <?php echo "$".number_format($total,2);?></h4>
				<p class="card-text">Dirección de envío:</p>
				<form action="confirmar.php" method="post" autocomplete="off">
					<input type="hidden" name="total" value="<?php echo $total; ?>">
					<div class="form-group">
						<input type="text" name="nombre" placeholder="Nombre Completo" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion" placeholder="Direccion" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="calle" placeholder="Calle" class="form-control">
					</div>
					<input type="submit" class="btn btn-primary" value="Confirmar">
				</form>
			</div>
		</div>
	</div>

<div class="modal fade modal_mas" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="res">

			</div>
		</div>
	</div>
</div>

<?php include '../extend/footer.php'; ?>
<script src="../js/ver_mas.js"></script>
</body>
</html>