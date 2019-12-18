<?php 
/**
 * Esta clase se encarga de hacer la comunicación con la base de 
 * datos de MySQL
 */
class Conexion {
    /**
     * Esta función lleva a cabo el proceso de conectarse a la base
     * de datos
     *
     * @return void
     */
    public function conectar(){
        try{
            $db = new mysqli("localhost", "root", "", "bdutpequipos");
            return $db;
        }
        catch (Exception $e) {
            echo "Error en " . $e->getMessage() . $e->getLine();
        }
    }
}
?>