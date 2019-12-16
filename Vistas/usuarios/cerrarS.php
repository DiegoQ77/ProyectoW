<?php
require_once '../../Controladores/controlLogin.php';
session_start();
session_destroy();
header('Location: ../../index.php');
?>
