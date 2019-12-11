<?php


class UsuarioControler{
    
    public function mostraTodos(){
        require_once '../models/Usuario.php';
        
        $usuario = new Usuario();
        
        $todos_los_usuarios = $usuario -> conseguirTodos();
        require_once '../views/usuarios/mostrar-todos.php';
        
        
        
    }
    
    public function crear(){
        
        
    }
    
    
    
    
}