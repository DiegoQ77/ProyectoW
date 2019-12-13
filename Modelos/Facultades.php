<?php 
require_once("../../Modelos/Conexion.php");
class Facultades {
    public function obtenerFacultades() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT id, unidad_facultad  as facultad from unidades_facultades ORDER BY id";
        foreach ($db->query($sql) as $res) {
            $facultades[] = $res;
        }
        return $facultades;
        $db->close();
    }
}
?>