<?php 
	require_once("../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

if($_POST) {
	$control->ctlEliminarEquipo();
		echo "<p>Equipo Eliminado</p>";
		echo "<a href='../Vistas/Inventario.php'><button type='button'>Home</button></a>";
	} 

?>