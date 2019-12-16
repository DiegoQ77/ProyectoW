<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();

if($_POST) {
	$respuesta = $control->ctlEditarEquipo();
	if($respuesta == 'success') {
		echo "<p>Datos Actualizados..</p>";
		echo "<a href='../../Vistas/Equipos/location.php'><button type='button'>Home</button></a>";
	}
	else {
		$control->corregirIncremento();
		echo $respuesta;
		echo "<a href='../../Vistas/Equipos/location.php'><button type='button'>Home</button></a>";
	}
}
?>