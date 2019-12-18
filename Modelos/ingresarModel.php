<?php
require_once("conexion.php");
/**
 * Esta clase realiza diferentes consultas sobre la base
 * de datos de usuarios
 */
class Usuario {
	/**
	 * Esta función se encarga de verificar si el usuario
	 * y contraseña estan ambos almacenados en el mismo
	 * registro de la Base de Datos
	 *
	 * @param [String] $username
	 * @param [String] $password
	 * @return boolean
	 */
	public function login($username, $password) {
		$conexion = new Conexion();
		$db = $conexion->conectar();
		$sql = "SELECT * FROM users WHERE user = '$username' AND password ='$password'";
		$result = $db->query($sql);
		$numRows = $result->num_rows;
		if($numRows == 1) {
			return true;
		}
		return false;
	}
}
?>