<?php 
session_start();
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
?>

<!DOCTYPE html>
<html>

<body>
	<?php 
		if(isset($_POST['cantidad'])) {
			$control->cambiarCantidadEquipos();
		}
		if(isset($_POST['pagina'])) {
			$control->cambiarPagina();
		}
		if(isset($_POST['consulta'])) {
			$datos = $control->filtrarListaEquipos();
		} 
		else {
			$datos = $control-> obtenerListaEquipos();
			$numero = $control->obtenerCantidadEquipos();
		}
		if(is_array($datos)) {
			$_SESSION['datos'] = count($datos);
			$_SESSION['matriz'] = $datos;
	 ?>
	<table border="1" cellspacing="0" cellpadding="0" id="tabla">
		<thead>
			<tr>
				<th>
					<a href='location.php?id=codigo'>Codigo</a>
				</th>
				<th>
					<a href='location.php?id=categoria'>Categoria</a>
				</th>
				<th>
					<a href='location.php?id=nombre'>Nombre</a>
				</th>
				<th>
					<a href='location.php?id=disponibilidad'>Disponibilidad</a>
				</th>
				<th>
					<a href='location.php?id=cantidad'>Cantidad</a>
				</th>
				<th>
					<a href='location.php?id=encargado'>Encargado</a>
				</th>
				<th>
					<a href='location.php?id=sede'>Sede</a>
				</th>
				<th>
					<a href='location.php?id=facultad'>Facultad</a>
				</th>
				<th>Imagen</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0 ; $i < count($datos); $i++) { ?>
			<tr>
				<td>
					<?php echo $datos[$i]['codigo']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['categoria']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['nombre']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['disponibilidad']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['cantidad']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['encargado']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['sede']; ?>
				</td>
				<td>
					<?php echo $datos[$i]['facultad']; ?>
				</td>
				<td>
					<img src="Imagenes.php?id=<?php echo $datos[$i]['codigo'];?>" width="100" height="100" />
				</td>
				<?php echo "
				<td id=oculto>
					<a href='Ver_Equipo.php?id=".$datos[$i]['codigo']. "'></a>
					<a href='Eliminar_Equipo.php?id=".$datos[$i]['codigo']. "'></a>
				</td>"; ?>
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
	<br>
	<br>
	<center>
		<?php if($_SESSION['pagina']>1){?>
		<button id='pag' value='anterior'><-</button>
		<?php } ?>
		<label for="pagina">
			<?php echo $_SESSION['pagina']?>
		</label>
		<?php if(($_SESSION['pagina'] * $_SESSION['cantidad'])<$numero){ ?>
		<button id='pag' value='siguiente'>-></button>
		<?php } ?>
	</center>
	<br>
	<a href='../../index.php'>
		<button type='button'>Home</button>
	</a>
	
</body>

</html>