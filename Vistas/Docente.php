<?php

	session_start();

	if($_SESSION['validacion'] == 1){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Docente</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../css/estiloUser.css" >
		<link rel="stylesheet" href="../css/menu-user.css" >
    <link rel="stylesheet" href="../css/tabla.css" >

		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/desplejable.js"></script>
<script type="text/javascript" src="../js/validaDocente.js"></script>
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

<section class="contenido">
<div id="cont_box">

    </div>

        <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1"><i class="fa fa-tachometer"></i>Inicio</a></li>
        <li><a href="#tab-2"><i class="fa fa-wifi"></i>Subir calificacion</a></li>
        <li><a href="#tab-3"><i class="fa fa-info-circle"></i>Informacion Academica</a></li>
        <li><a href="#tab-4"><i class="fa fa-paper-plane-o"></i>Enviar Boletas</a></li>
				<li ></br></br>
					 <div style="background-color: #414852;color:white;font-size:20px;font-family:font: small-caps 100%/200% serif;">
					<?php
					echo "<center>Mis datos Personales</center>";

					echo "Alumno:"."  ";echo $_SESSION['usuario']." ".$_SESSION['apellido']."</br>";
					echo "Codigo:"."  ";echo $_SESSION['codigo']."</br>";

					echo "telefono:"."  ";echo $_SESSION['telefono']."</br>";
					echo "Email:"."  ";echo $_SESSION['email']."</br>";


					 ?>
				</div>
				 </li>

    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            	</br><span style="font-size: 15px;"  class="boton_s"><?php echo "Benvenido:"."  ";echo $_SESSION['usuario']." ".$_SESSION['apellido'] ;?></span><br/><br/><br/>
            <p><h1></h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet purus urna. Proin dictum fringilla enim, sit amet suscipit dolor dictum in. Maecenas porttitor, est et malesuada congue, ligula elit fermentum massa, sit amet porta odio est at velit. Sed nec turpis neque. Fusce at mi felis, sed interdum tortor. Nullam pretium, est at congue mattis, nibh eros pharetra lectus, nec posuere libero dui consectetur arcu. Quisque convallis facilisis fermentum. Nam tincidunt, diam nec dictum mattis, nunc dolor ultrices ipsum, in mattis justo turpis nec ligula. Curabitur a ante mauris. Integer placerat imperdiet diam, facilisis pretium elit mollis pretium. Sed lobortis, eros non egestas suscipit, dui dui euismod enim, ac ultricies arcu risus at tellus. Donec imperdiet congue ligula, quis vulputate mauris ultrices non. Aliquam rhoncus, arcu a bibendum congue, augue risus tincidunt massa, vel vehicula diam dolor eget felis.</p>
        </div>
        <div id="tab-2" class="tab-content">
        </br><center><span style="font-size: 15px;"  class="boton_s">Registrar Calficaciones por Alumno</span><br/><br/><br/></center>


                      <form  class="form-horizontal" method="POST" >
                        <div class="form-group">
													<label class="col-sm-2 control-label" for="sel1">Grupo</label>
													<div class="col-sm-5">

													<select class=form-control id="grupo">;

															 <?php
																 include('../php/conexionbd.php');
																 $peticion = "SELECT * FROM grupo";

																 $ejecucion = mysqli_query($conexion,$peticion);
																 while ($valores = mysqli_fetch_array($ejecucion)) {

																	 echo '<option value="'.$valores['id_group'].'">'.$valores['name'].'</option>';
																	 echo "";
																 }

															 ?>
												 </select>
											 </div>
                         </div>
                         <div class="form-group">
                                  <label class="col-sm-2 control-label" for="sel1">Materias</label>
                                  <div class="col-sm-5">
																		<select class=form-control id="materia">;

																				 <?php
																					 include('../php/conexionbd.php');
																					 $peticion = "SELECT * FROM materias";

																					 $ejecucion = mysqli_query($conexion,$peticion);
																					 while ($valores = mysqli_fetch_array($ejecucion)) {

																						 echo '<option value="'.$valores['Clave'].'">'.$valores['nombre'].'</option>';
																						 echo "";
																					 }

																				 ?>
																	 </select>

                          </div>
                       </div>
                       <div class="form-group">
                                <label class="col-sm-2 control-label" for="sel1">Alumno</label>
                                <div class="col-sm-5">
																	<select class=form-control id="alumno">;

		                                   <?php
		                                     include('../php/conexionbd.php');
		                                     $peticion = "SELECT * FROM alumno";

		                                     $ejecucion = mysqli_query($conexion,$peticion);
		                                     while ($valores = mysqli_fetch_array($ejecucion)) {

		                                       echo '<option value="'.$valores['num_control'].'">'.$valores['Nombre'].'</option>';
		                                       echo "";
		                                     }

		                                   ?>
		                             </select>

                        </div>
                     </div>

                <div class="form-group">
                         <label class="col-sm-2 control-label" for="sel1">Parcial1</label>

													 <div class="col-sm-2">
	                           <input type="number" class="form-control" placeholder="Calficacion"  id="p1">
	                         </div>

              </div>
              <div class="form-group">
                        <label class="col-sm-2 control-label">Parcial2</label>
                        <div class="col-sm-2">
                          <input type="number" class="form-control" placeholder="Calficacion"  id="p2">
                        </div>
               </div>
							 <div class="form-group">
                         <label class="col-sm-2 control-label">Parcial3</label>
                         <div class="col-sm-2">
                           <input type="number" class="form-control" placeholder="Calficacion"  id="p3">
                         </div>
                </div>
								<div class="form-group">
	                        <label class="col-sm-2 control-label">Parcial4</label>
	                        <div class="col-sm-2">
	                          <input type="number" class="form-control" placeholder="Calficacion"  id="p4">
	                        </div>
	               </div>



                        <div class="form-group">
                          <label class="col-sm-2 control-label"></label>
                          <label  class="col-sm-5 control-label" id="msg" style="text-align: center;font-size: 20px;padding: 2px;color: black;"></label>
                        </div>


                     <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2"> <button type="button" class="btn btn-primary" id="subir">registrar</button>

                         </div> </div> </form>

                  </div>



        <div id="tab-3" class="tab-content">
					<form class="form-horizontal">
	<div class="table-responsive">
		<center><span style="font-size: 15px;"  class="boton_s">Comparacion de Resultados</span><br/></br></center>
			<?php

				include('../php/conexionbd.php');
				$consulta_mysql="SELECT max(promedio),min(promedio),alumno.Nombre,alumno.Apellidos
		                    from boleta
		                        inner join alumno on alumno.num_control=boleta.id_ncontrol";
		 $resultado_consulta_mysql=mysqli_query($conexion,$consulta_mysql);

		//  Navegamos cada fila que devuelve la consulta mysql y la imprimimos en pantalla
		while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
     echo "<center>";
		 echo "<h3><span class='label label-primary'>Promedio Mayor:
		".$fila['max(promedio)']." es del Alumno ".$fila['Nombre']." ".$fila['Apellidos']."</span></h3>";
		 echo "<h3><span class='label label-danger'>Promedio Menor: ".$fila['min(promedio)']." es del Alumno ".$fila['Nombre']." ".$fila['Apellidos']."</span></h3>"."</br>"."</br>";
		 echo "</center>";
		}
			 ?>
			 <center><span style="font-size: 15px;"  class="boton_s">Alumnos Aprobados</span><br/></center>
			 <?php
		 include('acreditados.php');
				?>
				 <center><span style="font-size: 15px;"  class="boton_s">Alumnos Reprobados</span><br/></center>
				<?php
 		 include('noacreditados.php');
 				?>
	</div>
</form>
        </div>
        <div id="tab-4" class="tab-content">
            <?php
                include('formcorreo.php');
						 ?>
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
