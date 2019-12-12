<?php 
	require_once("../../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

	if($_POST) {
		$respuesta = $control->ctlAgregarEquipo();
		if($respuesta == 'success'){
			echo "<p>Nuevo registro creado..</p>";
			echo "<a href='../../Vistas/Equipos/Inventario.php'><button type='button'>Home</button></a>";
		}
		else{
			echo "El manejador de Base de Datos ha arrojado el siguiente error: <br>".$respuesta ;
			echo "<a href='../../Vistas/Equipos/Inventario.php'><button type='button'>Home</button></a>";
		}
	} 

?>