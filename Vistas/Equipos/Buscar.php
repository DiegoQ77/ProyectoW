<?php 
	session_start();
	require_once("../../Controladores/Control_Inventario.php");
	$control = new Control_Inventario();
?>

<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    
    
    <link rel = "stylesheet" href="../../assets/css/inventario.css">
    
    
    
    
    
<body>
	<?php
	if(isset($_POST['cantidad'])){
		$control->cambiarCantidadEquipos();
	}
	if(isset($_POST['pagina'])){
		$control->cambiarPagina();
	}
    if (isset($_POST['consulta'])){
		$datos = $control->filtrarListaEquipos();
	}
	else if(!empty($_SESSION['id'])){
		$datos = $control->ordenarListaEquipos();
	}
	 else{
		$datos = $control->obtenerListaEquipos();
	 }
	 if(is_array($datos)){
		$_SESSION['datos'] = count($datos);
		$_SESSION['matriz'] = $datos;
		 ?>
    
    
    
		<table border="1px" id = "tabla">
		<thead>
			<tr>
				<th><a href = 'location.php?id=codigo'>Codigo</a></th>
				<th><a href = 'location.php?id=categoria'>Categoria</a></th>
				<th><a href = 'location.php?id=nombre'>Nombre</a></th>
				<th><a href = 'location.php?id=disponibilidad'>Disponibilidad</a></th>
				<th><a href = 'location.php?id=cantidad'>Cantidad</a></th>
				<th><a href = 'location.php?id=encargado'>Encargado</a></th>
				<th><a href = 'location.php?id=sede'>Sede</a></th>
				<th><a href = 'location.php?id=facultad'>Facultad</a></th>
				<th>Imagen</th>
			</tr>
		</thead>
		<tbody>
		<?php
	for ($i = 0; $i < count($datos); $i++) {
		?>
		<tr>
			<td><?php echo $datos[$i]["codigo"]; ?></td>
			<td><?php echo $datos[$i]["categoria"]; ?></td>
			<td><?php echo $datos[$i]["nombre"]; ?></td>
			<td><?php echo $datos[$i]["disponibilidad"]; ?></td>
			<td><?php echo $datos[$i]["cantidad"]; ?></td>
			<td><?php echo $datos[$i]["encargado"]; ?></td>
			<td><?php echo $datos[$i]["sede"]; ?></td>
			<td><?php echo $datos[$i]["facultad"]; ?></td>
			<td><img src="Imagenes.php?id=<?php echo $datos[$i]["codigo"];?>" width="100" height="100"/></td>
			<?php echo"
			<td id=oculto>
			<a href='Ver_Equipo.php?id=".$datos[$i]["codigo"]."'></a>
			<a href='Eliminar_Equipo.php?id=".$datos[$i]["codigo"]."'></a>
			</td>";
			?>
		</tr>
		<?php
		}
	}
		else{
			echo "NO HAY DATOS JAJA SALU2";
		}
		
?>

</tbody>
</table><br><br>

<style>
.button2 {
  background-color: #2a479e;
  border: none;
  width: 24px;
  color: white;
  padding: 8px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 9px 56px;
  cursor: pointer;
 font: 150% sans-serif;
 
}

.button3{
     background-color: #2a479e;
  border: none;
  color: white;
  padding: 8px 11px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin:  14px 630px ;
  cursor: pointer;
 font: 150% sans-serif;
 width: 100px;
    
    
}




</style>


<center>
        <button class="button2" id='pag' value='anterior'><</button>
<label for = "pagina"><?php echo $_SESSION['pagina']?></label>
<button  class="button2" value='siguiente'> ></button></center><br>



<a href='../../index.php'>
    
        <button class="button3"  type='button'>Home</button></a>

</body>


<br>

            <footer id="footer">
                <p>Desarrollado por el grupo 4 ISF131  &copy; <?= date('Y') ?></p>
            </footer>




</html>