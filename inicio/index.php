<?php include '../extend/header.php'; 
require_once '../login/validarLogin.php';
if (!isset($_SESSION["validarSesion"])){
	header("location:../");
}
?>
<div class="container" style="margin-top: 3%;">
	<h2>Libros Disponibles</h2>
	<div class="row">
		<?php 
		$sel = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE cantidad > 0 ORDER BY id DESC ");
		$sel->execute();
		while ($f = $sel->fetch()) { 
			?>
			<div class="col-md-6 col-sm-12 col-lg-3">
				<div class="card" style="margin-top: 1%;">
					<img class="card-img-top" src="../../ecommerce/admin/<?php echo $f['foto']?>" width="200" height="200">

					<div class="card-body">
						<h4 class="card-title"><?php echo $f['producto'] ?></h4>
						<p class="card-text"><?php echo "$".number_format($f['precio'], 2)?></p>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f['clave'] ?>" onclick="modal(this.value)">Ver más...</button>
						<button class="btn btn-danger text-white float-right" onclick="enviar(this.value)" value="<?php echo $f['clave'] ?>"><i class="fa fa-heart"></i></button>
					</div>
				</div>
			</div>
			<br>
			<?php } 
				$sel = null;
				$con = null;
			?>
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
	<script src="../js/deseos.js"></script>
	<script src="../js/ver_mas.js"></script>
</body>
</html>