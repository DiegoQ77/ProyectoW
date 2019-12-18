<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo();
?>
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
				<img src="../../assets/img/SicUTP.png" alt="Logo Investigacion Utp" />
				<a href="../../index.php">Sistema de Control de Inventario <br><center> Enviar Solicitud</center></a>
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
						<?php if (!isset($_SESSION['usuario'])){ ?>
						<a data-toggle="modal" data-target="#modal1" href="#modal1">Iniciar Sesion</a>
						<?php } else{ ?>
						<a data-toggle="modal" data-target="#modal2" href="#modal2">Cerrar Sesion</a>
						<?php } ?>
					</li>
				</ul>
			</nav>
		</header>
		<div class="container-fluid">
			<form id="form1" action="Enviado.php" method="post">
				<div class="container" style=" max-width: 1200px; padding-top:2vh;">
					<div class="form-group">
						<label for="nombre">Nombre Completo:</label>
						<input type="text" name="completo" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="cedula">Cedula:</label>
						<input type="text" name="cedula" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						<input type="text" name="telefono" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="ocupacion">Ocupación:</label>
						<input type="text" name="ocupacion" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="correo">Correo Institucional:</label>
						<input type="email" name="correo" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="pedido">Cantidad a Solicitar:</label>
						<input type="number" name="pedido" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="motivo">Motivo de Solicitud:</label>
						<textarea class="form-control" name="motivo" rows="2" required></textarea>
					</div>
					<input type="hidden" name="nombre" value="<?php echo $data['nombre'];?>" />
					<input type="hidden" name="id" value="<?php echo $data['codigo'];?>" />
					<input type="hidden" name="email" value="<?php echo $data['email'];?>" />

					<center>
						<button class="btn btn-light" id="validar1" data-toggle="modal" data-target="#modal4" type="button">Enviar Mensaje</button>
						<a href="Ver_Equipo.php?id=<?php echo $data['codigo']; ?>">
							<button class="btn btn-light" type="button">Regresar</button>
						</a>
					</center>
				</div>
				<div class="modal" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Enviar Solicitud</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>¿Deseas enviar este mensaje?</p>
							</div>
							<div class="modal-footer">
								<a href="../../Vistas/usuarios/Enviado.php">
									<button type="submit" class="btn btn-light">Si</button>
								</a>
								<button type="button" class="btn btn-light" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>



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
	<script type="text/javascript" src="../../assets/js/formularios.js"></script>
	<script type="text/javascript" src="../../assets/Bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/js/popper/popper.min.js"></script>
	<script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="../../assets/js/inicio.js"></script>
	<script type="text/javascript" src="../../assets/Datatables/DataTables-1.10.18/js/dataTables.responsive.min.js"></script>
</body>

</html>



		
		


