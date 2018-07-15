<?php  
include '../conexion/conexion.php';
$clave = htmlentities($_GET['clave']);
$sel = $con->prepare("SELECT * FROM inventario WHERE clave = ?");
$sel->execute(array($clave));
if ($f = $sel->fetch()) { 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Book town</title>
	<link rel="shortcut icon" type="image/png" href="../img/logo.png"/>
	<!-- Bootstrap core CSS -->
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container" style="margin-top: 1%; margin-bottom: 1%;">
		<div class="card text-white bg-secondary">
			<div class="card-header"><h4 class="card-title"><?php echo $f['producto'] ?></h4></div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="../../ecommerce/admin/<?php echo $f['foto'];?>" class="d-block w-100" width="100%" heigth="70%">
								</div>
								<?php 
								$sel_img = $con->prepare("SELECT ruta FROM imagenes WHERE clave = ?");
								$sel_img->execute(array($clave));
								while ($f_img = $sel_img->fetch()) { 
									?>
									<div class="carousel-item">
										<img src="../../ecommerce/admin/<?php echo $f_img['ruta'];?>" class="d-block w-100" width="100%" heigth="70%">
									</div>
									<?php 
								}
								$sel_img = null;
								?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<h3><?php echo "$".number_format($f['precio'],2); ?></h3>
						<input type="hidden" id="clave_producto" value="<?php echo $clave;?>">
						<input type="hidden" id="producto" value="<?php echo $f['producto'];?>">
						<input type="hidden" id="foto" value="<?php echo $f['foto'];?>">
						<input type="hidden" id="descripcion" value="<?php echo $f['descripcion'];?>">
						<input type="hidden" id="precio" value="<?php echo $f['precio'];?>">
						<div class="form-group">
							<input type="number" required id="cantidad" class="form-control" placeholder="Cantidad" max="<?php echo $f['cantidad']; ?>">
						</div>
						<button id="agregar_carrito" class="btn btn-primary">Agregar al carrito</button>
						<div class="res_carrito"></div>
						<p class="text-justify"><?php echo $f['descripcion']; ?></p>
					</div>
				</div>
				<div class="row" style="margin-top: 1%;">
					<div class="col-12">
						<input type="hidden" id="user" value="<?php echo $_SESSION['nombre'];?>">
						<input type="hidden" id="clave_user" value="<?php echo $_SESSION['id'];?>">
						<input type="hidden" id="clave" value="<?php echo $clave;?>">
						<input type="hidden" id="fecha" value="<?php echo date('Y-m-d');?>">
						<input type="text" id="comentario" class="form-control" placeholder="Comentario...">
					</div> 
				</div>
				<hr>
				<div class="row">
					<div class="col-1"></div>
					<div class="col-3 text-left">
						<a href="#"><i class="text-warning fa fa-star-o" id="1"></i></a>
						<a href="#"><i class="text-warning fa fa-star-o" id="2"></i></a>
						<a href="#"><i class="text-warning fa fa-star-o" id="3"></i></a>
						<a href="#"><i class="text-warning fa fa-star-o" id="4"></i></a>
						<a href="#"><i class="text-warning fa fa-star-o" id="5"></i></a>
						<input type="hidden" id="rating" value="0">
					</div>
					<div class="col-8 text-right">
						<button class="btn btn-light" id="cancelar">Cancelar</button>
						<button class="btn btn-primary" id="calificar">Enviar</button>
					</div>
				</div>
				<hr>
				<div id="datos">
					<?php 
					$sel_rating = $con->prepare("SELECT * FROM rating WHERE clave_producto = ?");
					$sel_rating->execute(array($clave));
					while ($f_rating = $sel_rating->fetch()) { 
						?>

						<div class="row contenido">
							<div class="col-12">
								<div class="row">
									<div class="col-10 text-left">
										<p class="font-weight-bold"><?php echo $f_rating['usuario'] ?>
											<span><?php $f_rating['rating'] ?></span>
										</p>
									</div>
									<div class="col-2">
										<p><?php echo $f_rating['fecha'] ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<p><?php echo $f_rating['comentario'] ?></p>
									</div>
								</div>
							</div>
						</div>

						<?php 
					}

					$sel = null;
					$ins = null;
					$con = null;

					?>
				</div>
			</div>
		</div>
	</div>

	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/bootbox.min.js"></script>
	<script src="../js/calificaciones.js"></script>
</body>
</html>