
<?php

	session_start();
  include('../php/Conexion.php');

	if($_SESSION['validacion'] == 1){
   $user =  $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alumno</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/estiloUser.css" >
		<link rel="stylesheet" href="../css/menu-user.css" >
		<link rel="stylesheet" href="../css/tabla.css" >
		<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/actualizaAlumno.js"></script>
		<script type="text/javascript" src="../js/desplejable.js"></script>

    <script type="text/javascript"  >
     $(document).ready(function() {
    $("#abrir_box").click(function(){

        $("#cont_box").css("display", "block");
      });
        });
  $(document).ready(function() {
      $("#cerrar_box").click(function(){
        $("#cont_box").css("display", "none");
      });
    });
    //Menu Tabla
    $(document).ready(function() {
        $(".tabs-menu a").click(function(event) {

            event.preventDefault();

            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });


     </script>
  </head>
  <body>



<div id="confignav">
</div>




<center>

<header>
<ul class="menu">

 <li><a href=""><img id="img-icono" src="../img/user.svg" alt="" /></a>
		<ul>
				 <li><a href="#">Configuracion</a></li>
				 <li><a href="#">Ayuda</a></li>

				 <li><a href="../php/cerrarSesion.php">Cerrar Sesion</a></li>
		 </ul>
</li>

</header>
</center>
<section class="contenido">
<div id="cont_box">


    </div>

        <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1"><i class="fa fa-tachometer"></i> Inicio</a></li>
        <li><a href="#tab-2"><i class="fa fa-wifi"></i>Consultar calificacion</a></li>
        <li><a href="#tab-3"><i class="fa fa-info-circle"></i>Actualizar Informacion personal</a></li>
        <li><a href="#tab-4"><i class="fa fa-paper-plane-o"></i>Avisos</a></li>
			<li ></br></br>
         <div style="background-color: #414852;color:white;font-size:20px;font-family:font: small-caps 100%/200% serif;">
				<?php
				echo "<center>Mis datos Personales</center>";
				echo "Alumno:"."  ";echo $_SESSION['usuario']." ".$_SESSION['apellido']."</br>";
				echo "Num.Control:"."  ";echo $_SESSION['num_control']."</br>";
				echo "edad:"."  ";echo $_SESSION['edad']."</br>";
        echo "Domicilio:"."  ";echo $_SESSION['domicilio']."</br>";
				echo "Email:"."  ";echo $_SESSION['email']."</br>";


				 ?>
      </div>
			 </li>
    </ul>


    <div class="tab">
        <div id="tab-1" class="tab-content">
					</br><span style="font-size: 15px;"  class="boton_s"><?php echo "Benvenido:"."  ";echo $_SESSION['usuario']." ".$_SESSION['apellido'] ;?></span><br/>
            <h1></h1>
						<center><span style="font-size: 15px;"  class="boton_s">Vision</span></center></br>
						<p>
						Ser una plataforma gratuita de aprendizaje, sencilla y fácil de usar, pero también ser una red social de docentes y estudiantes que comparten opiniones, recursos etc. Con <strong>SchoolFae</strong> se pueden crear grupos de alumnos, herramientas de evaluación, foros de debate, tablones de anuncio, subir recursos propios e incluso incluir recursos alojados en plataformas externas como Google Drive, Khan Academy, Dropbox, Evernote.</p>
						<center><span style="font-size: 15px;"  class="boton_s">Mision</span></center></br>
						<p>
						<strong>SchoolFae</strong> es una plataforma gratuita de aprendizaje, sencilla y fácil de usar, pero también ser una red social de docentes y estudiantes que comparten opiniones, recursos etc. Con <strong>SchoolFae</strong> se pueden crear grupos de alumnos, herramientas de evaluación, foros de debate, tablones de anuncio, subir recursos propios e incluso incluir recursos alojados en plataformas externas como Google Drive, Khan Academy, Dropbox, Evernote.</p>
        </div>
        <div id="tab-2" class="tab-content">
				</br><span style="font-size: 15px;"  class="boton_s">Calificaciones Obtenidas</span><br/><br/><br/>

				<center>
            <a href="../php/ReportesExcel/reporte3.php" target="_blank"><img id="reportes" src="../img/pdf.png" alt="" /></a><a href="../php/excel/reporte3.php"><img id="reportes" src="../img/excel.png" alt="" /></a><a href="../php/excel/word3.php"><img id="reportes" src="../img/word.png" alt="" /></a>
				</center>
				<?php
					include('boleta.php');
				?>

        </div>
        <div id="tab-3" class="tab-content">
				</br><span style="font-size: 15px;"  class="boton_s">Actualizar mi informacion Personal</span><br/><br/><br/>
				<?php
												include("../php/conexionbd.php");
												$num_control = $_SESSION['num_control'];
												$consult ="SELECT * from alumno where num_control = '".$num_control."'";
												$result = mysqli_query($conexion,$consult);
												mysqli_data_seek ($result, 0);

													echo "<form class='form-horizontal' method='POST'>";
													while ($row = mysqli_fetch_row($result)){
																 echo "<div class='form-group  '>
																	<label class='col-sm-2 control-label'>Domicilio</label>
																	<div class='col-sm-5'>
																		<input type='text' class='form-control' placeholder='".$row[4]."'  id='domicilio'>
																	</div>
																</div>
																<div class='form-group'>
																	<label class='col-sm-2 control-label'>Edad:</label>
																	<div class='col-sm-5'>
																		<input type='text' class='form-control' placeholder='".$row[5]."'  id='edad'>
																	</div>
																</div>
																<div class='form-group'>
																	<label class='col-sm-2 control-label'>Email</label>
																	<div class='col-sm-5'>
																		<input type='email' class='form-control' placeholder='".$row[6]."'  id='email'>
																	</div>
																</div>
																<div class='form-group'>
																	 <label class='col-sm-2 control-label'>Password</label>
																		<div class='col-sm-5'>
																			<input type='password' class='form-control' placeholder='.....'  id='contra1'> </div>
																		</div>

																		<div class='form-group'>
																			<label class='col-sm-2 control-label'></label>
																			<label  class='col-sm-5 control-label' id='frase' style='text-align: center;font-size: 20px;padding: 2px;color: black;'></label>
																		</div>
																		<div class='form-group'>
																			<div class='col-sm-10 col-sm-offset-2'> <button type='button' class='btn btn-primary' id='subir'>Actualiza datos</button>

																			 </div> </div>
																";
													}
													echo "</form> \n";
						?>

        </div>
        <div id="tab-4" class="tab-content">
            <p><h1>Avisos</h1>
             <p>1-Para un mejor servicion su certificado sera enviado a su correo electronico.</p>
						 <p>2-Cualquier duda con sus datos personales consultar con el administrador</p>
						 <p>3.Aclaraciones con Calificaciones consulte con el docente.</p>
            </p>
        </div>
    </div>
</div>





</section>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/npm.js"></script>
  </body>
</html>
<?php
}else{

	header("Location: ../index.php");

}


?>
