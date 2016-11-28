
<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1,minimun-scale=1">
	<title>Proyecto</title>
	<link rel="stylesheet"  href="css/fontello.css">
	<link rel="icon" type="image/png" href="img/icono.png" />


	<link rel="stylesheet"  href="css/estilo.css">
	<link rel="stylesheet"  href="css/log.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/fonts/glyphicons-halflings-regular.svg">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
	<script type="text/javascript" src="bootstrap/validator/js/validator.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/validacion.js"></script>
	<script type="text/javascript">
	function Abrir(){
		$(".ventana").slideDown("slow");
	}
	function cerrar(){
    $(".ventana").slideUp('slow');
	}

	</script>
</head>
<body>
<!--Primero en  movil despues para escritorio.
1.Seccion header para encabezado
2.dentro de header un div como contenedor
3.checbox para activar menu con id menu-bar
4.label como etiqueta
-->
	<header>
		<div class="contenedor">
			<img id="img-icono"src="img/shool2.svg"/>

			<input type="checkbox" id="menu-bar">
			<!-- input con checbox con id menu-bar-->
			<label class="icon-menu" for="menu-bar"></label>
			<!--nav que va contener menus disponibles otra opcion es con listas UL o OL-->

			<nav class="menu">
				<a href="">Inicio</a>
				<a href="">Oferta Educativa</a>
				<a href="javascript:Abrir()">Login</a>
				<a href="">Mision y vision</a>
        <a href="">Contacto</a>
			</nav>

			<div class="ventana">


				 <div  id="login">

	      <div id="cerrar"><a href="javascript:cerrar()">X</a></div>

		 	<!--	<form action="vistas/usuario.php" method="POST" id="formulario">-->



        	<form data-toggle="validator" class="form-horizontal" method="POST" id="formulario" action="php/login.php" >


     <div  id="formu">
							<div class="form-group  has-feedback"><h4><strong>Usuario</strong></h4><div class="col-sm-12" class="input-group">
									<input type="text" class="form-control" placeholder="Usuario" pattern="[A-Za-z ]+" id="user" name="usuario"
									 data-error="Ingrese solo letras" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								</div><div class="help-block with-errors"></div>
							</div>

							<div class="form-group  has-feedback"><h4><strong>password</strong></h4><div class="col-sm-12" class="input-group">

									<input type="password" class="form-control" placeholder="Apellido" pattern="^[_A-z0-9]{1,}$" maxlength="15" id="pass" name="password"
									 data-error="Ingrese solo letras" required><span class="glyphicon form-control-feedback" aria-hidden="true"></span>
								</div><div class="help-block with-errors"></div>
							</div>
             <center>
							<div class="form-group">
 							 <div class="col-sm-12 "> <button type="button" class="btn btn-danger" id="enviar">iniciar Sesion</button>

							 </div> </div>
						 </center>

								<p id="aviso" style="color: red;"></p>
						</div>
						</br>

						</form>










		 	</div> <!-- end login -->

		</div>


		</div>
	</header>
	<main>
		<section id="banner">
			<img src="img/f1.jpg">

			<div class="contenedor">
				<h2>!</h2>
				<p>Tu mejor Opcion?</p>
				<a href="">Ver mas</a>
			</div>
		</section>
			<section id="bienvenidos">

			</section>
			<section id="blog">

				<div class="contenedor">
					<article>
					 <p>
					 	 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					 </p>
					</article>
					<article>
					 <p>
					 	 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					 </p>
					</article>

				</div>
			</section>
		    <section id="info">

					<article>
					 <p>
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					 </p>
					</article>
					<article>
					 <p>
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					 </p>
					</article>
					<!--
		    	<div class="info-pet">
		    		<img src="img/int1.jpg">
		    		<h4>Eze</h4>
		    	</div>
		    	<div class="info-pet">
		    		<img src="img/int2.jpg">
		    		<h4>Richard</h4>
		    	</div>
		    	<div class="info-pet">
		    		<img src="img/int3.jpg">
		    		<h4>House</h4>
		    	</div>
		    	<div class="info-pet">
		    		<img src="img/int4.jpg">
		    		<h4>Juan</h4>
		    	</div>-->
		    </section>

	</main>
	<footer>
		<div class="contenedor">
			<p class="copy">footer &copy; 2016</p>
			<div class="sociales">
			<a class="icon-facebook"

			href=""></a>
			<a class="icon-twitter"
 href=""></a>
			<a class="icon-instagram"
  href=""></a>
			<a class="icon-googleplus"
 href=""></a>
 		</div>
		</div>

	</footer>
		<link rel="stylesheet"  href="css/fontello.css">
</body>
</html>
