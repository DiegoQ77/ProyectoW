<?php
session_start();
if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
    if($_SESSION['orden'] == 'ASC'){
        $_SESSION['orden'] = 'DESC';
    }
    else{
        $_SESSION['orden'] = 'ASC';
    }
    
 }
else{
    $_SESSION['inicio'] = 0;
    $_SESSION['pagina'] = 1;
}
 header("Location:Inventario.php");
?>

