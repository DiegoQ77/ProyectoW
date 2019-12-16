<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo();
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../../assets/css/popcss.css">
	<title>Solicitar Equipo</title>
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
	img {
		float: right;
		font-weight: bold;
	}
	</style>
</head>

<body>
	<fieldset>
		<legend>
			<h1>Solicitar</h1>
		</legend>
		<form  id="form1" method="post" enctype="multipart/form-data">
			<table cellspacing="0" cellpadding="0">
				<img src="Imagenes.php?id=<?php echo $data['codigo'];?>" width="400" height="400" />
				<br>
				<br>
				<tr>
					<th>Nombre: </th>
					<td>
						<input type="text" name="nombre" required/>
					</td>
				</tr>
				<tr>
					<th>Cedula: </th>
					<td>
						<input type="text" name="cedula" required/>
					</td>
				</tr>
				<tr>
					<th>Telefono: </th>
					<td>
						<input type="text" name="telefono" required/>
					</td>
				</tr>
				<tr>
					<th>Ocupacion: </th>
					<td>
						<input type="text" name="ocupacion" required/>
					</td>
				</tr>
				<tr>
					<th>Correo: </th>
					<td>
						<input type="text" name="correo" required/>
					</td>
				</tr>
				<tr>
					<th>Cantidad a Solicitar: </th>
					<td>
						<input type="number" name="cantidad" min="1" required/>
					</td>
				</tr>
				<tr>
					<th>Motivo de solicitud: </th>
					<td>
						<textarea name="motivo" required></textarea>
				</tr>

			</table>
			<center>
				<button type="button" id="validar1">Enviar</button>
				<button type="button" style="display:none;" id="popup1" onclick="document.getElementById('id05').style.display='block'"></button>
				<a href="Ver_Equipo.php?id=<?php echo $data['codigo']?>">
					<button type="button">Regresar</button>
				</a>
			</center>
			<div id="id05" class="modal">

				<div class="modal-content animate">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
					</div>
					<center>
						<h1>Deseas enviar este mensaje?</h1>
						<button type="submit" name="submit">Si</button>
						<button type="button" onclick="document.getElementById('id05').style.display='none'">Regresar</button>
					</center>
		</form>
				</div>
		</div>
	</fieldset>
	<script>
	var modal5 = document.getElementById('id05');
	window.onclick = function(event) {
		if(event.target == modal5) {
			modal5.style.display = "none";
		}
	}
	</script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/formularios.js"></script>
</body>

</html>