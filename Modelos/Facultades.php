<?php 
require_once("../../Modelos/Conexion.php");
/**
 * Esta clase realiza diferentes consultas sobre la base
 * de datos de equipos
 */
class Facultades {
    /**
	 * Esta función obtiene la información de las facultades
	 * de la base de datos y las devuelve al programa
	 * principal
	 *
	 * @return array
	 */
    public function obtenerFacultades() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $sql = "SELECT id, unidad_facultad  as facultad from unidades_facultades ORDER BY id";
        foreach ($db->query($sql) as $res) {
            $facultades[] = $res;
        }
        if(empty($facultades)){
            return "No hay Datos";
        }
        else{
            return $facultades;
        }
        $db->close();
    }
}
?>