<?php
require_once("../../Modelos/ingresarModel.php");

/**
 * Esta clase se encarga de controlar el proceso de login
 * del usuario a la aplicación.
 */
Class Iniciar {

	/**
	 * Esta función recibe el nombre de usuario y contraseña
	 * y se los envia al modelo para verificar si el usuario
	 * esta o no registrado
	 *
	 * @param [String] $username
	 * @param [String] $password
	 * @return String
	 */
	public function entrar($username, $password) {
		if(empty($username) || empty($password)) {
			$b = "Nombre de usuario o contraseña vacio";
			return $b;
		}
		else {
			$user = new Usuario();
			if($user->login($username, $password)) {
				session_start();
				$nameU = $_SESSION['usuario'] = $username;
				return 'success';
			}
			else {
				$b = 'Usuario o contraseña incorrectos';
				return $b;
			}
		}
	}
}