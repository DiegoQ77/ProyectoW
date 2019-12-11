<?php 
	require_once("../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

if($_POST) {
	$control->ctlAgregarEquipo();
		echo "<p>Nuevo registro creado..</p>";
		echo "<a href='../Vistas/Inventario.php'><button type='button'>Home</button></a>";
	} 

?>