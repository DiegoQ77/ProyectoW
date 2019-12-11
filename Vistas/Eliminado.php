<?php 
	require_once("../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

	if($_POST) {
		$respuesta = $control->ctlEliminarEquipo();
		if($respuesta == 'success'){
			echo "<p>Equipo Eliminado..</p>";
			echo "<a href='../Vistas/Inventario.php'><button type='button'>Home</button></a>";
		}
		else{
			echo "El manejador de Base de Datos ha arrojado el siguiente error: <br>".$respuesta ;
			echo "<br><a href='../Vistas/Inventario.php'><button type='button'>Home</button></a>";
		}
		} 
?>