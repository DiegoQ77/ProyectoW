<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo();
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
				<a href="../../index.php">Sistema de Control de Inventario <br><center> Editar Equipos</center></a>
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

		<div class="container" style="max-width: 1400px;">
			<div class="imagen" style="float: right;">
				<img class="equipo" src="Imagenes.php?id=<?php echo $data['codigo'];?>" />
				<br>
				<label for="cambiar">Cambiar Imagen:</label>
				<br>

				<input type="file" name="imagen" id="file" accept="image/*" />
				<p id="mensaje"></p>
			</div>
			<form action="Actualizado.php" method="post" id="form" enctype="multipart/form-data">
				<div class="container" style="float:left; max-width: 800px; padding-top:0;">
					<div class="form-group">
						<label for="categoria">Categoria:</label>
						<input type="text" value="<?php echo $data['categoria'];?>" name="categoria" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" value="<?php echo $data['nombre'];?>" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion del Equipo:</label>
						<textarea class="form-control form-control-sm" name="descripcion" rows="2" required><?php echo $data['descripcion'];?></textarea>
					</div>
					<div class=" form-row">
						<div class="form-group col-md-6">
							<label for="sede">Sede:</label>
							<select name="sede" class="form-control form-control-sm" required>
								<option selected hidden>
									<?php echo $data['sede'];?>
								</option>
								<?php if(is_array($sedes)){ for ($i=0 ; $i < count($sedes); $i++) { ?>
								<option value="<?php echo $sedes[$i]['id']?>">
									<?php echo $sedes[$i]['id'] . " - ".$sedes[$i]['sede']; ?>
								</option>
								<?php } } else{ echo "NO HAY DATOS"; } ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="facultad">Facultad:</label>
							<select name="facultad" class="form-control form-control-sm" required>
								<option selected hidden>
									<?php echo $data['facultad'];?>
								</option>
								<?php if(is_array($facultades)){ for ($i=0 ; $i < count($facultades); $i++) { ?>
								<option value="<?php echo $facultades[$i]['id']?>">
									<?php echo $facultades[$i]['id'] . " - ".$facultades[$i]['facultad']; ?>
								</option>
								<?php } } else{ echo "NO HAY DATOS"; } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="encargado">Encargado</label>
						<select name="encargado" class="form-control form-control-sm" required>
							<option selected hidden>
								<?php echo $data['encargado'];?>
							</option>
							<?php if(is_array($personas)){ for ($i=0 ; $i < count($personas); $i++) { ?>
							<option value="<?php echo $personas[$i]['id']?>">
								<?php echo $personas[$i]['id'] . " - ".$personas[$i]['encargado']; ?>
							</option>
							<?php } } else{ echo "NO HAY DATOS"; } ?>
						</select>
					</div>
					<div class=" form-row">
						<div class="form-group col-md-6">
							<label for="disponibilidad">Disponibilidad</label>
							<select class="form-control form-control-sm" name="disponibilidad" required>
								<option selected hidden>
									<?php echo $data['disponibilidad'];?>
								</option>
								<option>Disponible</option>
								<option>No Disponible</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="exampleFormControlTextarea1">Cantidad:</label>
							<input type="number" value="<?php echo $data['cantidad'];?>" class="form-control form-control-sm" name="cantidad" min="0" required>
						</div>
					</div>
					<input type="hidden" name="id" value="<?php echo $data['codigo']?>" />
					<input type="hidden" name="email" value="<?php echo $data['email']?>" />
					<center>
						<button class="btn btn-light" id="validar" data-toggle="modal" data-target="#modal3" type="button">Guardar Cambios</button>
						<a href="Ver_Equipo.php?id=<?php echo $data['codigo']; ?>">
							<button class="btn btn-light" type="button">Regresar</button>
						</a>
					</center>
				</div>
				
				<div class="modal" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Editar Equipo</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>¿Deseas Confirmar estos cambios?</p>
							</div>
							<div class="modal-footer">
								<a href="../../Vistas/usuarios/Actualizado.php">
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
							<input type="text" name="username" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Contraseña</label>
							<input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1" required>
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