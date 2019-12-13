<?php require_once("../../Modelos/Equipo.php");
require_once("../../Modelos/Personas.php");
require_once("../../Modelos/Sedes.php");
require_once("../../Modelos/Facultades.php");


    Class Control_Inventario{

        public function obtenerListaEquipos() {
            $equipo = new Equipo();
            $inicio = $_SESSION['inicio'];
            $final= $_SESSION['cantidad'];
            $result =  $equipo->obtenerEquipos($inicio, $final);
            return $result;
    }
        public function obtenerListaPersonas(){
            $persona = new Personas();
            $result = $persona->obtenerPersonas();
            return $result;
        }

        public function obtenerListaSedes(){
            $sede = new Sedes();
            $result = $sede->obtenerSedes();
            return $result;
        }

        public function obtenerListaFacultades(){
            $facultad = new Facultades();
            $result = $facultad->obtenerFacultades();
            return $result;
            }

        public function ordenarListaEquipos() {
            $equipo = new Equipo();
            $id = $_SESSION['id'];
            $orden = $_SESSION['orden'];
            $inicio = $_SESSION['inicio'];
            $final= $_SESSION['cantidad'];
            $result =  $equipo->ordenarEquipos($id, $orden, $inicio, $final);
            return $result;
            }
        
        public function cambiarPagina(){
            if($_POST['pagina']=='anterior' && $_SESSION['pagina']>1){
                $_SESSION['inicio']=$_SESSION['inicio'] - $_SESSION['cantidad'];
                $_SESSION['pagina'] = $_SESSION['pagina'] -1;
            }
            else if($_POST['pagina']=='siguiente' && $_SESSION['cantidad'] ==$_SESSION['datos'] ){
                   $_SESSION['inicio']=$_SESSION['inicio'] + $_SESSION['cantidad'];
                   $_SESSION['pagina'] = $_SESSION['pagina'] + 1;
            }
        }
        public function cambiarCantidadEquipos(){
            $_SESSION['cantidad'] = $_POST['cantidad'];
            $_SESSION['inicio'] = 0;
            $_SESSION['pagina'] = 1;
        }

        public function filtrarListaEquipos(){
            $equipo = new Equipo();
            $consulta = $_POST['consulta'];
            $data = $_SESSION['matriz'];
            $result = array_values(array_filter($data, function ($item) use ($consulta) {
            if (stripos($item['codigo'], $consulta) !== false ||
            stripos($item['categoria'], $consulta) !== false ||
                stripos($item['nombre'], $consulta) !== false ||
                stripos($item['disponibilidad'], $consulta) !== false ||
                stripos($item['cantidad'], $consulta) !== false ||
                stripos($item['encargado'], $consulta) !== false ||
                stripos($item['email'], $consulta) !== false ||
                stripos($item['sede'], $consulta) !== false ||
                stripos($item['facultad'], $consulta) !== false) {
                return true;
            }
            return false;
            }));
            if(empty($result)){
                return "No hay Datos";
            }
            else{
                return $result;
            }
        }

        public function recuperarImagen(){
            $equipo = new Equipo();
            $id = $_GET['id'];
            $respuesta = $equipo->recuperarImagen($id);
            return $respuesta;
        }

        public function ctlAgregarEquipo(){
            $equipo = new Equipo();
            $datoscontrol = array(
                'categoria' => $_POST['categoria'],
                'nombre'=> $_POST['nombre'],
                'disponibilidad' => $_POST['disponibilidad'],
                'cantidad' => $_POST['cantidad'],
                'encargado' => $_POST['encargado'],
                'sede' => $_POST['sede'],
                'facultad' => $_POST['facultad'],
            );
           $respuesta = $equipo->añadirEquipo($datoscontrol);
           return $respuesta;
        }

        public function recuperarEquipo(){
            $equipo = new Equipo();
            $id = $_GET['id'];
            return $equipo->buscarEquipos($id);
        }

        public function ctlEditarEquipo(){
            $equipo = new Equipo();
            $datoscontrol = array(
                'id' => $_POST['id'],
                'categoria' => $_POST['categoria'],
                'nombre'=> $_POST['nombre'],
                'disponibilidad' => $_POST['disponibilidad'],
                'cantidad' => $_POST['cantidad'],
                'encargado' => $_POST['encargado'],
                'sede' => $_POST['sede'],
                'facultad' => $_POST['facultad'],
            );
            $respuesta = $equipo->editarEquipo($datoscontrol);
            return $respuesta;
        }

        public function ctlEliminarEquipo(){
            $equipo = new Equipo();
            $id = $_POST['id'];
            $respuesta = $equipo->eliminarEquipo($id);
            return $respuesta;
        }

        public function corregirIncremento(){
            $equipo = new Equipo();
            $equipo->corregirIncremento();
        }
    }
?>