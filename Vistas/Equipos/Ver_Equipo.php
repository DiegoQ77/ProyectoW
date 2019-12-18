<?php 
session_start(); 
require_once( "../../Controladores/Control_Inventario.php"); 
$control= new Control_Inventario();
$data= $control->recuperarEquipo(); 
$personas = $control->obtenerListaPersonas(); 
$sedes = $control->obtenerListaSedes(); 
$facultades = $control->obtenerListaFacultades(); 
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
				<a href="../../index.php">Sistema de Control de Inventario <br><center> Ver Equipos</center></a>
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
		<div class="ver">
			<div class="container" style="max-width: 1400px; padding-top: 5vh; padding-bottom:5vh">
				<img class="equipo" style="float:right;" src="Imagenes.php?id=<?php echo $data['codigo'];?>" width="350" height="350" />
				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Codigo:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['codigo'];?>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Categoria:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['categoria'];?>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Nombre:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['nombre'];?>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Descripcion:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['descripcion'];?>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Disponibilidad:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['disponibilidad'];?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Cantidad:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['cantidad'];?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Sede:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['sede'];?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Facultad:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['facultad'];?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Encargado:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['encargado'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm">
							<b>Contacto:</b>
						</div>
						<div class="col-sm">
							<?php echo $data['email'];?>
						</div>
					</div>
				</div>


			</div>
			<center>
				<a href="Solicitar_Equipo.php?id=<?php echo $data['codigo']; ?>">
					<button class="btn btn-light" type="button">Solicitar Equipo</button>
				</a>
				<?php if (isset($_SESSION['usuario'])){ ?>
				<a href="Editar_Equipo.php?id=<?php echo $data['codigo']; ?>">
					<button class="btn btn-light" type="button">Editar Equipo</button>
				</a><?php } ?>
				<a href="Inventario.php">
					<button class="btn btn-light" type="button">Regresar</button>
				</a>
				<?php if (isset($_SESSION['usuario'])){ ?>
				<a data-toggle="modal" data-target="#modal5" href="#modal5">
					<button class="btn btn-danger" type="button">Eliminar Equipo</button>
				</a>
				<?php } ?>

			</center>
		</div>
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

	<form action="../../Vistas/Equipos/Eliminado.php" method="GET">
	<div class="modal" id="modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Eliminar Equipo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>¿De verdad deseas eliminar este equipo? Esta accion no se puede deshacer!</p>
				</div>
				<div class="modal-footer">
					<a>
						<button type="submit" class="btn btn-light">Si</button>
					</a>
					<button type="button" class="btn btn-light" data-dismiss="modal">Regresar</button>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo $data['codigo']?>" />
	</form>

	<div class="espacio"></div>
	<!-- PIE DE PAGINA -->
	<footer id="footer">
		<p>Desarrollado por el grupo 4 ISF131 &copy;
			<?=date( 'Y') ?>
		</p>
	</footer>

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