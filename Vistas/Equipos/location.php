<?php
session_start();
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
header("Location:Inventario.php");
?>

