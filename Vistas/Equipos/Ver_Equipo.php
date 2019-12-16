<?php 
session_start(); 
require_once( "../../Controladores/Control_Inventario.php"); 
$control= new Control_Inventario();
$data= $control->recuperarEquipo(); 
$personas = $control->obtenerListaPersonas(); 
$sedes = $control->obtenerListaSedes(); 
$facultades = $control->obtenerListaFacultades(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ver Equipo</title>
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
		img {
			float: right;
		}
	</style>
</head>
<body>
	<fieldset>
		<legend>
			<h1><?php echo $data['codigo'] . " - " . $data['nombre'];?></h1>
		</legend>
		<table cellspacing="0" cellpadding="0">
			<img src="Imagenes.php?id=<?php echo $data['codigo'];?>" width="400" height="400" />
			<tr>
				<th>Categoria: </th>
				<td>
					<?php echo $data['categoria']; ?>
				</td>
			</tr>
			<tr>
				<th>Descripcion: </th>
				<td>
					<?php echo $data['descripcion'];?>
				</td>
			</tr>
			<tr>
				<th>Disponibilidad: </th>
				<td>
					<?php echo $data['disponibilidad'];?>
				</td>
			</tr>
			<tr>
				<th>Cantidad: </th>
				<td>
					<?php echo $data['cantidad'];?>
				</td>
			</tr>
			<tr>
				<th>Encargado: </th>
				<td>
					<?php echo $data['encargado'];?>
				</td>
			</tr>
			<tr>
				<th>Contacto: </th>
				<td>
					<?php echo $data['email']; ?>
				</td>
			</tr>
			<tr>
				<th>Sede: </th>
				<td>
					<?php echo $data['sede'];?>
				</td>
			</tr>
			<tr>
				<th>Facultad: </th>
				<td>
					<?php echo $data['facultad'];?>
				</td>
			</tr>
		</table>
		<center>
			<?php if (isset($_SESSION['usuario'])) { ?>
			<a href="Editar_Equipo.php?id=<?php echo $data['codigo'];?>">
				<button type="button">Editar Equipo</button>
			</a>
			<button type="button" onclick="document.getElementById('id02').style.display='block'">Eliminar Equipo</button>
			<?php } ?>
			<a href="Solicitar_Equipo.php?id=<?php echo $data['codigo']; ?>">
				<button type="button">Solicitar Equipo</button>
			</a>
			<a href="location.php">
				<button type="button">Regresar</button>
			</a>
		</center>
	</fieldset>


	<div id="id02" class="modal">
		<form class="modal-content animate" action="Eliminado.php" method="POST">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>
			<input type="hidden" name="id" value="<?php echo $data['codigo'];?>" />
			<center>
				<h1>De verdad deseas eliminar este equipo?</h1>
				<button type="submit" name="submit">Si</button>
				<button type="button" onclick="document.getElementById('id02').style.display='none'">Regresar</button>
			</center>
		</form>
	</div>

	<script>
		var modal2 = document.getElementById('id02');
		window.onclick = function(event) {
			if (event.target == modal2) {
				modal2.style.display = "none";
			}
		}
	</script>
</body>
</html>