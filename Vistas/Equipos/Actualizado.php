<?php 
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$control->ctlEditarEquipo(); 
header("Location:Inventario.php");
?>