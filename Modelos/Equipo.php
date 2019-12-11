<?php 
require_once("../Modelos/Conexion.php");
class Equipo {

    public function obtenerEquipos() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM equipos";
        foreach ($db->query($sql) as $res) {
            $equipo[] = $res;
        }
        return $equipo;
        $db->close();
    }

    public function añadirEquipo($modelodatos){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = 
         "INSERT INTO equipos (codigo,nombre,cantidad,especificaciones,disponibilidad, encargado, contacto, categoria) VALUES"
                . "('$modelodatos[codigo]' , '$modelodatos[nombre]','$modelodatos[cantidad]',"
                . "'$modelodatos[especificacion]','$modelodatos[disponibilidad]','$modelodatos[encargado]',"
                . "'$modelodatos[contacto]','$modelodatos[categoria]')";
        $db->query($sql);
        $db->close();
    }

    public function buscarEquipos($id){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT * FROM equipos WHERE codigo = {$id}";
        $result = $db->query($sql);
        $equipo = $result->fetch_assoc();
        return $equipo;
        $db->close();
    }

    public function editarEquipo($modelodatos){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "UPDATE equipos SET nombre = '$modelodatos[nombre]', cantidad = '$modelodatos[cantidad]', especificaciones = '$modelodatos[especificacion]', disponibilidad = '$modelodatos[disponibilidad]', encargado = '$modelodatos[encargado]', contacto = '$modelodatos[contacto]', categoria = '$modelodatos[categoria]'WHERE codigo = $modelodatos[id]";
        $db->query($sql);
        $db->close();
    }

    public function eliminarEquipo($id){
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "DELETE FROM equipos WHERE codigo = {$id}";
        $db->query($sql);
        $db->close();
    }
}
?>