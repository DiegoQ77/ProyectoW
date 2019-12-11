<?php 
class Conexion {
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