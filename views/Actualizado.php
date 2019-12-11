<?php 
	require_once("../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

if($_POST) {
	$control->ctlEditarEquipo();
		echo "<p>Equipo Actualizado</p>";
		echo "<a href='../Vistas/Inventario.php'><button type='button'>Home</button></a>";
	} 

?>