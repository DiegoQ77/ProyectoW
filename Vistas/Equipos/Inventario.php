<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
		.manageMember {
			width: 50%;
			margin: auto;
		}

		table {
			width: 100%;
			margin-top: 20px;
		}

	</style>
</head>
<body>

<section class="principal">
<center><h1>SISTEMA DE INVENTARIO</h1></center>
<div class="manageMember">
	<a href="Agregar_Equipo.php"><button type="button">Registrar Nuevo Equipo</button></a>
	<br><br>
	<div class="formulario">
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
	</div>
	

	<div id="datos"></div>
	<a href='../../index.php'><button type='button'>Home</button></a>
	
</section>


<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>

</html>