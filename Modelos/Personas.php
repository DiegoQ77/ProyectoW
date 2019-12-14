<?php 
require_once("../../Modelos/Conexion.php");
class Personas {
    public function obtenerPersonas() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT id, full_name  as encargado from personas";
        foreach ($db->query($sql) as $res) {
            $personas[] = $res;
        }
        if(empty($personas)){
            return "No hay Datos";
        }
        else{
            return $personas;
        }
        $db->close();
    }
}
?>