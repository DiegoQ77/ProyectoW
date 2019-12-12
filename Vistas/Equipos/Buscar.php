<?php 
	session_start();
	require_once("../../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventario</title>

	<style type="text/css">
		.manageMember {
			width: 50%;
			margin: auto;
		}

		table {
			width: 100%;
			margin-top: 20px;
		}

	</style>

</head>
<body>
	<?php
    if (isset($_POST['consulta'])) {
    	$datos = $control->filtrarListaEquipos();
	}
	else if(empty($_SESSION['id'])){
		$datos = $control->obtenerListaEquipos();
	 }
	 else{
		$datos = $control->ordenarListaEquipos($_SESSION['id'], $_SESSION['orden']);
		if($_SESSION['orden'] == 'ASC'){
			$_SESSION['orden'] = 'DESC';
		}
		else{
			$_SESSION['orden'] = 'ASC';
		}
		unset($_SESSION['id']);
	 }
	 if(is_array($datos)){
		 ?>
		<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th><a href = 'Inventario.php?id=codigo'>Codigo</a></th>
				<th><a href = 'Inventario.php?id=nombre'>Nombre</a></th>
				<th><a href = 'Inventario.php?id=cantidad'>Cantidad</a></th>
				<th><a href = 'Inventario.php?id=especificaciones'>Especificaciones</a></th>
				<th><a href = 'Inventario.php?id=disponibilidad'>Disponibilidad</a></th>
				<th><a href = 'Inventario.php?id=encargado'>Encargado</a></th>
				<th><a href = 'Inventario.php?id=contacto'>Contacto</a></th>
				<th><a href = 'Inventario.php?id=categoria'>Categoria</a></th>
				<th><a href = 'Inventario.php?id=created_at'>Creado</a></th>
				<th><a href = 'Inventario.php?id=updated_at'>Actualizado</a></th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php
	for ($i = 0; $i < count($datos); $i++) {
		?>
		<tr>
			<td><?php echo $datos[$i]["codigo"]; ?></td>
			<td><?php echo $datos[$i]["nombre"]; ?></td>
			<td><?php echo $datos[$i]["cantidad"]; ?></td>
			<td><?php echo $datos[$i]["especificaciones"]; ?></td>
			<td><?php echo $datos[$i]["disponibilidad"]; ?></td>
			<td><?php echo $datos[$i]["encargado"]; ?></td>
			<td><?php echo $datos[$i]["contacto"]; ?></td>
			<td><?php echo $datos[$i]["categoria"]; ?></td>
			<td><?php echo $datos[$i]["created_at"]; ?></td>
			<td><?php echo $datos[$i]["updated_at"]; ?></td>
			<?php echo"
			<td>
			<a href='Editar_Equipo.php?id=".$datos[$i]["codigo"]."'><button type='button'>Editar</button></a>
			<a href='Eliminar_Equipo.php?id=".$datos[$i]["codigo"]."'><button type='button'>Eliminar</button></a>
			</td>";
			?>
		</tr>
		<?php
		}
	}
		else{
			echo "NO HAY DATOS JAJA SALU2";
		}
?>
</tbody>
</table>
</div>

</body>
</html>