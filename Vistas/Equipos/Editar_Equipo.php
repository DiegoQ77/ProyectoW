<?php 

require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Equipo</title>

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
	<legend>Editar</legend>

	<form action="Actualizado.php" method="post">
		<table cellspacing="0" cellpadding="0">	
			<tr>
				<th>Nombre</th>
				<td><input type="text" name="nombre" value="<?php echo $data['nombre'] ?>" /></td>
			</tr>
			<tr>
				<th>Cantidad</th>
				<td><input type="text" name="cantidad" value="<?php echo $data['cantidad'] ?>" /></td>
			</tr>
            <tr>
				<th>Especificaciones</th>
				<td><input type="text" name="especificacion" value="<?php echo $data['especificaciones'] ?>" /></td>
			</tr>
            <tr>
				<th>Disponibilidad</th>
				<td><input type="text" name="disponibilidad" value="<?php echo $data['disponibilidad'] ?>" /></td>
			</tr>
            <tr>
				<th>Encargado</th>
				<td><input type="text" name="encargado" value="<?php echo $data['encargado'] ?>" /></td>
			</tr>
            <tr>
				<th>Contacto</th>
				<td><input type="text" name="contacto" value="<?php echo $data['contacto'] ?>" /></td>
			</tr>
            <tr>
				<th>Categoria</th>
				<td><input type="text" name="categoria" value="<?php echo $data['categoria'] ?>" /></td>
			</tr>
			
			<tr>
				<input type="hidden" name="id" value="<?php echo $data['codigo']?>" />
				<td><button type="submit">Guardar Cambios</button></td>
				<td><a href="Inventario.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>
