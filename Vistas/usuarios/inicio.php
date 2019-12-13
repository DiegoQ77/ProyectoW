<?php
require_once '../../Controladores/Control_usuario.php';

$user = new Iniciar();



if($_POST['submit']){

$username = $_POST['username'];
$password = $_POST['password'];


$user->entrar($username,$password);




}else{
        echo 'No se recibio nada';
    }
    
