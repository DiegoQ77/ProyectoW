<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo();
$personas = $control->obtenerListaPersonas();
$sedes = $control->obtenerListaSedes();
$facultades = $control->obtenerListaFacultades();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Editar Equipo</title>
	<link rel="stylesheet" href="../../assets/css/popcss.css">
	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}
		table tr th {
			padding-top: 20px;
			padding-bottom: 20px;
		}
		table td {
			padding-top: 20px;
			padding-bottom: 20px;
		}
		textarea {
			width: 300px;
			height: 100px;
		}
		.imagen {
			float: right;
			font-weight: bold;
		}
	</style>

</head>

<body>

	<fieldset>
		<legend>
			<h1>Editar</h1>
		</legend>
		<form id="form" action="Actualizado.php" method="post" enctype="multipart/form-data">
			<table cellspacing="0" cellpadding="0">
				<div class="imagen">
					<img src="Imagenes.php?id=<?php echo $data['codigo'];?>" width="400" height="400" />
					<br>
					<br>
					<laber for="cambiar">Cambiar Imagen:<label>
						<br>
						<br>
						<input type="file" name="file" id="file" accept="image/*"/>
						<p id="mensaje"></p>
				</div>
				<tr>
					<th>Categoria:</th>
					<td>
						<input type="text"  name="categoria" value="<?php echo $data['categoria'];?>" required/>
					</td>
				</tr>
				<tr>
					<th>Nombre:</th>
					<td>
						<input type="text" name="nombre" value="<?php echo $data['nombre'];?>" required/>
					</td>
				</tr>
				<tr>
					<th>Descripcion: </th>
					<td>
						<textarea name="descripcion" required><?php echo $data['descripcion'];?></textarea>
					</td>
				</tr>
				<tr>
					<th>Disponibilidad: </th>
					<td>
						<select name="disponibilidad" required>
							<option selected hidden>
								<?php echo $data['disponibilidad'];?>
							</option>
							<option>Disponible</option>
							<option>No Disponible</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Cantidad: </th>
					<td>
						<input type="number" name="cantidad" min="0" value="<?php echo $data['cantidad'];?>" required/>
					</td>
				</tr>
				<tr>
					<th>Encargado: </th>
					<td>
						<select name="encargado" required>
							<option selected hidden>
								<?php echo $data['encargado'];?>
							</option>
								<?php if(is_array($personas)){ for ($i=0 ; $i < count($personas); $i++) { ?>
							<option value="<?php echo $personas[$i]['id']?>">
								<?php echo $personas[$i]['id'] . " - ".$personas[$i]['encargado']; ?>
							</option>
							<?php } } else{ echo "NO HAY DATOS"; } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Sede: </th>
					<td>
						<select name="sede" required>
							<option selected hidden>
								<?php echo $data['sede'];?>
							</option>
								<?php if(is_array($sedes)){ for ($i=0 ; $i < count($sedes); $i++) { ?>
							<option value="<?php echo $sedes[$i]['id']?>">
								<?php echo $sedes[$i]['id'] . " - ".$sedes[$i]['sede']; ?>
							</option>
							<?php } } else{ echo "NO HAY DATOS"; } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Facultad: </th>
					<td>
						<select name="facultad" required>
							<option selected hidden>
								<?php echo $data['facultad'];?>
							</option>
								<?php if(is_array($facultades)){ for ($i=0 ; $i < count($facultades); $i++) { ?>
							<option value="<?php echo $facultades[$i]['id']?>">
								<?php echo $facultades[$i]['id'] . " - ".$facultades[$i]['facultad']; ?>
							</option>
							<?php } } else{ echo "NO HAY DATOS"; } ?>
						</select>
					</td>
				</tr>
				<input type="hidden" name="id" value="<?php echo $data['codigo']?>" />
				<input type="hidden" name="email" value="<?php echo $data['email']?>" />
			</table>
			<center>
				<button type="button" id="validar">Guardar Cambios</button>
				<button type="button" style="display:none;" id="popup" onclick="document.getElementById('id03').style.display='block'"></button>
				<td>
					<a href="Ver_Equipo.php?id=<?php echo $data['codigo']?>">
						<button type="button">Regresar</button>
					</a>
			</center>

			<div id="id03" class="modal">

				<div class="modal-content animate">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
					</div>
					<center>
						<h1>De verdad deseas actualizar este equipo?</h1>
						<button type="submit" name="submit">Si</button>
						<button type="button" onclick="document.getElementById('id03').style.display='none'">Regresar</button>
					</center>

				</div>
			</div>
		</form>
	</fieldset>
	<script>
		var modal3 = document.getElementById('id03');
		window.onclick = function(event) {
			if (event.target == modal3) {
				modal3.style.display = "none";
			}
		}
	</script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/formularios.js"></script>
</body>

</html>