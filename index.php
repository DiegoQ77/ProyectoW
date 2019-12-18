<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<title>Inventario</title>
	<link href="../../assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/css/indexcss.css">
	<link rel="stylesheet" href="../../assets/css/adicional.css">
	<link rel="stylesheet" type="text/css" href="../../assets/Datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

</head>

<body>
	<div id="main-container">
		<!-- CABECERA -->
		<header id="header">
			<div id="logo">
				<img src="assets/img/SicUTP.png" alt="Logo Investigacion Utp" />
				<a href="index.php">Sistema de Control de Inventario </a>
			</div>
			<nav id="menu">
				<ul>
					<li>
						<a href="../../index.php">Inicio</a>
					</li>
					<li>
						<a href="../../Vistas/Equipos/location.php">Inventario</a>
					</li>
					<li>
						<?php if (!isset($_SESSION[ 'usuario'])){ ?>
						<a data-toggle="modal" data-target="#modal1" href="#modal1">Iniciar Sesion</a>
						<?php } else{ ?>
						<a data-toggle="modal" data-target="#modal2" href="#modal2">Cerrar Sesion</a>
						<?php } ?>
					</li>
				</ul>
			</nav>
		</header>

		<section class="principal">
			<!-- CONTENIDO CENTRAL -->
			<div class="container-responsive">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="../../assets/img/img1.jpg">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="../../assets/img/img2.jpg">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="../../assets/img/img3.jpg">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		</section>

		<!-- Modal -->
		<div class="modal " id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Iniciar Sesión</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Cuenta de Usuario</label>
							<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Contraseña</label>
							<input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
							<small id="warning" class="form-text text-muted"><div style="color:#FF0000;" id = "respuesta"></div></small>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="login" class="btn btn-light" name="submit">Iniciar Sesion</button>
						<button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
						<br>
					</div>
				</div>
			</div>
		</div>

		<div class="modal" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Cerrar Sesión</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>¿Deseas Cerrar Sesion?</p>
					</div>
					<div class="modal-footer">
						<a href="../../Vistas/usuarios/cerrarS.php">
							<button type="button" class="btn btn-light">Cerrar Sesión</button>
						</a>
						<button type="button" class="btn btn-light" data-dismiss="modal">Regresar</button>
					</div>
				</div>
			</div>
		</div>
		<!-- PIE DE PAGINA -->
		<footer id="footer">
			<p>Desarrollado por el grupo 4 ISF131 &copy;
				<?=date( 'Y') ?>
			</p>
		</footer>
	</div>
	<script type="text/javascript" src="../../assets/js/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../assets/js/inventario.js"></script>
	<script type="text/javascript" src="../../assets/Bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/js/popper/popper.min.js"></script>
	<script type="text/javascript" src="../../assets/Datatables/datatables.min.js"></script>
	<script type="text/javascript" src="../../assets/js/inicio.js"></script>
</body>

</html>