<?php
session_start();
require_once("../../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
if(isset($_GET['id'])) {
	$control->cambiarOrden();
}
else {
	$_SESSION['inicio'] = 0;
	$_SESSION['pagina'] = 1;
	UNSET($_SESSION['id']);
	UNSET($_SESSION['matriz']);
}
header("Location:Inventario.php");
?>

