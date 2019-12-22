<?php 
session_start();
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$datos = $control-> obtenerListaEquipos();
?>
<!DOCTYPE HTML>
<html lang="es">
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../assets/css/indexcss.css">
	<link rel="stylesheet" href="../../assets/css/adicional.css">
	<link rel="stylesheet" type="text/css" href="../../assets/Datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<div class="main-container">
		<!-- CABECERA -->
		<header id="header">
			<div id="logo">
				<img src="../../assets/img/SicUTP.png" alt="Logo Investigacion Utp" />
				<a href="../../index.php">Sistema de Control de Inventario <br><center> Equipos</center></a>
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

		<div class="listado">
			<section class="principal">
				<div class="container" style=" max-width: 1800px; padding-top:3vh;">
					<div class="table">
						<?php if (isset($_SESSION['usuario'])){ ?>
						<a href="Agregar_Equipo.php">
							<button type="button"  style="float:right;" class="btn btn-light">Agregar Nuevo Equipo</button>
						</a>
						<?php } if(is_array($datos)){?>

						<table id="tabla" cellspacing="0" class="table table-hover">
							<thead class="thead-dark">
								<div class="row">
									<tr>
										<th style="width:10%">
											Codigo
										</th>
										<th style="width: 10%">
											Categoria
										</th>
										<th style="width: 10%">
											Nombre
										</th>
										<th style="width: 10%">
											Disponibilidad
										</th>
										<th style="width: 10%">
											Cantidad
										</th>
										<th style="width: 10%">
											Encargado
										</th>
										<th style="width: 10%">
											Sede
										</th>
										<th style="width: 20%">
											Facultad
										</th>
										<th style="width: 1%"></th>
										<?php } ?>
									</tr>
								</div>
							</thead>
							<tbody>
								<?php for ($i=0 ; $i < count($datos); $i++) { ?>
								<div class="row">
									<tr>
										<td>
											<?php echo $datos[$i]['codigo']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['categoria']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['nombre']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['disponibilidad']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['cantidad']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['encargado']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['sede']; ?>
										</td>
										<td>
											<?php echo $datos[$i]['facultad']; ?>
										</td>
										<?php echo "
										<td>
											<a class=ver href='Ver_Equipo.php?id=".$datos[$i]['codigo']. "'></a>
										</td> ";?>
									</tr>
								</div>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>


			</section>
		</div>
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
		<div class="espacio"></div>
		<div class="espacio"></div>
		<footer id="footer" style="position:absolute; botton:0;">
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