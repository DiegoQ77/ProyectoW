<?php


require_once 'Conexion.php';

class Usuario{
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $permiso;
    
    
    
    function getPermiso() {
        return $this->permiso;
    }

    function setPermiso($permiso) {
        $this->permiso = $permiso;
    }
   
    
    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        
        
        
        return $this->password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }


    
    
    //Funcion para comprobar login
   
    public function login(){
        $result = false;
        $usuario = $this->usuario;
        $password = $this->password;
        //Comprobamos si existe el usuario en proceso ya lo termino
        $sql = "SELECT  FROM usuarios WHERE usuario = $usuario";
    }
    
    
}