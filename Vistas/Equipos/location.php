<?php
session_start();
if(isset($_GET['id'])){
    if($_GET['id']==$_SESSION['id']){
    if($_SESSION['orden'] == 'ASC'){
        $_SESSION['orden'] = 'DESC';
    }
    else{
        $_SESSION['orden'] = 'ASC';
    }
}
else{
    $_SESSION['orden'] = 'ASC';
    $_SESSION['id'] = $_GET['id'];
}

 }
else{
    $_SESSION['inicio'] = 0;
    $_SESSION['pagina'] = 1;
    UNSET($_SESSION['id']);
}
 header("Location:Inventario.php");
?>

