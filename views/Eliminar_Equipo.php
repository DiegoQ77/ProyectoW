<?php 

require_once("../Controladores/Control_Inventario.php");
$control = new Control_Inventario();
$data = $control->recuperarEquipo($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Eliminar Equipo</title>
</head>
<body>

<h3>De verdad quieres eliminar?</h3>
<form action="Eliminado.php" method="post">

	<input type="hidden" name="id" value="<?php echo $data['codigo'] ?>" />
	<button type="submit">Eliminar</button>
	<a href="Inventario.php"><button type="button">Back</button></a>
</form>

</body>
</html>