<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();

if($_POST) {
	$respuesta = $control->ctlAgregarEquipo();
	if($respuesta == 'success') {
		?><h1>Nuevo registro creado</h1>
		<h2>¿Desea Almacenar otro Equipo?</h2>
		<a href="Agregar_Equipo.php">
			<button type="button">Si</button>
		</a>
		<a href='../../Vistas/Equipos/location.php'><button type='button'>Volver al Inventario</button></a>
		<?php
	}
	else {
		$control->corregirIncremento();
		echo $respuesta;
		echo "<a href='../../Vistas/Equipos/location.php'><button type='button'>Home</button></a>";
	}
}
?>