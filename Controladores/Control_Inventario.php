<?php 
require_once("../../Modelos/Equipo.php");
require_once("../../Modelos/Personas.php");
require_once("../../Modelos/Sedes.php");
require_once("../../Modelos/Facultades.php");

Class Control_Inventario {

	public function obtenerListaEquipos() {
        $equipo = new Equipo();
		$result = $equipo->obtenerEquipos();
		return $result;
    }

	public function obtenerListaPersonas() {
		$persona = new Personas();
		$result = $persona->obtenerPersonas();
		return $result;
	}

	public function obtenerListaSedes() {
		$sede = new Sedes();
		$result = $sede->obtenerSedes();
		return $result;
	}

	public function obtenerListaFacultades() {
		$facultad = new Facultades();
		$result = $facultad->obtenerFacultades();
		return $result;
	}

	public function recuperarImagen() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		$respuesta = $equipo->recuperarImagen($id);
		return $respuesta;
	}

	public function ctlAgregarEquipo() {
		$datoscontrol = $this->armarArreglo();
		$equipo = new Equipo();
		$respuesta = $equipo->añadirEquipo($datoscontrol);
		return $respuesta;
	}

	public function recuperarEquipo() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		return $equipo->buscarEquipos($id);
	}

	public function ctlEditarEquipo() {
		$equipo = new Equipo();
		$anterior = $equipo->buscarEquipos($_POST['id']);
		$datoscontrol = $this->armarArreglo();
         $respuesta = $equipo->editarEquipo($datoscontrol, $anterior);
		return $respuesta;
	}


	public function ctlEliminarEquipo() {
		$equipo = new Equipo();
		$id = $_POST['id'];
		$respuesta = $equipo->eliminarEquipo($id);
		return $respuesta;
	}

	public function corregirIncremento() {
		$equipo = new Equipo();
		$equipo->corregirIncremento();
	}

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