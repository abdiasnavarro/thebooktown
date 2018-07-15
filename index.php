<?php
if (isset($_SESSION["validarSesion"])){
    header("location:inicio/");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Book town</title>
  <link rel="shortcut icon" type="image/png" href="img/logo.png"/>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Font awesome-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

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
            <a class="nav-link" data-toggle="modal" href="#modalregistro">Registrate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" href="#modalingreso">Ingresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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

  <div class="modal fade" id="modalregistro" role="dialog">
    <div class="modal-dialog modal-content">
      <div  class="modal-header">
        <h4 class="modal-title">Registrate</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="login/ControlUsuarios.php" method="post" onsubmit="return registroUsuario()"> 
          <hr>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon">
               <i class="fa fa-user"></i>
             </span>
             <input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>
           </div>
         </div>
         <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">
             <i class="fa fa-envelope"></i>
           </span>
           <input type="email" class="form-control" id="regMail" name="regMail" placeholder="Correo Electrónico" required>
         </div>
       </div>
       <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-lock"></i>
          </span>
          <input type="password" class="form-control" id="regPassword" name="regPassword" required placeholder="Contraseña">
        </div>
      </div>
      <input type="submit" class="btn btn-default btn-block" value="Enviar">
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modalingreso" role="dialog">
  <div class="modal-dialog modal-content">
    <div  class="modal-header">
      <h4 class="modal-title">Ingresar</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form action="login/validarLogin.php" method="post"> 
        <hr>
       <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon">
           <i class="fa fa-envelope"></i>
         </span>
         <input type="email" class="form-control" id="ingMail" name="ingMail" placeholder="Correo Electrónico" required>
       </div>
     </div>
     <div class="form-group">
      <div class="input-group">
        <span class="input-group-addon">
          <i class="fa fa-lock"></i>
        </span>
        <input type="password" class="form-control" id="ingPassword" name="ingPassword" required placeholder="Contraseña">
      </div>
    </div>
    <input type="submit" class="btn btn-default btn-block" value="Enviar">
  </form>
</div>
</div>
</div>




<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/dorian.jpg">
        <div class="card-body">
          <h4 class="card-title">El Retrato de Dorian Gray</h4>
          <p class="card-text">Algo de dorian gray</p>
          <a href="" class="btn btn-outline-info">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/dorian.jpg">
        <div class="card-body">
          <h4 class="card-title">El Retrato de Dorian Gray</h4>
          <p class="card-text">Algo de dorian gray</p>
          <a href="" class="btn btn-outline-info">Ver más</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 20rem;">
        <img class="card-img-top" src="img/dorian.jpg">
        <div class="card-body">
          <h4 class="card-title">El Retrato de Dorian Gray</h4>
          <p class="card-text">Algo de dorian gray</p>
          <a href="" class="btn btn-outline-info">Ver más</a>
        </div>
      </div>
    </div>
    <hr>
  </div>
</div>

<hr>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
              </span>
            </a>
          </li>
        </ul>
        <p class="copyright text-muted">Copyright &copy; The Book town 2018</p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>
<script src="js/usuarios.js"></script>

</body>

</html>
