<?php 
	session_start();
    $_SESSION['orden'] = 'DESC';
    $_SESSION['cantidad'] = 5;
    $_SESSION['inicio'] = 0;
    $_SESSION['pagina'] = 1;
?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Inventario</title>
        <link rel = "stylesheet" href="assets/css/indexcss.css">
    </head>
    <body>
        <div id="container">
            <!-- CABECERA -->
            <header id="header">
                <div id = "logo">
                    <img src = "assets/img/SicUTP.png" alt="Logo Investigacion Utp"/> 
                    <a href="index.php">Sistema de Control de Invetario </a>
                </div>

                <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="http://localhost/Master-php/Proyecto/Vistas/Equipos/Inventario.php">Inventario</a>
                    </li>
                    <li>
                        <a href="http://localhost/Master-php/Proyecto/Vistas/usuarios/ingrese.php">Acceder</a>
                    </li>
                   
                </ul>
            </nav>                
            </header>
            
       <br>
            
                <!-- CONTENIDO CENTRAL -->
       
                <div class="slider">
                    
                    
                    
                    
                    <?php
                    
                    
                    require_once 'Vistas/component/slider.html';
                    
                    
                    ?>
                    
                    
                    
                    
                    
                </div>
             
             
             
             
             
      
            <!-- PIE DE PAGINA -->
            <br><br><br><br><br>
            <footer id="footer">
             <p>Desarrollado por el grupo 4 ISF131  &copy; <?= date('Y') ?></p>
            </footer>

        </div>
    </body>

</html>