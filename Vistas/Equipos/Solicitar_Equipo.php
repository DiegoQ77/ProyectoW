<?php 

require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo();
?>

<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="../../assets/css/popcss.css">
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
		
		textarea{
			width:300px;
			height:100px;
		}
		.imagen{
			float: right;
			font-weight:bold;

		}
	</style>

</head>
<body>

<fieldset>
	<legend><h1>Solicitar</h1></legend>

	<form action="Actualizado.php" method="post" enctype="multipart/form-data">
	<table cellspacing="0" cellpadding="0">	
    <div class = "imagen">
		<img src="Imagenes.php?id=<?php echo $data["codigo"];?>" width="400" height="400"/><br><br>
			<tr>
				<th>Nombre: </th>
				<td><input type="text" name="nombre"required/></td>
			</tr>	
			<tr>
				<th>Cedula: </th>
				<td><input type="text" name="cedula"  required/></td>
			</tr>
			<tr>
            <tr>
				<th>Telefono: </th>
				<td><input type="text" name="telefono"  required/></td>
            </tr>
            <tr>
				<th>Ocupacion: </th>
				<td><input type="text" name="ocupacion"  required/></td>
            </tr>
            <tr>
				<th>Correo: </th>
				<td><input type="text" name="correo"  required/></td>
			</tr>
			<tr>
				<th>Cantidad a Solicitar: </th>
				<td><input type="number" name="cantidad" min="1" required/></td>
			</tr>	
			<tr>
				<th>Motivo de solicitud: </th>
				<td><textarea name="motivo" required></textarea>
			</tr>	
			
				<input type="hidden" name="id" value="<?php echo $data['codigo']?>" />
		</table>
		<center>
		<button type="submit">Enviar</button>
		<td><a href="Ver_Equipo.php?id=<?php echo $data["codigo"]?>"><button type = "button">Regresar</button></a>
				</center>
	</form>

</fieldset>
</body>
</html>