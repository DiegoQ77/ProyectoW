<?php

require_once '../../Controladores/controlLogin.php';

if($_POST['submit']){
$username = $_POST['username'];
$password = $_POST['password'];
var_dump($password);
$user = new Iniciar();
$resp = $user->entrar($username,$password);
var_dump($resp);

}else{
        echo 'No se recibio nada';
    }
    

?>



<a href="../../Vistas/usuarios/cerrarS.php">cerrar sesion</a>

