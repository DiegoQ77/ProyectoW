<?php 
	require_once("../Controladores/Control_Inventario.php");
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
<center><h1>SISTEMA DE INVENTARIO</h1></center>
<div class="manageMember">
	<a href="Agregar_Equipo.php"><button type="button">Registrar Nuevo Equipo</button></a>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Especificaciones</th>
				<th>Disponibilidad</th>
				<th>Encargado</th>
				<th>Contacto</th>
				<th>Categoria</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		 <?php 
			 $datos = $control->obtenerListaEquipos();
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
							<?php echo"
							<td>
							<a href='Editar_Equipo.php?id=".$datos[$i]["codigo"]."'><button type='button'>Editar</button></a>
							<a href='Eliminar_Equipo.php?id=".$datos[$i]["codigo"]."'><button type='button'>Eliminar</button></a>
							</td>";
							?>
                        </tr>
                        <?php
                    }
                    ?>
		</tbody>
	</table>
</div>

</body>
</html>