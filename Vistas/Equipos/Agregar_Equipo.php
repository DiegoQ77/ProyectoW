<?php 
	require_once("../../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();
	$personas = $control->obtenerListaPersonas();
	$sedes = $control->obtenerListaSedes();
	$facultades = $control->obtenerListaFacultades();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar Equipo</title>

	<style type="text/css">
		fieldset {
			margin: auto;
			margin-top: 100px;
			width: 50%;
		}

		table tr th {
			padding-top: 10px;
			padding-bottom: 10px;
        }
        
        table td {
			padding-top: 10px;
			padding-bottom: 10px;
		}
		textarea{
			width:300px;
			height:100px;
		}
	</style>

</head>
<body>

<fieldset>
	<legend>Agregar</legend>

	<form action="Creado.php" method="post" enctype="multipart/form-data">
		<table cellspacing="0" cellpadding="0">	
			<tr>
				<th>Categoria: </th>
				<td><input type="text" name="categoria" required/></td>
			</tr>	
			<tr>
				<th>Nombre: </th>
				<td><input type="text" name="nombre"  required/></td>
			</tr>
			<tr>
			<tr>
				<th>Descripcion: </th>
				<td><textarea name="descripcion" required></textarea>
			</tr>
			<tr>
				<th>Disponibilidad: </th>
				<td><select name="disponibilidad" required>
						<option selected hidden></option>
						<option>Si</option>
						<option>No</option>
				</select></td>
			</tr>
			<tr>
				<th>Cantidad: </th>
				<td><input type="number" name="cantidad" required/></td>
			</tr>	
			<tr>
			<th>Encargado: </th>
				<td><select name="encargado" required>
						<option selected hidden></option>
						<?php 
						if(is_array($personas)){
						for ($i = 0; $i < count($personas); $i++) {	
							?>
						<option value="<?php echo $personas[$i]["id"]?>"><?php echo $personas[$i]["id"] ." - ".$personas[$i]["encargado"]; ?></option>
						<?php 
						}
					}
					else{
						echo "NO HAY DATOS";
					}
						?>
				</select></td>
			</tr>
			<tr>
				<th>Sede: </th>
				<td><select name="sede" required>
						<option selected hidden></option>
						<?php 
						if(is_array($sedes)){
						for ($i = 0; $i < count($sedes); $i++) {	
							?>
						<option value="<?php echo $sedes[$i]["id"]?>"><?php echo $sedes[$i]["id"] ." - ".$sedes[$i]["sede"]; ?></option>
						<?php 
						}
					}
					else{
						echo "NO HAY DATOS";
					}
						?>
				</select></td>
			</tr>
			<tr>
				<th>Facultad: </th>
				<td><select name="facultad" required>
						<option selected hidden></option>
						<?php 
						if(is_array($facultades)){
						for ($i = 0; $i < count($facultades); $i++) {	
							?>
						<option value="<?php echo $facultades[$i]["id"]?>"><?php echo $facultades[$i]["id"] ." - ".$facultades[$i]["facultad"]; ?></option>
						<?php 
						}
					}
					else{
						echo "NO HAY DATOS";
					}
						?>
				</select></td>
			</tr>
			<tr>
				<th>Imagen: </th>
    			<td><input type="file" name="imagen" id="imagen" required/></td>
			</tr>
			<tr>
				<td><button type="submit">Guardar</button></td>
				<td><a href="Inventario.php"><button type="button">Back</button></a></td>
			</tr>
		</table>
	</form>

</fieldset>

</body>
</html>