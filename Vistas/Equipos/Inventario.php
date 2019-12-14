<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" href="../../assets/css/inventario.css">
</head>
<body>

<section class="principal">
<center><h1>SISTEMA DE INVENTARIO</h1></center>	<br><br>
<div class="manageMember">
	<a href="Agregar_Equipo.php"><button type="button">Registrar Nuevo Equipo</button></a>
	<br><br>
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>
		<label for="filas">Numero de Filas: </label>
		<select name="eleccion" id="eleccion">
		<option selected hidden><?php echo $_SESSION['cantidad']?></option>
		<option>5</option>
		<option>10</option>
		<option>15</option>
		<option>20</option>
		<option>25</option>
		</select>
	
	<br><br><br>
	<div id="datos"></div>
	</div>
</section>


<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/js/inventario.js"></script>
</body>

</html>