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
                       
                        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Iniciar Seccion</button>
                       
                       <link rel = "stylesheet" href="assets/css/popcss.css">
                        
                        
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
        
        
        
        
       <!-- Aqui Empieza el POPUP mas conocido como Modal --> 
        
        
        <div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="assets/img/loginS.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>

    </div>

   
  </form>
</div>
    
    
    
    <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
        
        
        
        
        <!-- Aqui termina--> 
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </body>

</html>