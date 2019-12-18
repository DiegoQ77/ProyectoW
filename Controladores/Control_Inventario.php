<?php 
require_once("../../Modelos/Equipo.php");
require_once("../../Modelos/Personas.php");
require_once("../../Modelos/Sedes.php");
require_once("../../Modelos/Facultades.php");

/**
 * Esta clase se encarga de comunicarse con el modelo de Equipo, 
 * con el fin de obtener información de la Base de Datos que es
 * necesaria para el programa. 
 */
Class Control_Inventario {

	/**
	 * Esta Funcion se encarga de comunicarse con el 
	 * modelo de equipos para obtener todos los equipos 
	 * que estan presentes en la tabla de equipos
	 *
	 * @return array 
	 */
	public function obtenerListaEquipos() {
        $equipo = new Equipo();
		$result = $equipo->obtenerEquipos();
		return $result;
	}
	
	/**
	 * Esta Funcion se encarga de comunicarse con el 
	 * modelo de personas para obtener la lista de 
	 * encargados y usuarios registrados 
	 *
	 * @return array
	 */
	public function obtenerListaPersonas() {
		$persona = new Personas();
		$result = $persona->obtenerPersonas();
		return $result;
	}

	/**
	 * Esta Funcion se encarga de comunicarse con el 
	 * modelo de Sedes para obtener todas las sedes 
	 * registradas en la Base de Datos
	 *
	 * @return array
	 */
	public function obtenerListaSedes() {
		$sede = new Sedes();
		$result = $sede->obtenerSedes();
		return $result;
	}

	/**
	 * Esta Funcion se encarga de comunicarse con el 
	 * modelo de Facultades para obtener todas las
	 * facultades registradas en la Base de Datos
	 *
	 * @return array
	 */
	public function obtenerListaFacultades() {
		$facultad = new Facultades();
		$result = $facultad->obtenerFacultades();
		return $result;
	}

	/**
	 * Esta funcion se comunica con el modelo de equipos
	 * para obtener la imagen asociada a un equipo en 
	 * particular y visualizarla en la aplicación
	 *
	 * @return imagen
	 */
	public function recuperarImagen() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		$respuesta = $equipo->recuperarImagen($id);
		return $respuesta;
	}

	
	/**
	 * Esta función se encarga de pasarle toda la información
	 * introducida por el usuario al modelo para que registre 
	 * un nuevo equipo
	 *
	 * @return boolean
	 */
	public function ctlAgregarEquipo() {
		$datoscontrol = $this->armarArreglo();
		$equipo = new Equipo();
		$respuesta = $equipo->añadirEquipo($datoscontrol);
		return $respuesta;
	}

	/**
	 * Esta funcion recupera toda información de 1 equipo en
	 * especifico para desplegar sus datos en las pantallas
	 * de la aplicación 
	 *
	 * @return array
	 */
	public function recuperarEquipo() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		return $equipo->buscarEquipos($id);
	}


	/**
	 * Esta función se encarga de pasarle toda la información
	 * introducida por el usuario al modelo para que actualice
	 * el equipo que el usuario actualizó
	 *
	 * @return boolean
	 */
	public function ctlEditarEquipo() {
		$equipo = new Equipo();
		$anterior = $equipo->buscarEquipos($_POST['id']);
		$datoscontrol = $this->armarArreglo();
         $respuesta = $equipo->editarEquipo($datoscontrol, $anterior);
		return $respuesta;
	}


	/**
	 * Esta función le comunica al modelo el id del equipo que 
	 * se ha solicitado eliminar por el usuario
	 *
	 * @return boolean
	 */
	public function ctlEliminarEquipo() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		$respuesta = $equipo->eliminarEquipo($id);
		return $respuesta;
	}

	/**
	 * Esta funcion se comunica con el modelo para corregir la
	 * enumeración automatica de registros int identity de la  
	 * base de datos, ya sea cuando hubo un error, o si se 
	 * elimino un registro
	 * 
	 *
	 * @return void
	 */
	public function corregirIncremento() {
		$equipo = new Equipo();
		$equipo->corregirIncremento();
	}

		/**
		 * Esta función obtiene toda la información que el usuario 
		 * suministra a la aplicación para armar un arreglo que sera
		 * usado posteriormente por los otros métodos.
		 *
		 * @return void
		 */
	public function armarArreglo() {
		$arreglo = array(
			'codigo',
			'categoria' => $_POST['categoria'],
			'nombre' => $_POST['nombre'],
			'descripcion' => $_POST['descripcion'],
			'disponibilidad' => $_POST['disponibilidad'],
			'cantidad' => $_POST['cantidad'],
			'encargado' => $_POST['encargado'],
			'email',
			'sede' => $_POST['sede'],
			'facultad' => $_POST['facultad'],
			'imagen',
			'tipo'
		);
		if(isset($_POST['id'])) {
			$arreglo['codigo'] = $_POST['id'];
		}
		if(isset($_POST['email'])) {
			$arreglo['email'] = $_POST['email'];
		}
		if($_FILES['imagen']['error'] == 0) {
			$imagen_temporal = $_FILES['imagen']['tmp_name'];
        	$tipo = $_FILES['imagen']['type'];
        	$fp = fopen($imagen_temporal, 'r+b');
        	$data = fread($fp, filesize($imagen_temporal));
        	fclose($fp);
			$arreglo['imagen'] = $data;
			$arreglo['tipo'] = $tipo;
		}
		return $arreglo;
	}

}
?>