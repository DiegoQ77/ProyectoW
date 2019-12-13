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
	if(isset($_POST['cantidad'])){
		$control->cambiarCantidadEquipos();
	}
	if(isset($_POST['pagina'])){
		$control->cambiarPagina();
	}
    if (isset($_POST['consulta'])){
		$datos = $control->filtrarListaEquipos();
	}
	else if(!empty($_SESSION['id'])){
		$datos = $control->ordenarListaEquipos();
	}
	 else{
		$datos = $control->obtenerListaEquipos();
	 }
	 if(is_array($datos)){
		$_SESSION['datos'] = count($datos);
		$_SESSION['matriz'] = $datos;
		 ?>
		<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th><a href = 'location.php?id=codigo'>Codigo</a></th>
				<th><a href = 'location.php?id=nombre'>Nombre</a></th>
				<th><a href = 'location.php?id=cantidad'>Cantidad</a></th>
				<th><a href = 'location.php?id=especificaciones'>Especificaciones</a></th>
				<th><a href = 'location.php?id=disponibilidad'>Disponibilidad</a></th>
				<th><a href = 'location.php?id=encargado'>Encargado</a></th>
				<th><a href = 'location.php?id=contacto'>Contacto</a></th>
				<th><a href = 'location.php?id=categoria'>Categoria</a></th>
				<th><a href = 'location.php?id=created_at'>Creado</a></th>
				<th><a href = 'location.php?id=updated_at'>Actualizado</a></th>
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
<center><label for = "pagina"><?php echo $_SESSION['pagina']?></label></center>
</div>

</body>
</html>