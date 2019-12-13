<?php
	require_once("../../Controladores/Control_Inventario.php");
    $control = new Control_Inventario();
    $datos = $control->recuperarImagen();
    $imagen = $datos['imagen'];

    header("Content-type: image/jpg");

echo $imagen;


?>