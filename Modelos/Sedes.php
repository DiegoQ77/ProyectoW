<?php 
require_once("../../Modelos/Conexion.php");
class Sedes {
    public function obtenerSedes() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT id, sede  from sedes";
        foreach ($db->query($sql) as $res) {
            $sedes[] = $res;
        }
        return $sedes;
        $db->close();
    }
}
?>