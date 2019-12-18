<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();

if($_POST) {
	$respuesta = $control->ctlAgregarEquipo();
	header("Location:Inventario.php");
	}
?>