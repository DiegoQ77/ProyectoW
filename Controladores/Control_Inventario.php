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
            else if($_POST['pagina']=='siguiente'){
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
            $id = $_SESSION['id'];
            $orden = $_SESSION['orden'];
            $consulta = $_POST['consulta'];
            $inicio= $_SESSION['inicio'];
            $final= $_SESSION['cantidad'];
            $respuesta = $equipo->filtrarEquipos($consulta, $inicio,$final,$id,$orden);
            return $respuesta;
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

        public function recuperarEquipo($id){
            $equipo = new Equipo();
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