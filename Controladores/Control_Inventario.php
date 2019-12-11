<?php require_once("../Modelos/Equipo.php");

    Class Control_Inventario{

        public function obtenerListaEquipos() {
            $equipo = new Equipo();
            return $equipo->obtenerEquipos();
    }
        public function ordenarListaEquipos() {
            $equipo = new Equipo();
            $id = $_GET['id'];
            return $equipo->ordenarEquipos($id);
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