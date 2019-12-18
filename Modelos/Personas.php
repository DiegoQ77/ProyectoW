<?php 
require_once("../../Modelos/Conexion.php");
/**
 * Esta clase realiza diferentes consultas sobre la base
 * de datos de equipos
 */
class Personas {
    /**
	 * Esta función obtiene la información de las personas 
	 * de la base de datos y las devuelve al programa
	 * principal
	 *
	 * @return array
	 */
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