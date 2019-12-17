<?php session_start(); 
$_SESSION['orden']='DESC' ; 
$_SESSION['cantidad']=5 ; 
$_SESSION['inicio']=0 ; 
$_SESSION['pagina']=1 ; 
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Inventario</title>
	<link rel="stylesheet" href="assets/css/indexcss.css">
</head>
<body>
	<div id="container">
		<!-- CABECERA -->
		<header id="header">
			<div id="logo">
				<img src="assets/img/SicUTP.png" alt="Logo Investigacion Utp" />
				<a href="index.php">Sistema de Control de Inventario </a>
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
						<?php if (!isset($_SESSION['usuario'])){ ?>
						<button onclick="document.getElementById('id01').style.display='block'">Iniciar Sesion</button>
						<?php } else{ ?>
						<button onclick="document.getElementById('id04').style.display='block'">Cerrar Sesion</button>
						<?php } ?>
					</li>
				</ul>
			</nav>
		</header>
		<br>
		<br>
		<br>


		<!-- CONTENIDO CENTRAL -->
		<div class="slider">
			<?php require_once 'Vistas/component/slider.html'; ?>
			<!-- PIE DE PAGINA -->
			<br>
			<br>
			<br>
			
			<footer id="footer">
				<p>Desarrollado por el grupo 4 ISF131 &copy;
					<?=date( 'Y') ?>
				</p>
			</footer>
		</div>
	</div>

	<div id="id01" class="modal">
		<div class="modal-content animate">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" id="close" class="close" title="Close Modal">&times;</span>
				<img src="assets/img/loginS.png" alt="Avatar" class="avatar">
			</div>

			<div class="container">
			<center>
				<label for="uname"><b>Username</b>
				</label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label for="psw"><b>Password</b>
				</label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button type="submit" id="login" name="submit">Login</button>
				<button type="button" onclick="document.getElementById('id01').style.display='none'">Regresar</button>
				</center>
				<div id="respuesta"></div>
			</div>
		</div>
	</div>

	<div id="id04" class="modal">
		<div class="modal-content animate">
			<div class="imgcontainer">
				<span onclick="document.getElementById('id04').style.display='none'" id="close" class="close" title="Close Modal">&times;</span>
			</div>

			<div class="container">
				<center>
					<h1>De verdad deseas Salir?</h1>
					<a href="../../Vistas/usuarios/cerrarS.php">
						<button type="button">Si</button>
					</a>
					<button type="button" onclick="document.getElementById('id04').style.display='none'">Regresar</button>
				</center>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/slider.js"></script>
	<script type="text/javascript" src="../../assets/js/inicio.js"></script>
</body>
</html>