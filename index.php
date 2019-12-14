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
                        <a href="../../Vistas/Equipos/location.php">Inventario</a>
                    </li>
                    <li>
                        <a href="../../Vistas/usuarios/ingrese.php">Acceder</a>
                    </li>
                   
                </ul>
            </nav>
                
                
            </header>
            
            <br><br><br><br><br>
            
          
                <!-- CONTENIDO CENTRAL -->
         
                    
                    
                            <!-- Slideshow container -->
                            
                            <!-- Incluimos la carpideta js --><input type="submit" value="" />
                            
                            <script src="assets/js/slider.js"></script>
        <div class="slideshow-container">

         <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                  <div class="numbertext">1 / 3</div>
                  <img src="assets/img/img1.jpg" style="width:100%">
                  <div class="text">Caption Text</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">2 / 3</div>
                  <img src="assets/img/img2.jpg" style="width:100%">
                  <div class="text">Caption Two</div>
                </div>

                <div class="mySlides fade">
                  <div class="numbertext">3 / 3</div>
                  <img src="assets/img/img3.jpg" style="width:100%">
                  <div class="text">Caption Three</div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
              </div>
              <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                </div>

                 



        

            <!-- PIE DE PAGINA -->
            <br><br><br><br><br>
            <footer id="footer">

                <p>Desarrollado por el grupo 4 ISF131  &copy; <?= date('Y') ?></p>
            </footer>

        </div>
    </body>



</html>