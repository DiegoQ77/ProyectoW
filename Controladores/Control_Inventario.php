<?php 
require_once("../../Modelos/Equipo.php");
require_once("../../Modelos/Personas.php");
require_once("../../Modelos/Sedes.php");
require_once("../../Modelos/Facultades.php");

Class Control_Inventario {

	public function obtenerListaEquipos() {
        $equipo = new Equipo();
        $parametros = array(
            'inicio' => $_SESSION['inicio'],
            'final' => $_SESSION['cantidad'],
            'id',
            'orden'
        );
        if(isset($_SESSION['id'])){
            $parametros['id'] = $_SESSION['id'];
            $parametros['orden'] = $_SESSION['orden'];
        }
		$result = $equipo->obtenerEquipos($parametros);
		return $result;
    }

    public function obtenerCantidadEquipos() {
		$equipo = new Equipo();
		$respuesta = $equipo->RecuperarNumeroFilas();
		return $respuesta;
	}
    
    public function  cambiarOrden(){
        if($_GET['id'] == $_SESSION['id']) {
            if($_SESSION['orden'] == 'ASC') {
                $_SESSION['orden'] = 'DESC';
            }
            else {
                $_SESSION['orden'] = 'ASC';
            }
        }
        else {
            $_SESSION['orden'] = 'ASC';
            $_SESSION['id'] = $_GET['id'];
        }
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

	public function cambiarPagina() {
		if($_POST['pagina'] == 'anterior') {
			$_SESSION['inicio'] = $_SESSION['inicio'] - $_SESSION['cantidad'];
			$_SESSION['pagina'] = $_SESSION['pagina'] - 1;
		}
		else if($_POST['pagina'] == 'siguiente') {
			$_SESSION['inicio'] = $_SESSION['inicio'] + $_SESSION['cantidad'];
			$_SESSION['pagina'] = $_SESSION['pagina'] + 1;
		}
	}

	public function cambiarCantidadEquipos() {
		$_SESSION['cantidad'] = $_POST['cantidad'];
		$_SESSION['inicio'] = 0;
		$_SESSION['pagina'] = 1;
	}

	public function filtrarListaEquipos() {
		$equipo = new Equipo();
		$consulta = $_POST['consulta'];
		if(isset($_SESSION['matriz'])) {
			$data = $_SESSION['matriz'];
			$result = array_values(array_filter($data, function($item) use($consulta) {
				if(stripos($item['codigo'], $consulta) !== false ||
					stripos($item['categoria'], $consulta) !== false ||
					stripos($item['nombre'], $consulta) !== false ||
					stripos($item['disponibilidad'], $consulta) !== false ||
					stripos($item['cantidad'], $consulta) !== false ||
					stripos($item['encargado'], $consulta) !== false ||
					stripos($item['sede'], $consulta) !== false ||
					stripos($item['facultad'], $consulta) !== false) {
					return true;
				}
				return false;
			}));
		}
		if(empty($result)) {
			return "No hay Datos";
		}
		else {
			return $result;
		}
	}

	public function recuperarImagen() {
		$equipo = new Equipo();
		$id = $_GET['id'];
		$respuesta = $equipo->recuperarImagen($id);
		return $respuesta;
	}

	public function ctlAgregarEquipo() {
		if(!isset($_FILES['imagen']) || $_FILES['imagen']['error'] > 0) {
			$respuesta = "Ha ocurrido un error subiendo la imagen";
		}
		else {
			$datosimagen = $this->validarImagen();
			if(is_array($datosimagen)) {
				$datoscontrol = $this->armarArreglo();
				$datoscontrol['imagen'] = $datosimagen['imagen'];
				$datoscontrol['tipo'] = $datosimagen['tipo'];
				$equipo = new Equipo();
				$respuesta = $equipo->añadirEquipo($datoscontrol);
			}
			else {
				$respuesta = "Imagen no permitida, es un tipo de archivo prohibido o excede el tamano de $datosimagen Kilobytes.";
			}
		}
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
		if($_FILES['imagen']['error'] > 0) {
			$comparacion = array_values(array_diff($anterior, $datoscontrol));
			if(empty($comparacion)) {
				$respuesta = "No se realizo ningun cambio en los valores";
			}
			else {
                $respuesta = $equipo->editarEquipo($datoscontrol, $anterior);
			}
		}
		else {
			$datosimagen = $this->validarImagen();
			if(is_array($datosimagen)) {
				$datoscontrol['imagen'] = $datosimagen['imagen'];
				$datoscontrol['tipo'] = $datosimagen['tipo'];
				$respuesta = $equipo->editarEquipo($datoscontrol, $anterior);
			}
			else {
				$respuesta = "Imagen no permitida, es un tipo de archivo prohibido o excede el tamano de $datosimagen Kilobytes.";
			}
		}
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
		);
		if(isset($_POST['id'])) {
			$arreglo['codigo'] = $_POST['id'];
		}
		if(isset($_POST['email'])) {
			$arreglo['email'] = $_POST['email'];
		}
		return $arreglo;
	}

	public function validarImagen() {
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		$limite_kb = 1024;
		if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
			$imagen_temporal = $_FILES['imagen']['tmp_name'];
			$tipo = $_FILES['imagen']['type'];
			$fp = fopen($imagen_temporal, 'r+b');
			$data = fread($fp, filesize($imagen_temporal));
			fclose($fp);
			$datosimagen = array(
				'imagen' => $data,
				'tipo' => $tipo
			);
			return $datosimagen;
		}
		else {
			return $limite_kb;
		}
	}
}
?>