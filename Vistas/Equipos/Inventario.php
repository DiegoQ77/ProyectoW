<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>	

<link rel = "stylesheet" href="../../assets/css/inventariocss.css">
</head>

<body>

    
    
    <header id="header">
                <div id = "logo">
                    <img width="300px" src = "../../assets/img/SicUTP.png" alt="Logo Investigacion Utp"/>
                    <a href="index.php">Sistema de Control de Invetario </a>
                </div>

                <nav id="menu">
                <ul>
                    <li>
                        <a href="../../index.php">Home</a>
                    </li>
                    <li>
                        <a href="../../Vistas/Equipos/location.php">Inventario</a>
                    </li>
                    <li>
                    <?php if(!isset($_SESSION['usuario'])){
                        ?>
                    <button onclick="document.getElementById('id01').style.display='block'">Iniciar Sesion</button>
                    <?php
                    }
                    else{
                        ?>
                        <button onclick="document.getElementById('id04').style.display='block'">Cerrar Sesion</button>
                    <?php
                } 
                ?> 
                        <link rel = "stylesheet" href="../../assets/css/popInventario.css">  
                    </li>
                </ul>
                    
            </nav>             
            </header>

    
    
<section class="principal">

<div class="manageMember">
    
    <div class="alinear">
        
        
    
	
        
        <div>
        <label for="filas">Numero de Filas: </label>

                <select name="eleccion" id="eleccion">     
		<option selected hidden><?php echo $_SESSION['cantidad']?></option>
		<option>5</option>
		<option>10</option>
		<option>15</option>
		<option>20</option>
		<option>25</option>
		</select>
        
        
        
        </div>
        
        
      
        <div>
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>
                
        </div>      
                
           
           <?php if(isset($_SESSION['usuario'])){
		?>
        <div>
            
     
		
                
                
                
                <a href="Agregar_Equipo.php">
            <button type="button">Registrar Nuevo Equipo</button></a>
	
           </div>  
        
        <?php
	}
	?>
	
        </div>         
                        
                
	<br><br><br>
        <div id="datos">
            
        
        </div>
	</div>
</section>

    
    
    
    
    
    
    
    
    <div id="id01" class="modal">
  
  <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" id="close" class="close" title="Close Modal">&times;</span>
    
    
      <div class="logoA">
      <img src="../../assets/img/loginS.png" alt="Avatar" class="avatar">
      </div> 
    
    
    
    </div>
    <div class="container">
        <label for="uname"><b>Username</b></label><br>
      <input type="text" placeholder="Enter Username" name="username" required><br><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="password" required><br><br>
      
      
      <div class="boton2">
          
      
      
      <button type="submit" id="login" name="submit">Login</button>
     
      </div>
      
      <div id="respuesta">
          
      </div>
    </div>
</div>
</div>
    
    
    
    
 <div id="id04" class="modal">
  
  <div class="modal-content animate">
      
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" id="close" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <center><h1>De verdad deseas Salir?</h1>
      <a href="../../Vistas/usuarios/cerrarS.php"><button type = "button">Si</button></a>
      <button type="button" onclick="document.getElementById('id04').style.display='none'">Regresar</button></center>
    </div>
      
</div>   
    
    

    
    
    
<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/js/slider.js"></script>
<script type="text/javascript" src="../../assets/js/inventario.js"></script>

  
</body>

</html>