<?php
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$datos = $control->recuperarImagen();
$imagen = $datos['imagen'];
$tipo = $datos['tipo_imagen'];
header("Content-type: ",$tipo);
echo $imagen;
?>