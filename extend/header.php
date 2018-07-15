<?php include '../conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Book town</title>
  <link rel="shortcut icon" type="image/png" href="../img/logo.png"/>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Font awesome-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.css" rel="stylesheet">
</head>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="index.php">The Book town</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deseos.php">Mis deseos</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="compras.php">Mis Compras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="logout" href="../login/salir.php">Salir</a>
        </li>
      </ul>
      <?php 
        $correo = $_SESSION["email"];
        $sel_carrito = $con->prepare("SELECT id FROM compras WHERE correo_usuario = ? AND status_compra = 'AGREGADO'");
        $sel_carrito->execute(array($correo));
        $carrito = $sel_carrito -> rowCount();
        $sel_carrito = null;
       ?>
       <?php  if($carrito > 0): ?>
        <a href="carrito.php" class="navbar-link"><i class="fa fa-shopping-cart fa-2x"><span class="badge badge-danger"><?php echo $carrito ?></span></i></a>
      <?php else: ?>
        <a href="carrito.php" class="navbar-link"><i class="fa fa-shopping-cart fa-2x"></i></a>
       <?php endif ?>
    </div>
  </div>
</nav>
<body>
  <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Bienvenido</h1>
            <span class="subheading">Tienda en línea de libros por pedidos. ¡Compra hoy!</span>
          </div>
        </div>
      </div>
    </div>
  </header>