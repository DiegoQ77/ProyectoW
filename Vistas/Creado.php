<?php 
	require_once("../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();

if($_POST) {
	$control->ctlAgregarEquipo();
?>


<!DOCTYPE>
<html>
  <head>
  </head>
  <body>
      
      asdddd
      
      
      
      
      
      
      
  </body>
</html>

<?php


		echo "<p>Nuevo registro creado..</p>";
		echo "<a href='../Vistas/Inventario.php'><button type='button'>Regeresar al menu inicial</button></a>";
	} 

?>