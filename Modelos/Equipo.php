<?php 
require_once("../../Modelos/Conexion.php");
/**
 * Esta clase realiza diferentes consultas sobre la base
 * de datos de equipos
 */
class Equipo {

	/**
	 * Esta función obtiene la información de los equipos 
	 * de la base de datos y las devuelve al programa
	 * principal
	 *
	 * @return array
	 */
	public function obtenerEquipos() {
		$conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT codigo, categoria, nombre,disponibilidad, cantidad,full_name AS encargado, s.sede as sede, unidad_facultad as facultad FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id INNER JOIN user_persona up on up.id_user = p.id INNER JOIN users u on up.id_user = u.id ORDER BY codigo";
		foreach($db->query($sql) as $res) {
			$equipo[] = $res;
		}
		if(empty($equipo)) {
			return false;
		}
		else {
			return $equipo;
		}
		$db->close();
    }
    
	/**
	 * Esta función obtiene la imagen de un determinado
	 * equipo de la Base de Datos y la devuelve al 
	 * programa principal
	 *
	 * @param [int] $id
	 * @return imagen
	 */
	public function recuperarImagen($id) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "SELECT imagen, tipo_imagen FROM equipos WHERE codigo = $id";
		$resultado = $db->query($sql);
		$datos = mysqli_fetch_assoc($resultado);
		if(empty($datos)) {
			return "No hay Datos";
		}
		else {
			return $datos;
		}
	}

	/**
	 * Esta función inserta directamente en la Base de Datos 
	 * los valores que el usuario lleno en el formulario de 
	 * agregar equipos
	 */
	public function añadirEquipo($modelodatos) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$modelodatos['imagen'] = mysqli_real_escape_string($db, $modelodatos['imagen']);
		$sql = "INSERT INTO equipos (categoria,nombre,descripcion,disponibilidad,cantidad,encargado,sede,facultad,imagen,tipo_imagen, created_at, updated_at) VALUES('$modelodatos[categoria]','$modelodatos[nombre]','$modelodatos[descripcion]','$modelodatos[disponibilidad]','$modelodatos[cantidad]','$modelodatos[encargado]','$modelodatos[sede]','$modelodatos[facultad]', '$modelodatos[imagen]','$modelodatos[tipo]', current_timestamp(), current_timestamp())";
		if($db->query($sql) === TRUE) {
			return 'success';
		}
		else {
			return $db->error;
		}
		$db->close();
	}

	/** 
	* Esta función busca en la Base de Datos la información
	* de un equipo en particular y la devuelve al programa
	* principal
	*/
	public function buscarEquipos($id) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "SELECT codigo, categoria, nombre,disponibilidad, descripcion, cantidad,full_name AS encargado, email, s.sede as sede, unidad_facultad as facultad FROM equipos e LEFT JOIN sedes s ON e.sede = s.id LEFT JOIN unidades_facultades uf ON e.facultad = uf.id LEFT JOIN personas p  ON e.encargado = p.id INNER JOIN user_persona up on up.id_user = p.id INNER JOIN users u on up.id_user = u.id  WHERE codigo = {$id}";
		$result = $db->query($sql);
		$equipo = $result->fetch_assoc();
		return $equipo;
		$db->close();
	}


	/**
	 * Esta función actualiza los valores de un determinado 
	 * equipo en la Base de Datos de acuaerdo a lo que el 
	 * usuario cambio en editar equipos
	 */

	public function editarEquipo($modelodatos, $anterior) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "UPDATE equipos SET nombre = '$modelodatos[nombre]', descripcion = '$modelodatos[descripcion]', cantidad = '$modelodatos[cantidad]', disponibilidad = '$modelodatos[disponibilidad]', categoria = '$modelodatos[categoria]', updated_at = current_timestamp()";
		if($modelodatos['encargado'] != $anterior['encargado']) {
			$sql = "{$sql} , encargado = '$modelodatos[encargado]'";
		}
		if($modelodatos['sede'] != $anterior['sede']) {
			$sql = "{$sql} , sede = '$modelodatos[sede]'";
		}
		if($modelodatos['facultad'] != $anterior['facultad']) {
			$sql = "{$sql} , facultad = '$modelodatos[facultad]'";
		}
		if(isset($modelodatos['imagen']) && isset($modelodatos['tipo'])) {
			$modelodatos['imagen'] = mysqli_real_escape_string($db, $modelodatos['imagen']);
			$sql = "{$sql} , imagen = '$modelodatos[imagen]' , tipo_imagen = '$modelodatos[tipo]'";
		}
		$sql = "{$sql} WHERE codigo = '$modelodatos[codigo]'";
		if($db->query($sql) === TRUE) {
			return 'success';
		}
		else {
			return $db->error;
		}
		$db->close();
	}

	/**
	 * Esta funcion se encargar de eliminar de la Base de Datos
	 * el registro que corresponda al id que recibio en el 
	 * parametro
	 *
	 * @param [int] $id
	 * @return boolean
	 */
	public function eliminarEquipo($id) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "DELETE FROM equipos WHERE codigo = {$id}";
		if($db->query($sql) === TRUE) {
			return 'success';
		}
		else {
			return $db->error;
		}
		$db->close();
	}

	/**
	 * Esta función obtiene la ultima fila de la tabla
	 * y le asigna el ultimo valor de autoincremento en 
	 * ella para corregir la incorrecta enumeración
	 *
	 * @return void
	 */
	public function corregirIncremento() {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "SELECT * FROM equipos ORDER BY codigo DESC LIMIT 0,1";
		$resp = $db->query($sql);
		while($row = mysqli_fetch_assoc($resp)) {
			$ultimo_id = $row['codigo'];
		}
		if(isset($ultimo_id)){
			$sql = "ALTER TABLE equipos AUTO_INCREMENT = $ultimo_id";
			$db->query($sql);
		}
		$db->close();
	}
}
?>