<!DOCTYPE html>
<html>
<head>
	<title>Agregar Equipo</title>

	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}

		table tr th {
			padding-top: 20px;
		}
	</style>

</head>
<body>

<fieldset>
	<legend>Agregar</legend>

	<form action="Creado.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Codigo</th>
				<td><input type="text" name="codigo" /></td>
			</tr>		
			<tr>
				<th>Nombre</th>
				<td><input type="text" name="nombre"  /></td>
			</tr>
			<tr>
				<th>Cantidad</th>
				<td><input type="number" name="cantidad" /></td>
			</tr>
			<tr>
				<th>Especificaciones</th>
				<td><input type="text" name="especificacion" /></td>
			</tr>	
			<tr>
				<th>Disponibilidad</th>
				<td><input type="text" name="disponibilidad" /></td>
			</tr>	
			<tr>
				<th>Encargado</th>
				<td><input type="text" name="encargado" /></td>
			</tr>
			<tr>
				<th>Contacto</th>
				<td><input type="text" name="contacto" /></td>
			</tr>
			<tr>
				<th>Categoria</th>
				<td><input type="text" name="categoria" /></td>
			</tr>			
			<tr>
				<td><button type="submit">Guardar</button></td>
				<td><a href="Inventario.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>