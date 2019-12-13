<?php require_once("../../Modelos/Equipo.php");

    Class Control_Inventario{

        public function obtenerListaEquipos() {
            $equipo = new Equipo();
            $inicio = $_SESSION['inicio'];
            $final= $_SESSION['cantidad'];
            return $equipo->obtenerEquipos($inicio, $final);
    }
        public function ordenarListaEquipos() {
            $equipo = new Equipo();
            $id = $_SESSION['id'];
            $orden = $_SESSION['orden'];
            $inicio = $_SESSION['inicio'];
            $final= $_SESSION['cantidad'];
            return $equipo->ordenarEquipos($id, $orden, $inicio, $final);
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
                stripos($item['nombre'], $consulta) !== false ||
                stripos($item['cantidad'], $consulta) !== false ||
                stripos($item['especificaciones'], $consulta) !== false ||
                stripos($item['disponibilidad'], $consulta) !== false ||
                stripos($item['encargado'], $consulta) !== false ||
                stripos($item['contacto'], $consulta) !== false ||
                stripos($item['categoria'], $consulta) !== false) {
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

        public function ctlAgregarEquipo(){
            $equipo = new Equipo();
            $datoscontrol = array(
                'nombre'=> $_POST['nombre'],
                'cantidad' => $_POST['cantidad'],
                'especificacion' => $_POST['especificacion'],
                'disponibilidad' => $_POST['disponibilidad'],
                'encargado' => $_POST['encargado'],
                'contacto' => $_POST['contacto'],
                'categoria' => $_POST['categoria']
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
                'nombre'=> $_POST['nombre'],
                'cantidad' => $_POST['cantidad'],
                'especificacion' => $_POST['especificacion'],
                'disponibilidad' => $_POST['disponibilidad'],
                'encargado' => $_POST['encargado'],
                'contacto' => $_POST['contacto'],
                'categoria' => $_POST['categoria']
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
    }
?>