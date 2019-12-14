<?php
require_once '../Controladores/controlLogin.php';


session_start();
if(isset($_SESSION['usuario'])){
    session_destroy();
    echo "destruido";
    header('Location: http://localhost/Master-php/Login/');
}
else{
    echo "no llego";
    
}

