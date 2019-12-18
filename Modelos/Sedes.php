<?php 
require_once("../../Modelos/Conexion.php");
/**
 * Esta clase realiza diferentes consultas sobre la base
 * de datos de equipos
 */
class Sedes {
    /**
	 * Esta función obtiene la información de las sedes
	 * de la base de datos y las devuelve al programa
	 * principal
	 *
	 * @return array
	 */
    public function obtenerSedes() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT id, sede  from sedes";
        foreach ($db->query($sql) as $res) {
            $sedes[] = $res;
        }
        if(empty($sedes)){
            return "No hay Datos";
        }
        else{
            return $sedes;
        }
        $db->close();
    }
}
?>