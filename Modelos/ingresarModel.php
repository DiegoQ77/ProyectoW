<?php


require_once("conexion.php");

class Usuario{  
    public function login($username, $password){ 
      $conexion = new Conexion();
      $db = $conexion->conectar();  
      $sql = "SELECT * FROM users WHERE user = '$username' AND password ='$password'";

        $result = $db->query($sql);
            $numRows = $result->num_rows;
            if($numRows == 1){
                return true;
                }
            return false;
        
    }
    
    
    
    
 
    
}


   