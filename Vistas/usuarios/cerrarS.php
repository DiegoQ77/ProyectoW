<?php
require_once '../../Controladores/controlLogin.php';


session_start();
if(isset($_SESSION['usuario'])){
    session_destroy();
    echo "destruido";
}
else{
    echo "no llego";
    
}
header('Location: ../../index.php');
?>
