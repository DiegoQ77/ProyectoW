<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
if($_POST) {
	$respuesta = $control->ctlEliminarEquipo();
	$control->corregirIncremento();
	header("Location:Inventario.php");
}
?>